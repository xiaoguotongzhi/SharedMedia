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
class BannerController extends RuleController{
    /*
     * 新增广告
     * */
    public function AddNewBanner()
    {

        $html_url = $_POST['html_url'];
        $banner_order = $_POST['banner_order'];

        //处理图片
        $imginfo = $_FILES['img'];
        $imgname = $imginfo['name'];

        if(empty($imgname)){
            return Helper::response(Status::FAIL,'检测图片失败');
        }

        $oss = new \Oss();//实例化oss类
        $rand = rand(1,99999).time();   //时间戳拼接五位随机数，作为图片名称
        $suffix = substr($imgname,strrpos($imgname,".")+1);   //截取图片的后缀名字
        $object = "media/".$rand.".".$suffix;   //拼接上传到oss 之中的路径
        $imgpath = $imginfo['tmp_name'];
        $oss -> upload($object,$imgpath);   //调用oss类中的upload方法
        $path = "http://peita.oss-cn-beijing.aliyuncs.com/".$object;   //入数据表表img字段的数据


        $arr['img'] = $path;
        $arr['html_url'] = $html_url;
        $arr['status'] = '1';
        $arr['create_time'] = time();
        $arr['banner_order'] = $banner_order;

        $model = M("banner");
        if($id = $model->add($arr)){
            return Helper::response(Status::SUCCESS,$id);
        }else{
            return Helper::response(Status::FAIL,null);
        }

    }


    /*
     * 序号验证
     * */
    public function OrderYz()
    {
        $banner_order = $_GET['banner_order'];
        $model = M("banner");
        $count = $model->where('banner_order='.$banner_order)->count();
        if($count>=1){
            return Helper::response(Status::FAIL,'已存在的序号');
        }else{
            return Helper::response(Status::SUCCESS,'验证通过');
        }
    }

    /*
     * 广告详情
     * */
    public function BannerInfo()
    {

        $model = M("banner");
        $data = $model->select();
        $count = count($data);
        $Page = new \Think\Page($count,10);
        $show = $Page->show();
        $list=array_slice($data,$Page->firstRow,$Page->listRows);
        $res['list'] = $list;
        $res['page'] = $show;

        return Helper::response(Status::SUCCESS,$res);
    }

    /*
     * 修改广告排列序号
     * */
    public function AdminOrderSave()
    {
        $id = $_GET['id'];
        $data['banner_order'] = $_GET['banner_order'];
        $model = M("banner");
        if($model->where('id='.$id)->save($data)){
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }

    }

    /*
     * 根据id查看广告信息
     * */
    public function EditBannerIdInfo()
    {
        $id = $_GET['id'];
        $model = M("banner");
        $data = $model->where('id='.$id)->find();
            if($data['create_time']){
                $data['create_time'] = date('Y-m-d H:i:s',$data['create_time']);
            }

            if($data['update_time']){
                $data['update_time'] = date('Y-m-d H:i:s',$data['update_time']);
            }
        return Helper::response(Status::SUCCESS,$data);
    }

    /*
     * 广告修改
     * */
    public function EditBanner()
    {
        $id = $_GET['id'];
        $data = $_POST;
        $model = M("banner");
        if($model->where('id='.$id)->save($data)){
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }

    /*
     * ID删除广告
     * */
    public function BannerIdDel()
    {
        $id = $_GET['id'];
        $model = M("banner");
        if($model->where('id='.$id)->delete()){
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }
}