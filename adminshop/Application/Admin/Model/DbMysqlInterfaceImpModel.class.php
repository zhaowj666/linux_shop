<?php
/**
 * Created by PhpStorm.
 * User: ZWJ
 * Date: 2016/1/14
 * Time: 15:37
 */

namespace Admin\Model;


class DbMysqlInterfaceImpModel implements DbMysqlInterfaceModel
{
    public function connect(){
        echo 'connect';
        exit;
    }
    
    public function disconnect(){
        echo 'disconnect';
        exit;
    }

   
    public function free($result){
        echo 'free';
        exit;
    }

    public function query($sql, array $args = array()){
        //根据实际参数拼接sql语句
        $sql = $this->buldSql(func_get_args());

        return M()->execute($sql);
    }

    public function insert($sql, array $args = array()){
        //获取参数
        $param = func_get_args();
        $sql = array_shift($param);
        //拼接sql
        $sql = str_replace('?T',$param[0],$sql);

        //拼接更新字段及值
        $values = '';
        foreach($param[1] as $k => $v){
            $values .= "$k='$v',";
        }
        //替换?%
        $sql = str_replace('?%',$values,$sql);
        $sql = rtrim($sql,',');

        //执行sql
        $model = M();
        $rst = $model->execute($sql);

        if($rst===false){
            //失败返回false
            return false;
        }else{
            //添加成功返回最后的ID
            return $model->getLastInsID();
        }
    }


    public function update($sql, array $args = array()){
        echo 'update';
        exit;
    }


    public function getAll($sql, array $args = array()){
        echo 'getAll';
        exit;
    }


    public function getAssoc($sql, array $args = array()){
        echo 'getAssoc';
        exit;
    }


    public function getRow($sql, array $args = array()){
        //获取实际参数
        $sql = $this->buldSql(func_get_args());

        //执行sql
        $row = M()->query($sql);
        return empty($row)?false:$row[0];

    }


    public function getCol($sql, array $args = array()){
        echo 'getCol';
        exit;
    }


    public function getOne($sql, array $args = array()){
        //获取实际参数
        $sql = $this->buldSql(func_get_args());

        //执行sql
        $rows = M()->query($sql);
        $row = array_values($rows[0]);

        return $row[0];
    }


    //拼接sql的方法
    protected function buldSql($param){
        $sql = array_shift($param);
        //使用正则表达式将字符串分割为数组==>特殊字符要转义
        $sql_arr = preg_split("/\?[FTN]/",$sql);
        //拼接sql
        $sql='';
        foreach($sql_arr as $k=>$v){
            $sql .= $v . $param[$k];
        }
        return $sql;
    }
}