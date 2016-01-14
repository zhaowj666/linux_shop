<?php
namespace Admin\Model;


class SupplierModel extends BaseModel
{
    //自动验证
    protected $_validate = array(
        array('name','require','供应商名称不能为空！'),
array('linkman','require','联系人不能为空！'),
array('phonenumber','require','联系电话不能为空！'),
array('sort','require','排序不能为空！'),
array('status','require','是否显示不能为空！'),
    );
}