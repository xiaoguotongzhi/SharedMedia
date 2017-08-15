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
class ManagerController extends RuleController{
    /*
     * 添加权限菜单
     * */
    public function AddNode(){
        if(!IS_POST) return Helper::response(Status::FAIL,'无效的传值方式Method');
        $node_name = I("post.node_name")?I("post.node_name"):null;
        $node_url = I("post.node_url")?I("post.node_url"):null;
        $node_css = I("post.node_css")?I("post.node_css"):null;
        $pid = I("post.pid")?I("post.pid"):null;
        if(empty($node_name) || empty($node_url) || empty($node_css)){
            return Helper::response(Status::FAIL,'检测到为空的参数');
        }

        $node = M("admin_node");
        $arr[] = $_POST;
        if($node->addAll($arr)) return Helper::response(Status::SUCCESS,null);
        return Helper::response(Status::FAIL,$node->getErrors());

    }


    /*
     * 添加角色
     * */
    public function addRole(){
        if(!IS_POST) return Helper::response(Status::FAIL,'无效的传值方式Method');
        $role_name = $_POST['role_name'];
        if(empty($role_name)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $data['role_name'] = $role_name;
        $role = M("admin_role");
        if($id = $role->add($data)) return Helper::response(Status::SUCCESS,$id);
        return Helper::response(Status::FAIL,$role->getErrors());
    }
}