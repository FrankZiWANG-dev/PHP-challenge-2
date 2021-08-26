<?php
$is_set =
    isset($_POST['username']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['role']);

$is_not_empty =
    !empty($_POST['username']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password']) &&
    !empty($_POST['role']);

if ($is_set && $is_not_empty){

}