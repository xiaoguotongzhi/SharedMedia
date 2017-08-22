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
class ManagerController extends RuleController{
    public function index(){
        echo "test";
    }
    /*
     * 添加权限菜单
     * */
    public function AddNode(){
        if(!IS_POST) return Helper::response(Status::FAIL,'无效的传值方式Method');
        $node_name = I("post.node_name")?I("post.node_name"):null;
        $node_url = I("post.node_url")?I("post.node_url"):null;
        //$node_css = I("post.node_css")?I("post.node_css"):null;
        $pid = I("post.pid")?I("post.pid"):null;
        if(empty($node_name) || empty($node_url)){
            return Helper::response(Status::FAIL,'检测到为空的参数');
        }

        $node = M("admin_node");
        $arr[] = $_POST;
        if($id = $node->addAll($arr)) return Helper::response(Status::SUCCESS,$id);
        return Helper::response(Status::FAIL,null);

    }

    /*
     * 总菜单列表
     * */
    public function MenuLists(){
        //查询pid=0的列表
        $data = M("admin_node")->where('pid=0')->select();
        foreach ($data as $key=>$val){
            $data2 = M("admin_node")->where('pid='.$val['node_id'])->select();
            $data[$key]['child'] = $data2;
        }
        return Helper::response(Status::SUCCESS,$data);
    }

    /*
     * 删除某一菜单
     * */
    public function DelIdMenu(){
        $node_id = $_GET['node_id']?$_GET['node_id']:null;
        $model = M("admin_node");
        if($model->where('node_id='.$node_id)->delete()){
            $count = $model->where('pid='.$node_id)->count();
            if($count>0){
                $model->where('pid='.$node_id)->delete();
            }
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }


    /*
     * 更新菜单
     * */
    public function editMenu(){
        $node_id = I('get.node_id');
        $data = I('post.');
        foreach ($data as $k=>$v){
            $da[$k] = $v;
            M("admin_node")->where('node_id='.$node_id)->save($da);
        }
        return Helper::response(Status::SUCCESS,null);
    }


    /*
     * 添加角色
     * */
    public function addRole(){
        if(!IS_POST) return Helper::response(Status::FAIL,'无效的传值方式Method');
        $role_name = $_POST['role_name'];
        if(empty($role_name)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $role = M("admin_role");
        $count = $role->where('role_name='.$role_name)->count();
        if($count>0) return Helper::response(Status::FAIL,'请勿重复添加');
        $data['role_name'] = $role_name;
        if($id = $role->add($data)) return Helper::response(Status::SUCCESS,$id);
        return Helper::response(Status::FAIL,null);
    }


    /*
     * 角色列表
     * */
    public function RoleLists(){
        $data = M("admin_role")->select();
        return Helper::response(Status::SUCCESS,$data);
    }


    /*
     * 新增管理员
     * */
    public function addNewManager(){

        //设置用户账户信息
        $username = $_POST['username'];
        $pwd = '123456';
        $pub = D("Public");
        $res = $pub->generateHashWithSalt($pwd);
        $password = $res['password'];
        $salt = $res['salt'];

        //设置用户权限
        $role = explode(',',$_POST['role']);

        $data['username'] = $username;
        $data['password'] = $password;
        $data['create_time'] = time();
        $data['create_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['salt'] = $salt;
        $admin_user = M("admin_user");
        $count = $admin_user->where('username='.$username)->count();
        if($count>0) return Helper::response(Status::FAIL,'请勿重复添加');
        if($id = $admin_user->add($data)){
            //等待处理(node遍历入库)
            $arr = array();
            foreach ($role as $key=>$val){
                $arr[$key]['user_id'] = $id;
                $arr[$key]['role_id'] = $val;
            }
            $admin_user_role = M("admin_user_role");
            if($admin_user_role->addAll($arr)){
                return Helper::response(Status::SUCCESS,['user_id'=>$id]);
            }else{
                return Helper::response(Status::FAIL,null);
            }
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }



    /*
     * 管理员列表
     * */
    public function ManagersList(){
        $admin_user = M("admin_user");
        $data = $admin_user
            ->join('admin_user_role ON admin_user.id = admin_user_role.user_id')
            ->join('admin_role ON admin_user_role.role_id = admin_role.role_id')
            ->select();

        $arr = array();
        foreach ($data as $key=>$val) {
            $arr[$val['id']]['user_id'] = $val['id'];
            $arr[$val['id']]['username'] = $val['username'];
            $arr[$val['id']]['role_name'][] = $val['role_name'];
            $arr[$val['id']]['create_time'] = date('Y-m-d H:i:s',$val['create_time']);
        }
        return Helper::response(Status::SUCCESS,$arr);
    }


    /*
     * 管理员信息详情
     * */
    public function ManagerIdInfo(){
        $user_id = $_GET['user_id']?$_GET['user_id']:null;
        if(empty($user_id)) return Helper::response(Status::FAIL,'检测到为空的参数');

        $admin_user = M("admin_user");
        $data = $admin_user
            ->join('admin_user_role ON admin_user.id = admin_user_role.user_id')
            ->join('admin_role ON admin_user_role.role_id = admin_role.role_id')
            ->where('admin_user.id='.$user_id)
            ->select();

        $arr = array();
        foreach ($data as $key=>$val) {
            $arr[$val['id']]['user_id'] = $val['id'];
            $arr[$val['id']]['username'] = $val['username'];
            $arr[$val['id']]['role_name'][] = $val['role_name'];
            $arr[$val['id']]['create_time'] = date('Y-m-d H:i:s',$val['create_time']);
        }
        return Helper::response(Status::SUCCESS,$arr);
    }


    /*
     * 修改管理员角色信息
     * */
    public function editManagerInfo(){
        $user_id = $_POST['user_id']?$_POST['user_id']:null;
        $role = explode(',',$_POST['role']);
        if(empty($user_id) || empty($role)) return Helper::response(Status::FAIL,'检测到为空的参数');
        //先删除再添加
        $admin_user_role = M("admin_user_role");
        if($admin_user_role->where('user_id='.$user_id)->delete()){
            $arr = array();
            foreach ($role as $key=>$val){
                $arr[$key]['user_id'] = $user_id;
                $arr[$key]['role_id'] = $val;
            }

            if($admin_user_role->addAll($arr)){
                return Helper::response(Status::SUCCESS,null);
            }else{
                return Helper::response(Status::FAIL,null);
            }

        }else{
            return Helper::response(Status::FAIL,null);
        }
    }

    /*
     * 角色信息删除
     * */
    public function delRoleInfo(){
        $user_id = $_GET['user_id']?$_GET['user_id']:null;
        if(empty($user_id)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $admin_user = M("admin_user");
        //删除管理员表
        if($admin_user->where('id='.$user_id)->delete()){
            //删除管理员角色表
            $admin_user_role = M("admin_user_role");
            if($admin_user_role->where('user_id='.$user_id)->delete()){
                return Helper::response(Status::SUCCESS,null);
            }else{
                return Helper::response(Status::FAIL,null);
            }
        }
    }


    /*
     * 角色密码重置
     * */
    public function PasswordReset(){
        $user_id = $_GET['user_id']?$_GET['user_id']:null;
        if(empty($user_id)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $pwd = '123456';
        $pub = D("Public");
        $res = $pub->generateHashWithSalt($pwd);
        $password = $res['password'];
        $salt = $res['salt'];

        $data['password'] = $password;
        $data['salt'] = $salt;
        $admin_user = M("admin_user");
        if($admin_user->where('id='.$user_id)->save($data)){
            return Helper::response(Status::SUCCESS,null);
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }


    /*
     * 职位列表
     * */
    public function positionLists(){
        $model = M("admin_role");
        $model2 = M("admin_role_node");
        $data = $model->select();//父级
        foreach ($data as $key=>$value){
            $data2 = $model2->where('role_id='.$value['role_id'])->join('admin_node ON admin_role_node.node_id = admin_node.node_id')->select();
            if(empty($data2)){
                $data[$key]['child'] = null;
            }else{
                $data[$key]['child'] = $data2;
            }
        }
        return Helper::response(Status::SUCCESS,$data);
    }


    /*
     * 职位详情
     * */
    public function positionIdInfo(){
        $role_id = $_GET['role_id']?$_GET['role_id']:null;
        if(empty($role_id)) return Helper::response(Status::FAIL,'检测到为空的参数');

        $model = M("admin_role");
        $model2 = M("admin_role_node");
        $data = $model->where('role_id='.$role_id)->find();//父级
        $data2 = $model2->where('role_id='.$data['role_id'])->join('admin_node ON admin_role_node.node_id = admin_node.node_id')->select();
        $data['child'] = $data2;
        return Helper::response(Status::SUCCESS,$data);
    }


    /*
     * 修改职位权限
     * */
    public function editIdNode(){

        $type = $_POST['type']?$_POST['type']:null;

        if($type==1){

            $role_id = $_POST['role_id']?$_POST['role_id']:null;
            $role_name = $_POST['role_name']?$_POST['role_name']:null;
            if(empty($role_id) || empty($role_name)) return Helper::response(Status::FAIL,'检测到为空的参数');
            $data['role_name'] = $role_name;
            if(M("admin_role")->where('role_id='.$role_id)->save($data)) return Helper::response(Status::SUCCESS,null);
            return Helper::response(Status::FAIL,null);

        }elseif ($type==2){
            $role_id = $_POST['role_id']?$_POST['role_id']:null;
            $node = explode(',',$_POST['node']);
            if(empty($role_id) || empty($node)) return Helper::response(Status::FAIL,'检测到为空的参数');
            if(M("admin_role_node")->where('role_id='.$role_id)->delete()){
                $arr = array();
                foreach ($node as $key=>$val){
                    $arr[$key]['role_id'] = $role_id;
                    $arr[$key]['node_id'] = $val;
                }

                if(M("admin_role_node")->addAll($arr)){
                    return Helper::response(Status::SUCCESS,null);
                }else{
                    return Helper::response(Status::FAIL,null);
                }

            }else{
                return Helper::response(Status::FAIL,null);
            }


        }else{
            return Helper::response(Status::FAIL,'未定义的状态');
        }

    }

    /*
     * 权限列表
     * */
    public function nodeLists(){
        $admin_node = M("admin_node");
        $data = $admin_node->where('pid=0')->select();
        return Helper::response(Status::SUCCESS,$data);
    }


    /*
     * 删除职位信息
     * */
    public function delNodeInfo(){
        $role_id = $_GET['role_id']?$_GET['role_id']:null;
        if(empty($role_id)) return Helper::response(Status::FAIL,'检测到为空的参数');
        //删除角色表信息
        $admin_role = M("admin_role");
        if($admin_role->where('role_id='.$role_id)->delete()){
            //删除角色权限关联表
            $admin_role_node = M("admin_role_node");
            $count = $admin_role_node->where('role_id='.$role_id)->count();
            if($count>0){
                if($admin_role_node->where('role_id='.$role_id)->delete()){
                    return Helper::response(Status::SUCCESS,null);
                }else{
                    return Helper::response(Status::FAIL,null);
                }
            }else{
                return Helper::response(Status::SUCCESS,null);
            }
        }else{
            return Helper::response(Status::FAIL,null);
        }
    }

    /*
     * 属于当前用户的权限菜单列表
     * */
    public function UserHaveMenuLists()
    {
        //查询一级菜单
        $username = $_SESSION['username'];
        $sql="select admin_node.* from admin_user,admin_user_role,admin_role_node,admin_node
                where admin_user.id=admin_user_role.user_id
                and admin_user_role.role_id=admin_role_node.node_id
                and admin_role_node.node_id=admin_node.node_id
                and admin_user.username='$username'";
        $db3=D();
        $arr3=$db3->query($sql);

        //循环一下根据pid查询二级菜单然后通过判断合并到相应的一级菜单中
        foreach ($arr3 as $k => $v) {
            $sql2 = "SELECT * FROM admin_node WHERE pid = ".$v['node_id'];
            $db5 = D();
            $arr5 = $db5->query($sql2);
            if(empty($arr5)){
                $arr3[$k]['child'] = null;
            }else{
                $arr3[$k]['child'] = $arr5;
            }

        }

        return Helper::response(Status::SUCCESS,$arr3);

    }
}