<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QRcode;

class IndexController extends Controller
{
    public function index()
    {
        return view('index/index');
    }

    public function logins(){
        $name=$_POST['name'];
        $pwd=$_POST['pwd'];
    }

    public function loginlist(){
        return view('index.loginlist');
    }

    //微信二维码生成
    public function wxre(){
        $url =  storage_path('app/public/phpqrcode.php');
        include($url);
        $obj = new QRcode();
        $uid=uniqid();
        $url_s="http://read.bianaoao.top/imag?uid=".$uid;
        $obj->png($url_s,storage_path('app/public/1.png'));
    }

    public function imag(){
        $uid=$_GET['uid'];
        $appid='wx313c304baa2906a7';
        $uri=urlencode("http://read.bianaoao.top/login");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$uri&response_type=code&scope=snsapi_userinfo&state=$uid#wechat_re";
        header('Location:'.$url);
    }

    public function login(){
        $code=$_GET['code'];
        $appid='wx313c304baa2906a7';
        $se='626477f67eb7aa7b6c7b0f032f44380f';
        $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$se.'&code='.$code.'&grant_type=authorization_code';
        $get=file_get_contents($url);
        $arr=json_decode($get,true);
        $token=$arr['access_token'];
        $openid=$arr['openid'];
        $user_url='https://api.weixin.qq.com/sns/userinfo?access_token='.$token.'&openid='.$openid.'&lang=zh_CN';
        $user_get=file_get_contents($user_url);
        $user_arr=json_decode($user_get,true);
        dump($user_arr);
    }

    //微信接口配置
    public function wx(){
        echo $_GET['echostr'];
    }
}
