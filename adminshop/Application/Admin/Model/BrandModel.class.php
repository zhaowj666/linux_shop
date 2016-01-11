<?php
namespace Admin\Model;


class BrandModel extends BaseModel
{
    //自动验证
    protected $_validate = array(
        array('NAME','require','品牌名称不能为空！'),
array('NAME','','品牌名称已存在！',0,'unique'),
array('url','require','品牌网址不能为空！'),
array('logo','require','LOGO不能为空！'),
array('sort','require','排序不能为空！'),
array('STATUS','require','状态不能为空！'),
    );
}