<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-24
 * Time: 下午6:24
 */

class String_Helper
{

    var $cut_length = 30;

    /**
     * @param $str
     * @param $start
     * @param $len
     *截取GB2312
     *
     * @return string
     */
    function substr_gb2312($str, $mylen = 20)
    {
        $len=strlen($str);
        $content='';
        $count=0;
        for($i=0;$i<$len;$i++){
            if(ord(substr($str,$i,1))>127){
                $content.=substr($str,$i,2);
                $i++;
            }else{
                $content.=substr($str,$i,1);
            }
            if(++$count==$mylen){
                break;
            }
        }
        return  $content;
    }

    /**
     * @param $str
     * @param $from
     * @param $len
     *截取UTF8
     *
     * @return mixed
     */
    //截取utf8字符串
    function substr_utf8($str, $from, $len)
    {
        return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' .
            '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s',
            '$1', $str);
    }

    /**
     * @param        $string
     * @param        $sublen
     * @param int    $start
     * @param string $code
     *Utf-8、gb2312都支持的汉字截取函数
    cut_str(字符串, 截取长度, 开始长度, 编码);
    编码默认为 utf-8
    开始长度默认为 0
     * @return string
     */
    function cut_str($string, $sublen, $start = 0, $code = 'UTF-8')
    {
        if ($code == 'UTF-8') {
            $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
            preg_match_all($pa, $string, $t_string);
            if (count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)) . "...";
            return join('', array_slice($t_string[0], $start, $sublen));
        } else {
            $start  = $start * 2;
            $sublen = $sublen * 2;
            $strlen = strlen($string);
            $tmpstr = '';
            for ($i = 0; $i < $strlen; $i++) {
                if ($i >= $start && $i < ($start + $sublen)) {
                    if (ord(substr($string, $i, 1)) > 129) {
                        $tmpstr .= substr($string, $i, 2);
                    } else {
                        $tmpstr .= substr($string, $i, 1);
                    }
                }
                if (ord(substr($string, $i, 1)) > 129) $i++;
            }
            if (strlen($tmpstr) < $strlen) $tmpstr .= "...";
            return $tmpstr;
        }

    }
}