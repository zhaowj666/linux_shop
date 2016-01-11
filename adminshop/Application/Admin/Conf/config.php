<?php
define('WEB_URL') or define('WEB_URL','http://www.adminshop.com');
return array(
    //模板替换
    'TMPL_PARSE_STRING'  =>array(
        '__IMG__'     => WEB_URL.'/Public/Admin/images/',    // 增加新的IMG类库路径替换规则
        '__CSS__'     => WEB_URL.'/Public/Admin/css/',       // 增加新的CSS类库路径替换规则
        '__JS__'      => WEB_URL.'/Public/Admin/js/',        // 增加新的JS类库路径替换规则
        '__UPLOAD__'  => WEB_URL.'/Uploads',                 // 增加新的UPLOAD上传路径替换规则
        '__LAYER__'   => WEB_URL.'/Public/Admin/layer/',     // 弹出框
    )
);