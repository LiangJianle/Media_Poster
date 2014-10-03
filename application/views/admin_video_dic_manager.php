<div class="bs-docs-example">
    <form id="form1" name="form1" method="post" action="add_article">
    <table class="table table-hover " >
        <thead>
        <tr>
            <th>序号</th>
            <th>字典名字</th>
            <th>链接地址</th>
            <th>对应视频</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($list)) {
            for ($i = 0; $i < count($list); $i++) {
                $model = $list[$i];
                echo '<tr>';
                echo '<td>'.($i+1).'</td>';
                echo '<td>'.$model->dic_name.'</td>';
                echo '<td>'.base_url("/video_manager/showByid?did=").$model->dic_id.'</td>';
                echo '<td>'.$model->video_name.'</td>';
                echo '<td>';
                echo '<a href="'.base_url("video_manager/edit_dic_video_view?Id=").$model->dic_id.'" >编辑 </a>| ';
                echo '<a href="'.base_url("video_manager/delete_dic_video?Id=").$model->dic_id.'">删除 </a>|';
                echo '<a href='.base_url("/video_manager/showByid?did=").$model->dic_id.' target="_blank"> 预览视频</a>';
                echo '</td>';
                echo '</tr>';

            }
        }

        ?>
        </tbody>
    </table>
        <div class="form-actions">
            <a href="<?php echo base_url("video_manager/add_dic_video_view")?>"  class="btn btn-primary">添加字典</a>
        </div>
        </form>
</div>