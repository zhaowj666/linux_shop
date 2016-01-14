<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - <?php echo ($meta_title); ?> </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://www.adminshop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
    <link href="http://www.adminshop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
    <link href="http://www.adminshop.com/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/layer/layer.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/jquery.form.js"></script>
    <!--字模板添加样式-->
    <!--字模板添加样式-->
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('addEdit');?>">添加<?php echo ($meta_title); ?></a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
    <div style="clear:both"></div>
</h1>

<div class="form-div">
    <form action="<?php echo U('index');?>" name="searchForm" method="get">
        <img src="http://www.adminshop.com/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="search" />
        <input type="text" name="kwd" size="15" value="<?php echo ($_GET['kwd']); ?>"/>
        <input type="submit" value=" 搜索 " class="button" />
    </form>
</div>


<div class="list-div">
    <input type="button"  url="<?php echo U('changeStatus');?>" class="ajax_post button" value="删除"/>
    <input type="button"  url="<?php echo U('changeStatus',array('status'=>1));?>" class="ajax_post button" value="显示"/>
    <input type="button"  url="<?php echo U('changeStatus',array('status'=>0));?>" class="ajax_post button" value="隐藏"/>

</div>


<div class="list-div" id="listDiv">
    
    <table cellpadding="3" cellspacing="1">
        <tr>
            <th>ID<input type="checkbox" class="selectAll" /></th>
            <th>品牌名称</th>
            <th>品牌网址</th>
            <th>LOGO</th>
            <th>品牌描述</th>
            <th>排序</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr align="center">
                <td><?php echo ($row["id"]); ?><input type="checkbox" class="ids" /></td>
                <td class="first-cell"><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["url"]); ?></td>
                <!-- 大图 -->
                <!--<td><img width="50px"  src="http://nalan.b0.upaiyun.com/<?php echo ($row["logo"]); ?>"></td>-->
                <!-- Upyun处理好的缩略图 -->
                <td><img width="50px"  src="http://nalan.b0.upaiyun.com/<?php echo ($row["logo"]); ?>!brandsmall"></td>
                <td><?php echo ($row["intro"]); ?></td>
                <td><?php echo ($row["sort"]); ?></td>
                <td><a class="ajax_get" href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>1-$row['status']));?>"><img src="http://www.adminshop.com/Public/Admin/images/<?php echo ($row["status"]); ?>.gif"/></a></td>
                <td>
                    <a href="<?php echo U('addEdit',array('id'=>$row['id']));?>" title="编辑">编辑</a> |
                    <a class="ajax_get" href="<?php echo U('changeStatus',array('id'=>$row['id']));?>" title="移除">移除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

</div>

<div id="turn-page" class="page">
    <?php echo ($pageshow); ?>
</div>
<div id="footer">
    共执行 3 个查询，用时 0.021251 秒，Gzip 已禁用，内存占用 2.194 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
</body>
</html>