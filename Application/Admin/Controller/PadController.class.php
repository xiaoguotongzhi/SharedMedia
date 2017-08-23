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
        $fault = M("fault");
        $data = $fault->order('end_time desc')->select();
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

        $count=count($data);
        $Page=new \Think\Page($count,10);
        $show       = $Page->show();
        $list=array_slice($data,$Page->firstRow,$Page->listRows);

        $res['list'] = $list;
        $res['page'] = $show;

        return Helper::response(Status::SUCCESS,$res);
    }
}