<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - <?php echo ($meta_title); ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://www.adminshop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
    <link href="http://www.adminshop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/layer/layer.js"></script>
    <script type="text/javascript" src="http://www.adminshop.com/Public/Admin/js/jquery.form.js"></script>
    <!--字模板添加样式-->

</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('index');?>">商品品牌</a>
    </span>
    <span class="action-span1"><a href="<?php echo U('Index/main');?>">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
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
                        <td class="label">品牌名称：</td>
                        <td>
                            <input type="text" name="NAME" value="<?php echo ($name); ?>"/>
                            <span class="require-field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">品牌网址：</td>
                        <td>
                            <input type="text" name="url" value="<?php echo ($url); ?>"/>
                            <span class="require-field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">LOGO：</td>
                        <td>
                            <input type="file" name="logo" value="<?php echo ($logo); ?>"/>
                            <span class="require-field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">排序：</td>
                        <td>
                            <input type="text" name="sort" value="<?php echo ((isset($sort) && ($sort !== ""))?($sort):20); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">是否显示：</td>
                        <td>
                            <input type="radio" class="status" name="STATUS" value="1"/>是
                            <input type="radio" class="status" name="STATUS" value="0"/>否
                        </td>
                    </tr>
                    <tr>
                        <td class="label">品牌简介：</td>
                        <td>
                            <textarea name="intro" cols="40" rows="3"><?php echo ($intro); ?></textarea>
                        </td>
                    </tr>
                </table>
                <div class="button-div">
                    <input type="submit" value=" 确定 " class="button ajax_post"/>
                    <input type="reset" value=" 重置 " class="button" />
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
<!--字模板添加样式-->
</body>
</html>