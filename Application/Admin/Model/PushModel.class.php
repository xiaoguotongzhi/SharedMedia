<?php
namespace Admin\Model;
use Think\Model;
class PushModel extends Model {
    function IGtTransmissionTemplateDemo($title,$content){
        $template =  new \IGtTransmissionTemplate();
        $template->set_appId(APPID);//应用appid
        $template->set_appkey(APPKEY);//应用appkey
        $template->set_transmissionType(2);//透传消息类型
        $template->set_transmissionContent($content);//透传内容

//       APN高级推送
        $apn = new \IGtAPNPayload();
        $alertmsg=new \DictionaryAlertMsg();
        $alertmsg->body=$content;
        $alertmsg->actionLocKey="ActionLockey";
        $alertmsg->locKey="LocKey";
        $alertmsg->locArgs=array("locargs");
        $alertmsg->launchImage="launchimage";
//        iOS8.2 支持
        $alertmsg->title=$title;
        $alertmsg->titleLocKey="TitleLocKey";
        $alertmsg->titleLocArgs=array("TitleLocArg");

        $apn->alertMsg=$alertmsg;
        $apn->badge=1;
        $apn->sound="";
        $apn->add_customMsg("payload",$content);
        $apn->contentAvailable=1;
        $apn->category="ACTIONABLE";
        $template->set_apnInfo($apn);

        return $template;
    }
}