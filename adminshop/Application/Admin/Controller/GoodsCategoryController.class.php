<?php
namespace Admin\Controller;


use Think\Controller;

class GoodsCategoryController extends  BaseController
{
    protected $meta_title = '商品分类';

    public function index(){
        //调用模型查询数据
        $rows = $this->model->getList();
        //分配数据
        $this->assign('rows',$rows);
        $this->assign('meta_title',$this->meta_title);
        //保存当前请求地址
        cookie('_forword_',$_SERVER['REQUEST_URI']);
        $this->display();
    }

    //覆盖父类的方法，用于添加新的类容，入一个页面展示多个列表数据等
    protected function _view_before(){
        //调用模型查询数据
        $rows = $this->model->getList(true,'id,name,parent_id');
        //分配数据
        $this->assign('zNodes',$rows);
    }


}