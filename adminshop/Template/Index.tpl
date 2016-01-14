<extend  name="Commen/index"/>
<block name="list">
    <table cellpadding="3" cellspacing="1">
        <tr>
            <th>ID<input type="checkbox" class="selectAll" /></th>
            <?php
                foreach($fields as $field){
                    if($field['field']!='id'){
                        echo "<th>".$field['comment']."</th>\r\n";
                    }
                }
             ?>
            <th>操作</th>
        </tr>
        <volist name="rows" id="row">
            <tr align="center">
                <td>
                    {$row.id}<input type="checkbox" name="id[]" class="ids" value="{$row.id}"/>
                </td>
                <?php
                    foreach($fields as $field){
                        if($field['field']=='name'){
                            echo '<td class=\'first-cell\'>{$row.name}</td>';
                        }elseif($field['field']=='status'){
                            echo "<td><a class=\"ajax_get\"   href=\"{:U('changeStatus',array('id'=>\$row['id'],'status'=>(1-\$row['status'])))}\"><img src=\"__IMG__{\$row.status}.gif\"/></a></td>";
                        }elseif($field['field']!='id'){
                            echo "<td>{\$row.{$field['field']}}</td>\r\n";
                        }
                    }
                 ?>
                <td>
                    <a href="{:U('addEdit',array('id'=>$row['id']))}" title="编辑">编辑</a> |
                    <a class="ajax_get" href="{:U('changeStatus',array('id'=>$row['id']))}" title="移除">移除</a>
                </td>
            </tr>
        </volist>
    </table>
</block>







