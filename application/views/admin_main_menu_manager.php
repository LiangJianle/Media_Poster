<a href="">添加菜单</a>
<a href="">删除菜单</a>
<a href="menu_manager/check_menu">查询菜单</a>

<div class="bs-docs-example">
    <table class="table">
        <thead>
        <tr>
            <th>菜单名</th>
            <th>下级菜单</th>
            <th>类型</th>
            <th>相关连接</th>
        </tr>
        </thead>
        <tbody>


            <?php
            if (!empty($menuList)) {
                for ($i = 0; $i < count($menuList); $i++) {
                    $model = $menuList[$i];
                    echo '<tr>';
                    echo '<td>'.$model->name.'</td>';
                    echo '<td>'.$model->sub_name.'</td>';
                    echo '<td>'.$model->type.'</td>';
                    echo '<td>'.$model->url.'</td>';
                    echo '</tr>';

                }
            }

            ?>



        </tbody>
    </table>
</div>