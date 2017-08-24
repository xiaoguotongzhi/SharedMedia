<?php


use OSS\OssClient;
use OSS\Core\OssException;
require_once __DIR__ . '/autoload.php';

class Oss{


        function upload($object,$file){

            $accessKeyId = "LTAI3FxEI62fdQ0l";
            $accessKeySecret = "9OWXyM1itZC0S1hVO7MuQc9AZ1XovX";
            $endpoint = "peita.oss-cn-beijing.aliyuncs.com";

            $bucket = 'peita';  //生成好的bucket

            try {
                $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint,true);



                //判断存储空间是否存在
                $isExist = $ossClient->doesBucketExist($bucket);


                if(!$isExist)
                {
                    throw new OssException('bucket is not exist');
                }





                // $object = "images/IMG_0096.JPG";  //oss 存储文件路径
                // $file = './Public/images/header_left.jpg';  //本地文件路径
                $options = array();
                $ossClient->uploadFile($bucket, $object, $file, $options);

                //$result = $ossClient->multiuploadFile($bucket, $object, $filePath);



            } catch (OssException $e) {
                print $e->getMessage();
            }
        }

}