
<form id="form1" name="form1" method="post" action="add_rule">
    <table>

        <caption><h4>其他自动回复设置</h4></caption>
        <input type="hidden" name="Id" id="Id" value="<?php if(!empty($model)) echo $model->Id; ?>">
        <tr>
           
            <td><input type="hidden" name="name" id="name"  value="sys_auto_other" placeholder="请输入标题">
             <td><input type="hidden" name="message_type" id="message_type"  value="sys_auto_other">

          
            </td>
        </tr>
        <tr>
            <td>类别:</td>
            <td>
                <select id="type" name="type" onchange="changeValue(this)">
                    <option <?php  if(!empty($model)) {if ($model->type=='文本') echo 'selected';  }?>>文本</option>
                    <option <?php  if(!empty($model)) {if ($model->type=='图文') echo 'selected';  }?>>图文</option>
                </select>
            </td>
        </tr>

        
        <div id ="content_text" style="display:none;">           
        <tr>
            <td>【文本】正文:</td>
            <td><textarea rows="4" name="notes" id="notes"  ><?php if(!empty($model)) echo $model->note; ?></textarea></td>
        </tr>
        </div>
        

        
        <tr>
            <td></td>
            <td>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">保存</button>
                    <button type="button" class="btn" onclick="history.back()" >Cancel</button>
                </div>


            </td>
        </tr>

    </table>
</form>