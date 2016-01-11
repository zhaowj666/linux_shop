<?php
/**
 * Created by PhpStorm.
 * User: ZWJ
 * Date: 2016/1/11
 * Time: 20:57
 */

namespace Admin\Controller;


use Think\Controller;

class GiiController extends Controller
{
    public function index(){
        if(IS_POST){

            header('Content-Type: text/html;charset=utf-8');
           //获取用户传递过来的表名
            $table_name = I('post.NAME');
            //控制器的名字首字母大写
            $name = parse_name($table_name,1);
            //通过表名得到表的注释
            $sql = "select  TABLE_COMMENT from information_schema.`TABLES`  where TABLE_SCHEMA = '".C('DB_NAME')."' and TABLE_NAME = '{$table_name}'";
            $model = M();
                         $row = $model->query($sql);
            $meta_title = $row[0]['table_comment'];

            //定义模板代码的目录
            define('TPL_PATH') or define('TPL_PATH',ROOT_PATH.'Template/');
            //生成控制器
            //引入模板
            //开启缓存
            ob_start();
            require TPL_PATH.'Controller.tpl';
            //模板内有php语言，在前面加上<?php和换行符
            $controller_content = "<?php\r\n".ob_get_clean();
            //控制器文件路径
            $controller_path = APP_PATH.'Admin/Controller/'.$name.'Controller.class.php';
            //将缓存中内容写入一个文件中，生成控制器文件
            file_put_contents($controller_path,$controller_content);



            //模型自动生成
            //>>4. 查询表中的字段信息. 为index.html,edit.html和模型提供数据
            $sql = "show full columns from ".$table_name;
            $fields = $model->query($sql);  //fields中包含了当前表字段的信息
            //开启缓存
            ob_start();
            require TPL_PATH.'Model.tpl';
            $model_content = "<?php\r\n".ob_get_clean();
            $model_path = APP_PATH.'Admin/Model/'.$name.'Model.class.php';
            file_put_contents($model_path,$model_content);

        }else{
            $this->assign('meta_title','代码生成器');
            $this->display();
        }
    }
}