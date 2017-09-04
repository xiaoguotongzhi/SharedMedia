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
class ShopController extends RuleController{
    /*
     * 商家列表
     * */
    public function ShoperList(){
        $http = 'http://';
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = $http.$server_name.substr($request_uri,0,strlen($request_uri)-1);
        $page = empty($_GET['page'])?1:$_GET['page'];

        $user = M("user");
        $count = $user->count();
        $page_size = 6;
        $last_num = ceil($count/$page_size);
        $page_limit = ($page-1)*$page_size;
        $data = $user->field('id,equipment_num,money_count')->limit($page_limit,$page_size)->select();

        $equipment = M("equipment");
        foreach($data as $key=>$val){
            $count = $equipment->field('sum(looking_num),sum(order_num)')->where('shop_id='.$val['id'])->find();
            $looking_num = empty($count['sum(looking_num)'])?0:$count['sum(looking_num)'];
            $order_num = empty($count['sum(order_num)'])?0:$count['sum(order_num)'];
            $data[$key]['looking_num'] = $looking_num;
            $data[$key]['order_num'] = $order_num;
        }

        //页数
        $paging['count_page'] = $last_num;
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
     * 根据id查看商家用户详情
     * */
    public function ShoperIdInfo(){
        $user_id = $_GET['user_id']?$_GET['user_id']:null;
        if(empty($user_id)) return Helper::response(Status::FAIL,'检测到为空的参数');
        $user = M("user");
        $data = $user->find();
    }


    /*
     * 提现申请
     * */
    public function withdrawalsLists(){
        $page = empty($_GET['page'])?1:$_GET['page'];
        $http = 'http://';
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = $http.$server_name.substr($request_uri,0,strlen($request_uri)-1);

        $withdrawals = M("withdrawals");
        $count = $withdrawals->join('user ON withdrawals.user_id=user.id')->count();
        $page_size = 6;
        $last_num = ceil($count/$page_size);
        $page_limit = ($page-1)*$page_size;
        $data = $withdrawals->field('withdrawals.w_id,withdrawals.money,withdrawals.create_time,withdrawals.create_ip,withdrawals.user_id,withdrawals.status,withdrawals.card_name,user.username,user.shop_name')->join('user ON withdrawals.user_id=user.id')->limit($page_limit,$page_size)->select();

        //页数
        $paging['count_page'] = $last_num;
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
     * 提现申请操作
     * */
    public function withdrawalsIdControl(){
        $type = $_GET['type']?$_GET['type']:null;
        if($type==1){
            //通过
            $w_id = $_GET['w_id']?$_GET['w_id']:null;
            if(empty($w_id)) return Helper::response(Status::FAIL,'检测到为空的参数');

            $data['status'] = 2;
            $model = M("withdrawals");
            if($model->where('w_id='.$w_id)->save($data)){
                return Helper::response(Status::SUCCESS,null);
            }else{
                return Helper::response(Status::FAIL,null);
            }
        }elseif ($type==2){
            //未通过(先改状态再执行退款)
            $w_id = $_GET['w_id']?$_GET['w_id']:null;
            $user_id = $_GET['user_id']?$_GET['user_id']:null;
            $money = $_GET['money']?$_GET['money']:null;
            if(empty($w_id) || empty($user_id)) return Helper::response(Status::FAIL,'检测到为空的参数');

            $model = M("withdrawals");
            $data['status'] = 3;
            if($model->where('w_id='.$w_id)->save($data)){
                //退款
                $current_money = M("user")->field('current_money')->where('id='.$user_id)->find();
                $last_money = $current_money['current_money']+$money;
                $data2['current_money'] = $last_money;
                if(M("user")->where('id='.$user_id)->save($data2)){
                    return Helper::response(Status::SUCCESS,null);
                }else{
                    return Helper::response(Status::FAIL,null);
                }
            }else{
                return Helper::response(Status::FAIL,null);
            }

        }else{
            return Helper::response(Status::FAIL,'未识别的操作状态');
        }
    }
}