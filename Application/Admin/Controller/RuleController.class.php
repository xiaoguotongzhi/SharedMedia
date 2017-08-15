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
class RuleController extends Controller{
    public function __construct()
    {
        parent::__construct();
        $token = $_GET['token'];
        if(empty($token)){
            Helper::response(Status::FAIL,'检测到无效的Token');
        }
        $User = M("admin_user");
        $where['token'] = $token;
        $data = $User->where($where)->find();
        if(empty($data)) Helper::response(Status::FAIL,'检测到无效的Token');
        return true;
    }
}