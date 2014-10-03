<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-25
 * Time: 下午10:33
 */

class WeiXin_Message_Helper{

    /**
     * @param $weObj
     * 消息分发
     */
    public function  handle_message($weObj)
    {
        $type = $weObj->getRev()->getRevType();

        switch ($type) {
            case Wechat::MSGTYPE_TEXT:
            {
                $input_msg = $weObj->getRevContent();
                $this->handle_text_message($weObj, $input_msg);
            }
                break;
            case Wechat::MSGTYPE_EVENT:
            {
                switch ($weObj->getRevEventType()) {

                    case 'subscribe': //被关注事件
                    {
                        $this->load->model('reply_rule_model');
                        $reply_rule_List =  $this->reply_rule_model->getReplyRuleListByMessageType('sys_auto_subscribe');
                        $obj = $reply_rule_List[0];
                        $weObj->text($obj->note)->reply();
                    }
                        // $this->onSubscribe();
                        break;
                    case 'unsubscribe':
                        // $this->onUnsubscribe();
                        break;
                    case 'CLICK':
                        // $this->onMenuClick();
                        break;
                    default:
                        //$this->onUnknownEvent();
                        break;
                }
            }

        }
    }

    private function handle_text_message($weObj,  $input_msg)
    {

        $this->load->model('reply_rule_model');
        $reply_rule_List =  $this->reply_rule_model->getReplyRuleList();

        for($i = 0; $i < count($reply_rule_List) ; $i++)
        {
            $model =  $reply_rule_List[$i];

            if($model->keyword == $input_msg)
            {
                switch($model->type)
                {
                    case '文本':
                        $weObj->text($model->note)->reply();

                        break;

                    case '图文':
                    {
                        $news_list = array();
                        $news = array(
                            'Title'       => $model->title,
                            'Description' => $model->description,
                            'PicUrl'      => $model->picurl,
                            'Url'         => $model->url
                        );
                        array_push($news_list,$news);

                        $weObj->news($news_list)->reply();
                    }
                        break;
                    default:
                        break;
                }

                break;
            }


        }

        if($i==count($reply_rule_List))
        {

            $this->load->model('reply_rule_model');
            $reply_rule_List =  $this->reply_rule_model->getReplyRuleListByMessageType('sys_auto_other');
            $obj = $reply_rule_List[0];
            $weObj->text($obj->note)->reply();


        }



        if (strstr($input_msg, '文本')) {
            $weObj->text("想做学蛋糕吗？")->reply();
        } else if (strstr($input_msg, '图文')) {

            $news_list = array();
            $news = array(
                'Title'       => '【游戏引擎Libgdx】搭建开发环境',
                'Description' => '本菜谱是以30L家用烤箱为例设定的温度和时间，如果是小烤箱，自己尝试降温度加时间吧。',
                'PicUrl'      => 'http://t11.baidu.com/it/u=3108631831,1778789416&fm=56',
                'Url'         => 'http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODQzMjMwMw==&appmsgid=10000002&itemidx=1&sign=094b75d1661d1907a83050210fe9d32a#wechat_redirect'
            );
            array_push($news_list,$news);

            $weObj->news($news_list)->reply();

        } else if (strstr($input_msg, '多')) {
            $news_list = array();
            $news_0 = array(
                'Title'       => '原味戚风蛋糕',
                'Description' => '本菜谱是以30L家用烤箱为例设定的温度和时间，如果是小烤箱，自己尝试降温度加时间吧。',
                'PicUrl'      => 'http://t11.baidu.com/it/u=3108631831,1778789416&fm=56',
                'Url'         => 'http://www.douguo.com/cookbook/82907.html'
            );
            $news_1 = array(
                'Title'       => '原味戚风蛋糕2',
                'Description' => '本菜谱是以30L家用烤箱为例设定的温度和时间，如果是小烤箱，自己尝试降温度加时间吧。',
                'PicUrl'      => 'http://t11.baidu.com/it/u=3108631831,1778789416&fm=56',
                'Url'         => 'http://www.douguo.com/cookbook/82907.html'
            );
            $news_2 = array(
                'Title'       => '原味戚风蛋糕3',
                'Description' => '本菜谱是以30L家用烤箱为例设定的温度和时间，如果是小烤箱，自己尝试降温度加时间吧。',
                'PicUrl'      => 'http://t11.baidu.com/it/u=3108631831,1778789416&fm=56',
                'Url'         => 'http://www.douguo.com/cookbook/82907.html'
            );
            array_push($news_list,$news_0);
            array_push($news_list,$news_1);
            array_push($news_list,$news_2);

            $weObj->news($news_list)->reply();

        }
    }



}