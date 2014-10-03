<div class="bs-docs-example">
    <form id="form1" name="form1" method="post" action="<?php echo base_url("add_article")?>">
    <table class="table table-hover " >
        <thead>
        <tr>
            <th>序号</th>
            <th>文件名称</th>
            <th>存储地址</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($list)) {

            for ($i = 0; $i < count($list); $i++) {
                $model = $list[$i];
                echo '<tr>';
                echo '<input type="hidden" value="'.$model->vid.'">';
                echo '<td>'.($i+1).'</td>';
                echo '<td>'.$model->file_name.'</td>';
                echo '<td>'.$model->storage_addr.'</td>';
                echo '<td>';
                echo '<a href="'.base_url("libs_video_manager/edit_libs_video_view?Id=").$model->vid.'" >编辑 </a>| ';
                echo '<a href="'.base_url("libs_video_manager/delete_libs_video?Id=").$model->vid.'">删除 </a>|';

                echo '</td>';
                echo '</tr>';

            }
        }

        ?>
        </tbody>
    </table>
        <div class="form-actions">
            <a href="<?php echo base_url("libs_video_manager/add_libs_video_view"); ?>" class="btn btn-primary">添加视频</a>
        </div>
        </form>
</div>