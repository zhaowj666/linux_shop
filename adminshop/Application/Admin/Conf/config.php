<?php
define('WEB_URL') or define('WEB_URL','http://www.adminshop.com');
return array(
    //模板替换
    'TMPL_PARSE_STRING'  =>array(
        '__IMG__'       => WEB_URL.'/Public/Admin/images/',     // 增加新的IMG类库路径替换规则
        '__CSS__'       => WEB_URL.'/Public/Admin/css/',        // 增加新的CSS类库路径替换规则
        '__JS__'        => WEB_URL.'/Public/Admin/js/',         // 增加新的JS类库路径替换规则
        '__UPLOAD__'    => WEB_URL.'/Uploads/',                 // 增加新的UPLOAD上传路径替换规则
        '__LAYER__'     => WEB_URL.'/Public/Admin/layer/',      // 弹出框
        '__UPLOADIFY__' => WEB_URL.'/Public/Admin/uploadify/',  // 上传样式
        '__TREEGRID__'  => WEB_URL.'/Public/Admin/treegrid/',   // 无限分类首页展示效果
        '__ZTREE__'     => WEB_URL.'/Public/Admin/zTree/',      // 无限分类树状展示
//        '__BRAND__'     => WEB_URL.'/Uploads/',               // 本地上传文件地址
        '__BRAND__'     => 'http://nalan.b0.upaiyun.com/',      // 代表Upyun上nalan空间的域名

    )
);