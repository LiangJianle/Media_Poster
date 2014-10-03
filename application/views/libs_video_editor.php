

<form class="form-horizontal" id="form1" name="form1" method="post"
      action="<?php echo base_url('libs_video_manager/add_video') ?>" enctype="multipart/form-data">




    <table>
        <caption><h3>添加视频</h3></caption>

        <tr>
            <td>
                <input type="hidden" name="vid" id="vid"
                       value="<?php if (!empty($model)) echo $model->vid; ?>">

            </td>

        </tr>
        <tr>
            <td >文件名称:</td>
            <td>
                <input type="text" name="file_name" id="file_name"
                       value="<?php if (!empty($model)) echo $model->file_name; ?>" placeholder="文件名称">
            </td>
        </tr>

        <tr>
            <td>存储地址</td>
            <td><input type="hidden" name="storage_addr" id="storage_addr"
                       value="<?php if (!empty($model)) echo $model->storage_addr; ?>" placeholder="存储地址"></td>

        </tr>
        <tr>
            <td>浏览</td>
            <td><input type="file" id="video" name="video" class="btn btn-primary"></td>

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
