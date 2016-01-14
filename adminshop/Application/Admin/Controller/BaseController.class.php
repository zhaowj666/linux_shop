<?php
/**
 * Created by PhpStorm.
 * User: ZWJ
 * Date: 2016/1/9
 * Time: 12:37
 */

namespace Admin\Controller;


use Think\Controller;

class BaseController extends Controller
{
    protected $model;
    //
    protected function _initialize()
    {
        $this->model = D(CONTROLLER_NAME);
    }
    //展示
    public function index()
    {
        $kwd = I('get.kwd');
        //默认查询条件
        $wheres['status'] = array('gt', -1);
        //没有关键字是展示，有关键字就是查询
        if (!empty($kwd)) {
            $wheres['name'] = array('like', "{$kwd}%");
        }
        $rowsMsg = $this->model->getList($wheres);
        $this->assign('meta_title', $this->meta_title);
        $this->assign($rowsMsg);

        cookie('_forword_', $_SERVER['REQUEST_URI']);
        $this->display();
    }
    //添加或编辑
    public function addEdit()
    {

        //根据传参方式判断是展示页面还是处理页面
        if (IS_POST) {
            //自动验证
            if ($this->model->create() !== false) {
                //根据是否有id来判断是添加还是编辑
                if (I('post.id')) {   //编辑
                    if ($this->model->save() !== false) {
                        $this->success('编辑成功', cookie('_forword_'));
                        return;
                    }
                } else {   //添加
                    if ($this->model->add() !== false) {
                        $this->success('添加成功', U('index'));
                        return;
                    }
                }
            }
            //调用错误提示函数
            $this->error('操作失败' . error_msg($this->model));
        } else {
            //根据是否有id来确定是添加还是编辑
            if (I('get.id')) {   //编辑
                //保存当前页面地址
                $this->assign('meta', '编辑' );
                $this->assign('meta_title', $this->meta_title);
                //默认查询条件
                $wheres = [
                    'status' => array('gt', -1),
                ];
                //查询回显
                $row = $this->model->where($wheres)->getById(I('get.id'));
                $this->assign($row);
            } else {   //添加
                $this->assign('meta', '添加');
                $this->assign('meta_title', $this->meta_title);
            }
            $this->_view_before();
            $this->display();
        }
    }
    //该方法用于子类补充内容
    protected function _view_before(){}
    //改变状态===》》显示，不显示.删除就是改变status的状态，
    public function changeStatus($id, $status = -1)
    {
        $rst = $this->model->changeStatus($id, $status);
        if ($rst !== false) {
            $this->success('操作成功', cookie('_forword_'), 0);
        } else {
            $this->error('操作失败' . error_msg($this->model));
        }
    }


}