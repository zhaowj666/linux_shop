<extend  name="Commen/addEdit"/>
<block name="form">
    <div class="tab-div">
        <div id="tabbar-div">
            <p>
                <span class="tab-front" id="general-tab">通用信息</span>
            </p>
        </div>
        <div id="tabbody-div">
            <form enctype="multipart/form-data" name="supplierForm" action="{:U('addEdit')}" method="POST">
                <table width="90%" id="general-table" align="center">
                    <?php foreach($fields as $field): ?>
                        <tr>
                            <td class="label"><?php echo $field['comment']; ?>：</td>
                            <td>
                                <?php
                                    //根据字段注释来生成不同的表单元素
                                    if(!isset($field['fiel_type'])){
                                        if($field['field']=='sort'){
                                            echo "<input type=\"text\" name=\"sort\" value=\"{\$sort\|default=20}\"/>";
                                        }else{
                                            echo "<input type='text' name='{$field['field']}' value='{$url}'/>";
                                        }
                                    }elseif($field['field']=='file'){
                                        echo "<input type=\"file\" name='{$field['field']}' value=\"\{$logo}\"/>";
                                    }elseif($field['fiel_type']=='textarea'){
                                        echo "<textarea name='{$field['field']}' cols='40' rows='3'>{\${$field['field']}}</textarea>";
                                    }elseif($field['fiel_type']=='radio'){
                                        foreach($field['option_values'] as $k => $v){
                                            echo "<input type='radio' class='{$field['field']}' name='{$field['field']}' value='{$k}'/>{$v}";
                                        }
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="button-div">
                    <input type="submit" value=" 确定 " class="button ajax_post"/>
                    <input type="reset" value=" 重置 " class="button" />
                </div>
                <input type="hidden" name="id" value="{$id}"/>
            </form>
        </div>
    </div>
</block>
