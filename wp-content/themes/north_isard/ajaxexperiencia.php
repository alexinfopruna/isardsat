<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
print_r($_POST);
$url=$_POST['desti'];
get_header();
//require_once('wp-includes/rewrite.php');
$id =url_to_postid( $url );

echo "$id ajaxexperience.php";

$post = get_post(2752);

get_footer(); ?>



