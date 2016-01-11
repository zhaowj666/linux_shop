<?php
/**
 * Created by PhpStorm.
 * User: ZWJ
 * Date: 2016/1/6
 * Time: 19:02
 */

namespace Admin\Model;


use Think\Model;

class SupplierModel extends BaseModel
{
    //自动验证
    protected $_validate = array(
        array('NAME','require','供应商名称不能为空！'),
        array('NAME','','供应商名称已存在！',0,'unique'),
        array('linkman','require','联系人不能为空！'),
        array('phonenumber','number','手机号不正确！',0,11)
       );
}