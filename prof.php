<?php

error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

session_start();

include("db.php");

if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {

    $loginUser = $_SESSION['login'];

    echo $loginUser;

}
