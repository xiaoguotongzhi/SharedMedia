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
class ShopController extends RuleController{
    /*
     * 商家列表
     * */
    public function ShoperList(){
        $user = M("user");
        $data = $user->field('id,equipment_num,money_count')->select();
        $equipment = M("equipment");
        foreach($data as $key=>$val){
            $count = $equipment->field('sum(looking_num),sum(order_num)')->where('shop_id='.$val['id'])->find();
            $looking_num = empty($count['sum(looking_num)'])?0:$count['sum(looking_num)'];
            $order_num = empty($count['sum(order_num)'])?0:$count['sum(order_num)'];
            $data[$key]['looking_num'] = $looking_num;
            $data[$key]['order_num'] = $order_num;
        }

        $count=count($data);
        $Page=new \Think\Page($count,10);
        $show       = $Page->show();
        $list=array_slice($data,$Page->firstRow,$Page->listRows);

        $res['list'] = $list;
        $res['page'] = $show;

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
        $withdrawals = M("withdrawals");
        $data = $withdrawals->field('withdrawals.w_id,withdrawals.money,withdrawals.create_time,withdrawals.create_ip,withdrawals.user_id,withdrawals.status,withdrawals.card_name,user.username,user.shop_name')->join('user ON withdrawals.user_id=user.id')->select();

        $count=count($data);
        $Page=new \Think\Page($count,10);
        $show       = $Page->show();
        $list=array_slice($data,$Page->firstRow,$Page->listRows);

        $res['list'] = $list;
        $res['page'] = $show;

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