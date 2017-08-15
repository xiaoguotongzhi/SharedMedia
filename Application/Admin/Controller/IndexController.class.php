<?php
namespace Admin\Controller;
use Think\Controller;

use Common\Common\Helper;
use Common\Common\Status;
header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-origin:*');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');
class IndexController extends Controller{
    /*
     * 登录
     * */
    public function Login(){
        if(!IS_POST) return Helper::response(Status::FAIL,'无效的传值方式Method');
        $username = trim(I("post.username"));//接收的用户名
        $password = trim(I("post.password"));//接收的密码
        if(empty($username) || empty($password)) return Helper::response(Status::FAIL,'检测不到有效的参数');

        $user = M("admin_user");
        $userInfo = $user->where('username='.$username)->find();//数据库信息(用户名密码可查)
        if(empty($userInfo)) return Helper::response(Status::FAIL,'用户名或密码有误');

        $model = D("Public");
        $hash = $model->LogingenerateHashWithSalt($password,$userInfo['salt']);
        if($userInfo['password']!=$hash){
            return Helper::response(Status::FAIL,'用户名或密码有误');
        }else{
            $data['token'] = $model->getToken($username,$password);
            $adminUser = M("admin_user");
            if($adminUser->where('id='.$userInfo['id'])->save($data)){
                $rs = $user->where('id='.$userInfo['id'])->find();
                return Helper::response(Status::SUCCESS,['user_id'=>$rs['id'],'token'=>$rs['token']]);
            }
        }
    }

    /*
     * 临时测试密码
     * */
    /*public function getPass(){
        $password = '123456';
        $model = D("Public");
        print_r($model->generateHashWithSalt($password));
    }*/


    /*
     * 获取token测试
     * */
    /*public function getToken(){
        $username = '15110268175';
        $password = '123456';
        $model = D("Public");
        echo $model->getToken($username,$password);
    }*/
}