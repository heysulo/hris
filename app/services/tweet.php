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
}

