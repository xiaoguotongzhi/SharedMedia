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

        foreach ($data as $key=>$value){
            if($value['abmprmal_time']){
                $data[$key]['abmprmal_time'] = date('Y-m-d H:i:s',$value['abmprmal_time']);
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
}