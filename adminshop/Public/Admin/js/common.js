$(function(){
  //首页选中
  //点击表头时，所有数据被选中
  $('.selectAll').click(function(){
    //将表头的选中状态赋给表中数据
    $('.ids').prop('checked',$(this).prop('checked'));
  });
  //表中数据全部被选中时，表头被选中
  $('.ids').click(function(){
    $('.selectAll').prop('checked',$(".ids:not(:checked)").length==0);
  });

  //点击get提交事件
  $('.ajax_get').click(function(){
    //获取传递地址
    var url = $(this).prop('href');
    $.get(url,showAjaxMsg);
    return false;
  });

  //点击post提交事件
  $('.ajax_post').click(function(){
    //获取表单的标签对象
    var supplierForm = $(this).closest('form')
    /**
    //获取传递地址
    var url = supplierForm.prop('action');
    //序列化表单数据
    var data = supplierForm.serialize();
    //post请求
    $.post(url,data,showAjaxMsg);
     *优化代码
     *  使用jQuery.form插件实现完美的表单异步提交
     */
    if(supplierForm.length!=0){
      supplierForm.ajaxSubmit({success:showAjaxMsg});
    }else{
      //获取按钮中的地址
      var url = $(this).attr('url');
      //获取数据===>将得到的数据序例化
      var data = $('.ids:checked').serialize();
      console.debug(data);
      $.post(url,data,showAjaxMsg);
    }

    return false;
  });

  function showAjaxMsg(Msg){
    //声明一个变量，确定弹出提示是失败还是成功
    var icon = '';
    if(Msg.status){
      icon = 6;
    }else{
      icon = 5;
    }
    //展示一个提示框
    layer.msg(Msg.info,{
      time:1000,      // 等待指定时间后关闭提示框，跳转页面
      offset:200,     // 弹出框的位置，一个数据为距离顶部的位置，两个分别为顶部，左边
      icon:icon,         // 弹出框的提示图标 0->警告?  1->成功  2->失败
      shift:2,
    },function(){    //回调函数，提示框隐藏后执行该函数
      //返回数据中有url地址，菜跳转页面
      if(Msg.url){
        location.href = Msg.url;
      }
    });
  }


});