<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-1-22
 * Time: 下午1:04
 */
header("Content-type: text/html; charset=utf-8");
//define("ACCESS_TOKEN", "PR3unv4uCYE24YxZgdrWYRIcqOpiUyk6D9NdJeYsWac_5bUgh13VUhMZOGaF8Z_c5m5LC5TtAGhTmhXDThmH8JWMjYBhFtvihoaFxGkd7BlRge6EZyzD2-ceE3E_l_bhJaDFGg5A6uTY1jbFSd8JDw");
define("APP_ID", "wx4fd163d0ac50af5d");
define("APPP_SECRET", "8236537b202e2674294ec2abe1951026");


class Menu
{
    var $token;
    function __construct()
    {
        $this->token =  $this->getToken();
      //  echo $this->token;
    }
    function getToken()
    {
        $return_json = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . APP_ID . "&secret=" . APPP_SECRET);
        $json_obj = json_decode($return_json);
        // var_dump($json_obj);
        $token = $json_obj->access_token;
        // var_dump($token);
        return $token;
    }


    function getMenu()
    {
        return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=" . $this->token);
    }

//删除菜单
    function deleteMenu()
    {
        return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=" . $this->token);
    }

    function  updateMenu()
    {
        $data = '{
    "button":[
    {
         "name":"可可推荐",
         "sub_button":[
           {
              "type":"view",
              "name":"蔓越莓饼干",
              "url":"http://blog.sina.com.cn/s/blog_4a5089ff0100avgm.html"
           },
           {
               "type":"view",
               "name":"杏仁可可饼",
               "url":"http://www.soso.com/"
            },
           {
              "type":"view",
              "name":"蛋黄饼",
             "url":"http://www.soso.com/"
           },
           {
              "type":"view",
              "name":"果浆酸奶",
              "url":"http://www.soso.com/"
           },
          {
              "type":"view",
              "name":"木糖杯",
             "url":"http://www.soso.com/"
           }

           ]
     },
     {
          "name":"关于可可家",
          "sub_button":[
           {
              "type":"view",
              "name":"购买方式",
             "url":"http://www.soso.com/"
           },
           {
               "type":"view",
               "name":"食材选取",
               "url":"http://www.soso.com/"
            },
           {
              "type":"view",
              "name":"手工烘焙",
              "url":"http://www.soso.com/"
           }

           ]
     },
     {
          "name":"烘焙教程",
          "sub_button":[
           {
              "type":"view",
              "name":"蛋糕教程",
              "url":"http://www.soso.com/"
           },
           {
              "type":"view",
              "name":"面包教程",
              "url":"http://www.soso.com/"
           },
           {
               "type":"view",
               "name":"饼干教程",
               "url":"http://www.soso.com/"
            },
           {
              "type":"view",
              "name":"其他教程",
             "url":"http://www.soso.com/"
           }

           ]
      }]
}';
        echo $this->deleteMenu();
        echo $this->createMenu($data);
        echo $this->getMenu();
    }
    function createMenu($data)
    { // 模拟提交数据函数
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->token); // 要访问的地址
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        // curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        // curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno' . curl_error($curl); //捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据
    }
}

//$menu = new Menu();

//echo $menu->updateMenu();
//echo $menu->deleteMenu();
//echo $menu->createMenu($data);
//echo $menu->getMenu();