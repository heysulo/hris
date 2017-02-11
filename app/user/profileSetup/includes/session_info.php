<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 9/19/16
 * Time: 11:48 AM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo $_SESSION['email'];