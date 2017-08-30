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


require './ThinkPHP/Library/Vendor/Push/IGt.Batch.php';
/*Push_Start*/
header("Content-Type: text/html; charset=utf-8");

//http的域名
define('HOST','http://sdk.open.api.igexin.com/apiex.htm');

//https的域名
//define('HOST','https://api.getui.com/apiex.htm');

//开发环境
define('APPKEY','KJlJZfUr909SE2Al3lkhb8');
define('APPID','TlYTbA67c26mrAJwcBua19');
define('MASTERSECRET','oxwYvAaY7g78ym7EjvelM3');
/*Push_End*/
class PadController extends RuleController{
    /*
     * 故障pad列表
     * */
    public function PadDamage(){
        $http = 'http://';
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = $http.$server_name.substr($request_uri,0,strlen($request_uri)-1);
        $page = empty($_GET['page'])?1:$_GET['page'];

        $fault = M("fault");
        $count = $fault->count();
        $page_size = 6;
        $last_num = ceil($count/$page_size);
        $page_limit = ($page-1)*$page_size;
        $data = $fault->limit($page_limit,$page_size)->order('end_time desc')->select();

        foreach ($data as $key=>$value){
            if($value['create_time']){
                $data[$key]['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
            }
            if($value['end_time']){
                $data[$key]['end_time'] = date('Y-m-d H:i:s',$value['end_time']);
            }
            if($value['operation_time']){
                $data[$key]['operation_time'] = date('Y-m-d H:i:s',$value['operation_time']);
            }
        }

        //页数
        $paging['first_page'] = $url.'1';
        $paging['last_page'] = $url.$last_num;
        $paging['current_page'] = $url.$page;
        if($page==1){
            $paging['previous_page'] = $url.$page;
        }else{
            $n = $page-1;
            $paging['previous_page'] = $url.$n;
        }

        if($page==$last_num){
            $paging['next_page'] = $url.$page;
        }else{
            $n = $page+1;
            $paging['next_page'] = $url.$n;
        }

        //返回
        $res['list'] = $data;
        $res['page'] = $paging;

        return Helper::response(Status::SUCCESS,$res);
    }


    /*
     * 异常设备列表
     * */
    public function abnormalLists(){
        $http = 'http://';
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = $http.$server_name.substr($request_uri,0,strlen($request_uri)-1);
        $page = empty($_GET['page'])?1:$_GET['page'];

        $abnormal = M("abnormal");
        $count = $abnormal->count();
        $page_size = 6;
        $last_num = ceil($count/$page_size);
        $page_limit = ($page-1)*$page_size;
        $data = $abnormal->limit($page_limit,$page_size)->select();
        //页数
        $paging['first_page'] = $url.'1';
        $paging['last_page'] = $url.$last_num;
        $paging['current_page'] = $url.$page;
        if($page==1){
            $paging['previous_page'] = $url.$page;
        }else{
            $n = $page-1;
            $paging['previous_page'] = $url.$n;
        }

        if($page==$last_num){
            $paging['next_page'] = $url.$page;
        }else{
            $n = $page+1;
            $paging['next_page'] = $url.$n;
        }

        //返回
        $res['list'] = $data;
        $res['page'] = $paging;

        return Helper::response(Status::SUCCESS,$res);
    }

    /*
     * 排除异常设备
     * */
    public function IdDelAbnormal(){
        $id = $_GET['id'];
        if(empty($id)) return Helper::response(Status::FAIL,'检测到为空的字段');
        if(M('abnormal')->where('abnormal_id='.$id)->delete()) return Helper::response(Status::SUCCESS,null);
        return Helper::response(Status::FAIL,null);
    }

    /*
     * 异常设备---获取图像
     * */
    public function AbnormalGetImg(){
        $equipment_id = $_GET['equipment_id']?$_GET['equipment_id']:null;
        $abnormal_id = $_GET['abnormal_id']?$_GET['abnormal_id']:null;
        if(empty($equipment_id) || empty($abnormal_id)) return Helper::response(Status::FAIL,'检测到为空的字段');
        $shopInfo = M('fault')->field('user_id')->where('equipment_id='.$equipment_id)->find();
        if(empty($shopInfo)) return Helper::response(Status::FAIL,'检测不到用户信息');
        $user_id = $shopInfo['user_id'];
        $userInfo = M('user')->field('cid')->where('id='.$user_id)->find();
        $cid = $userInfo['cid'];
        if(empty($cid)) return Helper::response(Status::FAIL,'检测不到cid');

        $title = '获取截图';
        $content = json_encode(['code'=>1,'fault_id'=>$abnormal_id]);
        //实例化个推
        $igt = new \IGeTui(HOST,APPKEY,MASTERSECRET);
        //要发送的消息内容
        //$template = $this->IGtLinkTemplateTest();
        $template = D("Push")->IGtTransmissionTemplateDemo($title,$content);
        //个推信息体
        //基于应用消息体
        $message = new \IGtAppMessage();
        $message->set_isOffline(true);
        $message->set_offlineExpireTime(10*60*1000);
        $message->set_data($template);

        //接收方
        $target = new \IGtTarget();
        $target->set_appId(APPID);
        $target->set_clientId($cid);
        $rep = $igt->pushMessageToSingle($message, $target);

        if($rep['result'] && $rep['result']=='ok'){
            return Helper::response(Status::SUCCESS,'获取图像指令发送成功');
        }else{
            return Helper::response(Status::FAIL,'获取图像指令发送失败');
        }

    }


    /*
     * 异常设备--查看图像
     * */
    public function SeleImg(){
        $id = $_GET['id']?$_GET['id']:null;
        if(empty($id)) return Helper::response(Status::FAIL,'检测到为空的字段');
        $imgs = M("abnormal")->field('img')->where('abnormal_id='.$id)->find();
        if(!empty($imgs['img'])){
            $data = explode(',',$imgs['img']);
        }else{
            $data = null;
        }
        return Helper::response(Status::SUCCESS,$data);
    }
}