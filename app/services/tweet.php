<?php
// require codebird
require_once('src/codebird.php');
/*
$consumerkey = $_POST['consumerkey'];
$consumersecret = $_POST['consumersecret'];
$apptoken = $_POST['apptoken'];
$appsecret = $_POST['appsecret'];
$msg = $_POST['msg'];*/
function tweet($consumerkey,$consumersecret,$apptoken,$appsecret,$msg)
{

    \Codebird\Codebird::setConsumerKey($consumerkey, $consumersecret);
    $cb = \Codebird\Codebird::getInstance();
    $cb->setToken($apptoken, $appsecret);

    $params = array('status' => "" . $msg);
    $reply = $cb->statuses_update($params);
    $re = "";
    foreach ($reply as $key => $val){
        if($key == "httpstatus"){
            $re = $val;
        }
        //echo $key == 'httpstatus' ? $val : "";
    }
    return $re;
}
//[httpstatus] => 200

//tweet('5OVXuPQNu8mL4O9cKzjt1Kn3j','p3NMJNzmK0p4dKQATDp6HOFSTVtO87r7P8seCrtxq8ZB5TTgwW','820942167417856000-sOjwGmHBmKUwOey6mbrM4Dcj06BF7Sl','sujSWekHskfXNu25J16nI36kyrbImKLrBafj9dTnIlqbw','tweet me 4');