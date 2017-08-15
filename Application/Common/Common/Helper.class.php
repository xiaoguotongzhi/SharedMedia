<?php
namespace Common\Common;
header('Content-Type:application/json; charset=utf-8');
class Helper{
    //返回json
    public function response($code,$data=null){
        if($code==20000){
            echo json_encode(['code'=>$code,'msg'=>'成功','data'=>$data]);die;
        }else{
            echo json_encode(['code'=>$code,'msg'=>'失败','data'=>$data]);die;
        }

    }
}