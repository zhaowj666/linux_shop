<?php
/**
 * Created by PhpStorm.
 * User: ZWJ
 * Date: 2016/1/9
 * Time: 12:57
 */

namespace Admin\Model;


use Think\Model;

class BaseModel extends Model
{
    //开启批量验证
    protected $patchValidate = true;

    //首页展示
    public function getList($wheres)
    {
        //查询的总数
        $count = $this->where($wheres)->count();
        //每页条数
        $pages = 5;
        //创建分页工具对象
        $page = new \Think\Page($count, $pages);
        $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        //输出分页
        $pageshow = $page->show();
        //分页数据查询
        //对起始行数进行判断===>>若起始行数大于总行数，则只显示最后一页
        if ($page->firstRow > $count) {
            $page->firstRow = $count - $page->listRows;
        }
        $rows = $this->where($wheres)->limit($page->firstRow . ',' . $page->listRows)->select();
        //返回分页工具条和数据
        return array('pageshow' => $pageshow, 'rows' => $rows);
    }

    //编辑、删除
    public function changeStatus($id, $status)
    {
        $data = [
            'status' => $status,
            'id' => array('in', $id)
        ];
        //根据status的值判断是删除还是修改
        if ($status == -1) {
            $data['name'] = array('exp', 'concat(name,"_del")');
        }
        return parent::save($data);
    }
}