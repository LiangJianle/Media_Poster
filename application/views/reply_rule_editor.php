<script type="text/javascript">
    function tt(id) {
        var selected = document.getElementById(id);
        if(selected.value==1)
        {
            document.all.texxt.style.display='block';  //隐藏层
        }

    }
function show(id){
	document.getElementById(id).style.display='block';  //显示层
}
function hide(id){
	document.getElementById(id).style.display='none';  //隐藏层
}
    
function changeValue(obj){
    if(obj.value=="图文")
	{
		document.getElementById("content_pic").style.display = "";
    }else{
		document.getElementById("content_pic").style.display = "none";
    }



    
}
                                                  

</script>



<form id="form1" name="form1" method="post" action="add_rule">
    <table>
        <caption><h3>添加规则</h3></caption>
        <input type="hidden" name="Id" id="Id" value="<?php if(!empty($model)) echo $model->Id; ?>">
        <tr>
            <td><input type="hidden" name="message_type" id="message_type"  value="sys_auto_keyword">
             
            </td>
        </tr>
        <tr>
            <td>类别:</td>
            <td>
                <select id="type" name="type" onchange="changeValue(this)" class="span3">
                    <option <?php  if(!empty($model)) {if ($model->type=='文本') echo 'selected';  }?>>纯文本</option>
                    <option <?php  if(!empty($model)) {if ($model->type=='图文') echo 'selected';  }?>>单图文</option>
                    <option <?php  if(!empty($model)) {if ($model->type=='多图文') echo 'selected';  }?>>多图文</option>
                    <option <?php  if(!empty($model)) {if ($model->type=='图片') echo 'selected';  }?>>图片</option>

                </select>
            </td>
        </tr>
        <tr>
            <td>关键词</td>
            <td><input class="span3" type="text" name="keyword" id="keyword" value="<?php  if(!empty($model)) echo $model->keyword;  ?>" placeholder="请输关键词"></td>
        </tr>
        
        
        <div id ="texxt" style="display:none;">
        <tr>
            <td>【文本】正文:</td>
            <td><textarea  class="span3" rows="4" name="notes" id="notes"  ><?php if(!empty($model)) echo $model->note; ?></textarea></td>
        </tr>
        </div>
        

        <div id = "content_pic" >
        <tr>
            <td>【图文】标题:</td>
            <td><input class="span3" type="text" name="title" id="title" value="<?php if(!empty($model)) echo $model->title; ?>"></td>
        </tr>
        
        <tr>
            <td>【图文】描述:</td>
            <td><textarea class="span3" rows="4" name="description" id="description" ><?php if(!empty($model)) echo $model->description; ?></textarea></td>
        </tr>
        
         <tr>
            <td>【图文】图片链接:</td>
   			<td><input class="span3" type="text" name="picurl" id="picurl" value="<?php if(!empty($model)) echo $model->picurl; ?>"></td>
        </tr>
        
        <tr>
            <td>【图文】文章链接:</td>
  			<td><input class="span3" type="text" name="url" id="url" value="<?php if(!empty($model)) echo $model->url; ?>"></td>
        </tr>

            <tr>
                <td>是否开启：</td>

                <td><input type="checkbox" name="is_valued" id="is_valued" value="<?php if(!empty($model)) echo $model->status; ?>"
                        <?php if(!empty($model)) if($model->status==1) echo 'checked'; ?> >开启</td>
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
