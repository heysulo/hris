<?php
/**
 * Created by PhpStorm.
 * User: emalsha
 * Date: 8/19/16
 * Time: 2:17 PM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (session_destroy()){
    header("location:../../index.php");
}