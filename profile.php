<?php
session_start();
include_once('navbar.php');
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
  }
?>