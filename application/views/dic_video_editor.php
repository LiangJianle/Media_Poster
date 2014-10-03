<form id="form1" name="form1" method="post" action="add_dic_video">
    <table>
        <caption><h3>添加规则</h3></caption>

        <tr>
            <td><input type="hidden" name="dic_id" id="dic_id"
                       value="<?php if (!empty($model)) echo $model->dic_id; ?>">
            </td>
        </tr>
        <tr>
            <td>字典对应名称:</td>
            <td>
                <input type="text" name="dic_name" id="dic_name"
                       value="<?php if (!empty($model)) echo $model->dic_name; ?>" placeholder="字典名称">
            </td>
        </tr>

        <tr>
            <!--  <td>视频链接:</td>  -->
            <td><input type="hidden" name="web_url" id="web_url"
                       value="<?php if (!empty($model)) echo $model->web_url; ?>" placeholder="视频链接"></td>
        </tr>
        <!--

               <tr>
                   <td>视频对应id</td>
            <td><input type="hidden" name="video_id" id="video_id"
                       value="<?php if (!empty($model)) echo $model->video_id; ?>" placeholder="视频id"></td>
        </tr> -->

        <input type="hidden" id="video_name" name="video_name" value="<?php echo $videoList[0]->file_name?>"/>
        <tr>
            <td><label for="video_id">选择列表</label></td>
            <td>
                <select class="form-control" name="video_id"  onchange="fuzhi(this.options[this.selectedIndex].text)">
                   <script>
                       function fuzhi(a){
                           document.getElementById("video_name").value=a;
                       }//赋值，咚咚}
                   </script>
                    <?php
                    for ($i = 0; $i < count($videoList); $i++)
                    {
                        $video = $videoList[$i];
                        echo '<option value='."$video->vid".'>' . $video->file_name . '</option>';
                    }
                    ?>
                </select>

            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">保存</button>
                    <button type="button" class="btn" onclick="history.back()">Cancel</button>
                </div>


            </td>
        </tr>

    </table>
</form>
