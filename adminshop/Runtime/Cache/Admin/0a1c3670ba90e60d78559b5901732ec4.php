<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - <?php echo ($meta); echo ($meta_title); ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://www.adminshop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
    <link href="http://www.adminshop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
    <link href="http://www.adminshop.com/Public/Admin/css/common.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/layer/layer.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/jquery.form.js"></script>
    
    <link href="http://www.adminshop.com/Public/Admin/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css"/>


</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('index');?>"><?php echo ($meta_title); ?></a>
    </span>
    <span class="action-span1"><a href="<?php echo U('Index/main');?>">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta); echo ($meta_title); ?> </span>
    <div style="clear:both"></div>
</h1>


    <div class="tab-div">
        <div id="tabbar-div">
            <p>
                <span class="tab-front" id="general-tab">通用信息</span>
            </p>
        </div>
        <div id="tabbody-div">
            <form enctype="multipart/form-data" name="supplierForm" action="<?php echo U('addEdit');?>" method="POST">
                <table width="90%" id="general-table" align="center">
                    <tr>
                        <td class="label">分类名称：</td>
                        <td>
                            <input type='text' name='name' value='<?php echo ($name); ?>'/></td>
                    </tr>
                    <tr>
                        <td class="label">父分类：</td>
                        <td>
                            <input type='hidden' name='parent_id' class='parent_id' value='0'/>
                            <input type='text' name='parent_name' class='parent_name' value='顶级分类' disabled="disabled"
                                   maxlength='60'/>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"></td>
                        <td>
                            <style type="text/css">
                                .ztree {
                                    margin-top: 5px;
                                    border: 1px solid #617775;
                                    background: #f0f6e4;
                                    width: 160px;
                                    height: auto;
                                    overflow-y: scroll;
                                    overflow-x: auto;
                                }
                            </style>
                            <ul id="treeDemo" class="ztree"></ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">分类简介：</td>
                        <td>
                            <textarea name='intro' cols='40' rows='3'><?php echo ($intro); ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="label">是否显示：</td>
                        <td>
                            <input type='radio' class='status' name='status' value='1'/>是
                            <input type='radio' class='status' name='status' value='0'/>否
                        </td>
                    </tr>
                </table>
                <div class="button-div">
                    <input type="submit" value=" 确定 " class="button ajax_post"/>
                    <input type="reset" value=" 重置 " class="button"/>
                </div>
                <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
            </form>
        </div>
    </div>


<div id="footer">
    共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<script type="text/javascript">
    $(function(){
        $('.status').val([<?php echo ((isset($status) && ($status !== ""))?($status):1); ?>]);
    });

</script>

    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/zTree/js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript">
        $(function () {
            <!-- 属性配置 -->
            var setting = {
                data: {
                    simpleData: {
                        enable: true,
                        pIdKey: "parent_id",
                    }
                },
                //注意大小写
                callback: {
//                    treeNode就是点击这个节点返回的数据
                    onClick: function (event, treeld, treeNode) {
                        //点击该节点之后，将选中的数据的id和name
                        $('.parent_id').val(treeNode.id);
                        $('.parent_name').val(treeNode.name);
                    }
                },
            };
            var zNodes = <?php echo ($zNodes); ?>;
            var treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);


            //展开列表
            <?php if(empty($id)): ?>//id为空，则展示所有列表
                    treeObj.expandAll(true);
            <?php else: ?>
            //id不为空，显示选中列表
            var parent_id = <?php echo ($parent_id); ?>;
            //根据编辑对象的parent_id查询出parent_id所对应的节点
            var node = treeObj.getNodeByParam('id', parent_id); //根据parent_id自己的值,找自己对应的节点
            treeObj.selectNode(node); //通过树对象treeObj 选中 找到的节点node
            //将选中的节点的名字和id赋值给表单元素
            $('.parent_name').val(node.name);
            $('.parent_id').val(node.id);<?php endif; ?>
        });
    </script>

</body>
</html>