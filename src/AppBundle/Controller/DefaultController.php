<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

define("openid","oEq9xw5bj13HYkQ_X7Jiv3GebE9Y");

class DefaultController extends Controller
{
    /**
     * @Route("/aa", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $cache=$this->get("wechat_cache");
        $cache->save("asdf",122);
        echo $cache->fetch("asdf");
        var_dump($cache);
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/index")
     */
    public function homeAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->info('I just got the logger');
        $logger->error('An error occurred');


        $wechat = $this->get('wechat_sdk');
        $server = $wechat->server;
        $user = $wechat->user;


        $server->setMessageHandler(function($message) use ($user,$logger,$wechat) {
            $fromUser = $user->get($message->FromUserName);
            $logger->error("leven111:".json_encode($message));
            switch ($message->MsgType) {
                case 'event':


                    if($message->EventKey=="test"){
                        return "{$fromUser->nickname} 这是你的工作证";
                    }

                    if($message->EventKey=="logo"){

                        //
                        //   $message = new Image(['media_id' => "KXfodzTYM_zUXfnizDgq339QU4PyTRZDg0n5V1YplJpWmP_mWN5SFrwhdNTXlPUe"]);
                        $material = $wechat->material_temporary;

                        // $result = $material->uploadImage("/leven/11.jpg");
                        $message = new Image(['media_id' =>"KXfodzTYM_zUXfnizDgq339QU4PyTRZDg0n5V1YplJpWmP_mWN5SFrwhdNTXlPUe"]);
                        $logger->error("leven111:".json_encode($message));
                        return $message;
                    }
                    if($message->Event=="subscribe"){


//                        $message = new Image(['media_id' =>"KXfodzTYM_zUXfnizDgq339QU4PyTRZDg0n5V1YplJpWmP_mWN5SFrwhdNTXlPUe"]);
//                        $logger->error("leven222:".json_encode($message));
                        $message = new Text(['content' =>$message->EventKey]);
                        return $message;
                    }

                    if($message->Event=="SCAN"){


                        $message = new Text(['content' =>$message->EventKey]);
                        $logger->error("leven333:".json_encode($message));
                        return $message;
                    }
                    break;
                case 'text':
                    return "{$fromUser->nickname} 您好！欢迎关注社区管家!";
                    break;
                case 'image':
                    # 图片消息...
                    break;
                case 'voice':
                    # 语音消息...
                    break;
                case 'video':
                    # 视频消息...
                    break;
                case 'location':
                    $logger->error("leven111:".json_encode($message));
                    return "X:{$message->Location_X} Y:{$message->Location_Y}  {$message->Label}";
                    break;
                case 'link':
                    # 链接消息...
                    break;
                // ... 其它消息
                default:
                    # code...
                    break;
            }


            //$logger->error(json_encode($message->type));
            // return "{$fromUser->nickname} 您好！欢迎关注社区管家!";
        });

        $server->serve()->send();
        return new JsonResponse();
    }


    /**
     *
     * @Route("/menu", )
     */
    public function menuAction(Request $request)
    {

        $wechat = $this->get('wechat_sdk');
        $menu = $wechat->menu;
        $menus=$menu->all();


        $buttons = [

            [
                "name"       => "xxx社区",
                "sub_button" => [
                    [
                        "type" => "click",
                        "name" => "社区活动",
                        "key"  => "V1001_TODAY_MUSIC"
                    ],
                    [
                        "type" => "view",
                        "name" => "调查问卷",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "社区评选",
                        "key" => "V1001_GOOD"
                    ],
                    [
                        "type" => "click",
                        "name" => "社区奖品",
                        "key" => "V1001_GOOD"
                    ],
                    [
                        "type" => "click",
                        "name" => "共建单位",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
            [
                "type" => "click",
                "name" => "工作证11",
                "sub_button" => [
                    [
                        "type" => "click",
                        "name" => "我的工作证k",
                        "key"  => "test"
                    ],
                    [
                        "type" => "click",
                        "name" => "我的图片",
                        "key"  => "logo"
                    ],
                ]
            ],
            [
                "name"       => "我在社区",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "我要注册",
                        "url"  => "http://wp.71an.com/jstest"
                    ],
                    [
                        "type" => "view",
                        "name" => "个人信息",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "我的活动",
                        "key" => "V1001_GOOD"
                    ],
                    [
                        "type" => "click",
                        "name" => "自助考勤",
                        "key" => "V1001_GOOD"
                    ],
                    [
                        "type" => "click",
                        "name" => "积分奖励",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        $menu->add($buttons);

        return new JsonResponse();
    }

    /**
     *
     * @Route("/message", )
     */
    public function messageAction(Request $request)
    {

        $wechat = $this->get('wechat_sdk');

        $broadcast=$wechat->broadcast;
        $bb=$broadcast->send("asdfasdfsdf",openid);

        dump($bb);
        exit;

        $user = $wechat->user;
        $aa=$user->get(openid);

        dump($aa);
        exit;

        $qrcode = $wechat->qrcode;

        $result = $qrcode->forever(56);// 或者 $qrcode->forever("foo");

        $ticket = $result->ticket; // 或者 $result['ticket']
        //$url = $result->url;

        dump($result);

        $url = $qrcode->url($ticket);

        $content = file_get_contents($url); // 得到二进制图片内容
        echo __DIR__ . '/code.jpg';
        file_put_contents(__DIR__ . '/code.jpg', $content); // 写入文
        exit;

        $material = $wechat->material;

        //$temporary = $wechat->material_temporary;
        $result = $material->uploadImage("/leven/11.jpg");
        dump($result);

        $stats = $wechat->stats;
        $userSummary = $stats->userSummary('2015-01-07', '2015-01-13');
        dump($userSummary);




//        $notice=$wechat->notice;
//         dump($notice);
        exit;

        $message = new Text(['content' => 'Hello world!']);

        //$wechat->staff->message([$message])->to(openid)->send();
//
        $text = new Text();
        $text->content = '您好！overtrue。';

        $broadcast = $wechat->broadcast;

        $broadcast->sendText("asdfasdfsdf",openid);

        return new JsonResponse();
    }

    /**
     *
     * @Route("/test", )
     */
    public function testAction(Request $request)
    {

        $wechat = $this->get('wechat_sdk');

        $material = $wechat->material_temporary;

        $material = $wechat->material_temporary;

        $result = $material->uploadImage("http://graphics8.nytimes.com/images/2012/12/12/arts/music/12shankar2_337/12shankar2_337-superJumbo.jpg");
        dump($result);
        exit;

        //$temporary = $wechat->material_temporary;
        $result = $material->uploadVideo("/leven/1.mp4");

        dump($result);

        $text = new Text();
        $text->setAttribute('content', '您好！overtrue。');
        $message = new Text(['content' => 'Hello world!']);
        $message = new Video(['media_id' => $result->media_id]);

        dump($message);
        $a = $wechat->staff->message($message)->to(openid)->send();



        return new JsonResponse();
    }
}
