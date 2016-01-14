<?php
/**
 * Created by PhpStorm.
 * User: ZWJ
 * Date: 2016/1/13
 * Time: 13:09
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Upload;

class UploadController extends Controller
{
    public function index(){
        //保存路径，即根目录下的文件夹
        $dir = I('post.dir');
        //配置
        $config = array(
//            'rootPath'     => './Uploads/', //保存根路径(本地)
//            'savePath'     => $dir.'/', //保存路径(本地)

            'rootPath'     => './', //保存根路径（UPYUN）
            'driver'       => 'Upyun', // 文件上传驱动

            // 上传驱动配置
            'driverConfig' => array(
                'host'     => 'v0.api.upyun.com', //又拍云服务器
                'username' => 'nalanshiwu', //又拍操作员用户
                'password' => 'Zwj175370', //又拍云操作员密码
                'bucket'   => $dir, //空间名称
                'timeout'  => 90, //超时时间
            ),
        );

        $model = new Upload($config);
        $result = $model->uploadOne($_FILES['Filedata']);
        if($result!==false){
            //保存地址
            echo $result['savepath'].$result['savename'];
        }else{
            $this->error('上传失败'.$model->getError());
        }
    }
}
