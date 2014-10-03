<div class="bs-docs-example">
    <form id="form1" name="form1" method="post" action="add_rule">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>关键词</th>
                <th>类别</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($reply_rule_List)) {
                for ($i = 0; $i < count($reply_rule_List); $i++) {
                    $model = $reply_rule_List[$i];
                    echo '<tr>';
                    echo '<td>'.$model->keyword.'</td>';
                    echo '<td>'.$model->type.'</td>';
                    echo '<td>';if($model->status==1) echo '开启'; else echo'关闭';'</td>';
                    echo '<td>';
                    echo '<a href="cus_reply_manager/edit_rule_view?Id='.$model->Id.'" >编辑 </a>| ';
                    echo '<a href="cus_reply_manager/delete_rule?Id='.$model->Id.'">删除 </a>| ';
                    echo '<a href="cus_reply_manager/view_rule?Id='.$model->Id.'"> 查看</a>';
                    echo '</td>';
                    echo '</tr>';

                }
            }

            ?>
            </tbody>
        </table>
        <div class="form-actions">
            <a href="cus_reply_manager/add_rule_view" class="btn btn-primary">添加规则</a>
        </div>
    </form>
</div>