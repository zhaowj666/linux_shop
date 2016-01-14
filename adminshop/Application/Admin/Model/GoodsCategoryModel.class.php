<?php
namespace Admin\Model;


use Admin\Service\NestedSetsService;
use Think\Model;

class GoodsCategoryModel extends BaseModel
{
    //自动验证
    protected $_validate = array(
        array('name', 'require', '分类名称不能为空！'),
        array('parent_id', 'require', '父分类不能为空！'),
        array('status', 'require', '是否显示不能为空！'),
    );

    //首页数据展示
    //因为分类的首页和添加编辑页面都需要展示分类信息，而添加边界页面只需要部分数据，
    //所有使用参数$field表示要查询的字段，默认为所有，添加编辑页面传入参数即可，
    //因为添加和编辑页面要使用插件展示分类，要使用到JSON数据，首页不需要，
    //因此使用$isJSON表示返回的数据是否是JSON数据，默认为否
    public function getList($isJSON=false,$field='*'){
        $rows = $this->field($field)->where(array('status'=>array('egt',0)))->order('lft')->select();
        if($isJSON){
            return json_encode($rows);
        }
        return $rows;
    }


    //添加
    public function add(){
        //创建执行sql的对象
        $dbMysql = new DbMysqlInterfaceImpModel();
        //计算边界
        $NestedSetsService = new NestedSetsService($dbMysql,'goods_category','lft','rgt','parent_id','id','level');
//        $NestedSetsService = new NestedSetsService($dbMysql,'goods_category','lft','rgt','parent_id','id','level');

        //添加节点==>>将节点添加到某个节点之下
        $NestedSetsService->insert($this->data['parent_id'],$this->data,'bottom');


    }

    //添加
    public function save(){
        //创建执行sql的对象
        $dbMysql = new DbMysqlInterfaceImpModel();
        //计算边界
        $NestedSetsService = new NestedSetsService($dbMysql,'goods_category','lft','rgt','parent_id','id','level');

        //移动
        $NestedSetsService->moveUnder($this->data['id'],$this->data['parent_id']);

        //将请求中的其他数据修改到数据表中
        return parent::save();
    }

    //添加
    public function changeStatus($id, $status=-1){
        //根据自己的id找到子孙id
        $sql = "SELECT child.id FROM  goods_category AS child, goods_category AS parent WHERE parent.id = $id AND child.`lft` >= parent.`lft` AND child.rgt <= parent.`rgt`";
        //从数据库查询==>>结果为二维数组
        $rows = $this->query($sql);
        //再根据子节点id从二维数组中取出指定数据
        $ids = array_column($rows,'id');

        $data = [
            'status' => $status,
            'id' => array('in', $ids)
        ];
        //根据status的值判断是删除还是修改
        if ($status == -1) {
            $data['name'] = array('exp', 'concat(name,"_del")');
        }
        return parent::save($data);
    }


}