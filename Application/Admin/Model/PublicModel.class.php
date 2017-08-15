<?php
namespace Admin\Model;
use Think\Model;
class PublicModel extends Model {
    /*
     * 注册账号密码加密
     * */
    function custom_function_for_salt(){
        return $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
    }

    public function generateHashWithSalt($password) {
        $options = [
            'salt' => self::custom_function_for_salt(), //write your own code to generate a suitable salt
            'cost' => 12 // the default cost is 10
        ];
        $str = password_hash($password, PASSWORD_DEFAULT, $options);
        $res = array();
        $res['password'] = $str;
        $res['salt'] = $options['salt'];
        return $res;
    }


    /*
     * 登录密码验证
     * */
    public function LogingenerateHashWithSalt($password,$salt) {
        $options = [
            'salt' => $salt,
            'cost' => 12
        ];
        $str = password_hash($password, PASSWORD_DEFAULT, $options);
        return $str;
    }


    /*
     * token生成
     * */
    public function getToken($username,$password){
        return substr(md5(uniqid(rand(), true)), 0, 22).crypt($username,$password);
    }
}