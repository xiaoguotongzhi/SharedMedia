<?php
namespace Admin\Controller;
use Common\Common\Page;
use Think\Controller;

use Common\Common\Helper;
use Common\Common\Status;
header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-origin:*');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');

include("./ThinkPHP/Library/Vendor/oss/index.php");
class ActiveController extends RuleController{
    /*
     * 广告审核列表
     * */
    public function AdvertisingAuditLists(){
        $page = empty($_GET['page'])?1:$_GET['page'];
        $http = 'http://';
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = $http.$server_name.substr($request_uri,0,strlen($request_uri)-1);

        $model = M("active");
        $count = $model->count();
        $page_size = 6;
        $last_num = ceil($count/$page_size);
        $page_limit = ($page-1)*$page_size;
        $data = $model->limit($page_limit,$page_size)->select();

        foreach($data as $key=>$v){
            if($v['create_time']){
                $data[$key]['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
            }

            if(empty($v['imgs'])){
                $data[$key]['imgs'] = null;
            }else{
                $imgArr = explode(',',$v['imgs']);
                $data[$key]['imgs'] = is_array($imgArr)?$imgArr['0']:null;
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
     * 广告审核---点击查看图片详情
     * */
    public function ImgInfo(){
        $a_id = $_GET['a_id']?$_GET['a_id']:null;
        if(empty($a_id)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $imgInfo = M('active')->field('imgs')->where('a_id='.$a_id)->find();
        if(empty($imgInfo)){
            $img = null;
        }else{
            $img = explode(',',$imgInfo['imgs']);
        }
        return Helper::response(Status::SUCCESS,$img);
    }

    /*
     * 广告审核---通过
     * */
    public function activeOk(){
        $a_id = $_GET['a_id']?$_GET['a_id']:null;
        if(empty($a_id)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $data['status'] = 2;
        if(M('active')->where('a_id='.$a_id)->save($data)){
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }


    /*
     * 广告审核---失败
     * */
    public function activeNo(){
        $a_id = $_POST['a_id']?$_POST['a_id']:null;
        $fail_reason = $_POST['fail_reason']?$_POST['fail_reason']:null;
        if(empty($a_id) || empty($fail_reason)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $data['status'] = 3;
        $data['fail_reason'] = $fail_reason;
        if(M("active")->where('a_id='.$a_id)->save($data)){
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }
}