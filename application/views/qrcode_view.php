<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-11
 * Time: 下午11:20
 */
echo "<h1>创建二维码</h1><hr/>";


if (isset($_REQUEST['data'])) {
//display generated file
    echo '<img src="' . $filename . '" /><hr/>';
    echo '<a href="' . $filename . '" target="_blank"> 查看大图 </a><br/>';
}


//config form
echo '<form action="' . base_url("QRCodeController/index") . '" method="post">
        内容:&nbsp;<input name="data" value="' . (isset($_REQUEST['data']) ? htmlspecialchars($_REQUEST['data']) : '请输入要生成的内容') . '" />&nbsp;
        大小:&nbsp;<select name="level">
            <option value="L"' . (($errorCorrectionLevel == 'L') ? ' selected' : '') . '>L - smallest</option>
            <option value="M"' . (($errorCorrectionLevel == 'M') ? ' selected' : '') . '>M</option>
            <option value="Q"' . (($errorCorrectionLevel == 'Q') ? ' selected' : '') . '>Q</option>
            <option value="H"' . (($errorCorrectionLevel == 'H') ? ' selected' : '') . '>H - best</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size">';

for ($i = 1; $i <= 10; $i++)
    echo '<option value="' . $i . '"' . (($matrixPointSize == $i) ? ' selected' : '') . '>' . $i . '</option>';

echo '</select>&nbsp;
        <input type="submit" value="GENERATE"></form><hr/>';


