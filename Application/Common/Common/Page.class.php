<?php
namespace Common\Common;
header('Content-Type:application/json; charset=utf-8');
class Page{
    public function show_page($table,$page){
        $http = 'http://';
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = $http.$server_name.substr($request_uri,0,strlen($request_uri)-1);
        
        $model = M("$table");
        $count = $model->count();
        $page_size = 6;
        $last_num = ceil($count/$page_size);
        $page_limit = ($page-1)*$page_size;
        $data = $model->limit($page_limit,$page_size)->select();

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

        return $res;
    }
}