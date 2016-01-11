namespace Admin\Model;


class <?php echo $name; ?>Model extends BaseModel
{
    //自动验证
    protected $_validate = array(
        <?php
            foreach($fields as $field){
                if($field['field']=='id' || $field['null']=='YES'){
                    continue;
                }
                echo "array('{$field['field']}','require','{$field['comment']}不能为空！'),\r\n";


                if($field['field']=='NAME'){
                    echo "array('{$field['field']}','','{$field['comment']}已存在！',0,'unique'),\r\n";
                }
            }
        ?>
    );
}