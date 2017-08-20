<?php
namespace Common\Common;
header('Content-Type:application/json; charset=utf-8');
class Page{
//   每页显示的个数
    protected $number;
//   一共有多少数据
    protected $totalCount;
//   当前页
    protected $page;
//   url
    protected $url;

    public function __construct($number,$totalCount){
        $this->number= $number;
        $this->totalCount = $totalCount;
        //得到总页数
        $this->totalPage = $this->getTotalPage();
        //得到当前页数
        $this->page = $this->getPage();
        //得到URL
        $this->url = $this->getUrl();
        echo $this->url;
    }
    /*得到总页数并向上取整*/
    protected function getTotalPage(){
        return   ceil($this->totalCount/$this->number);
    }
    /**/
    protected function getPage(){
        if (empty($_GET['page'])){
            $page=1;
        }elseif ($_GET['page'] > $this->totalPage){
            $page = $this->totalPage;
        }elseif ($_GET["page"]<1){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }
        return $page;
    }
    protected function getUrl(){
        //得到协议名
        $scheme = $_SERVER['REQUEST_SCHEME'];
        //得到主机名
        $host= $_SERVER['SERVER_NAME'];
        //得到端口号
        $port = $_SERVER['SERVER_PORT'];
        //得到路径和请求字符串
        $url = $_SERVER['REQUEST_URI'];
        /*中间做处理,要将page=5等这种字符串拼接URL
        中，所以如果原来的url中有page这个参数，我们首先
        需要将原来的page参数给清空*/
        $urlArray = parse_url($url);
//     var_dump($urlArray);

        $path = $urlArray['path'];
        if (!empty($urlArray['query'])){
            //将query中的值转化为数组
            parse_str($urlArray['query'],$array);
            //如果他有page就将它删掉
            unset($array['page']);
            //将关联数组转化为query
            $query = http_build_query($array);
            //不为空的话就与path连结
            if ($query != ''){
                $path = $path.'?'.$query;
            }
        }
        return 'http://'. $host.':'.$port.$path;
    }
    protected function setUrl($str){
        if (strstr($this->url, '?')){
            $url = $this->url.'&'.$str;
        }else{
            $url = $this->url.'?'.$str;
        }
        return $url;
    }
    /*所有的url*/
    public function allUrl(){
        return [
            'first' => $this->first(),
            'next' => $this->next(),
            'prev'=> $this->prev(),
            'end'=> $this->end(),
        ];
    }
    /*首页*/
    public function first(){
        return $this->setUrl('page=1');
    }
    /*下一页*/
    public function next(){
        //根据当前page得带下一页的页码
        if ($this->page+1 > $this->totalPage) {
            $page = $this->totalPage;
        }else{
            $page = $this->page+1;
        }
        return $this->setUrl('page='.$page);
    }
    /*上一页*/
    public function prev(){
        //根据当前page得带下一页的页码
        if ($this->page - 1 < 1) {
            $page = 1;
        }else{
            $page = $this->page-1;
        }
        return $this->setUrl('page='.$page);
    }
    /*尾页*/
    public function end(){
        return $this->setUrl('page='.$this->totalPage);
    }
    /*limit 0,5*/
    public function limit(){
        $offset = ($this->page-1)*$this->number;
        return $offset.','.$this->number;
    }

}