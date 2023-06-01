<!doctype html>
<html <?php language_attributes(); ?>  lang="en" ng-app="wpApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title('%laquo', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="container header">
    <div class="row">
        <div class="col-sm-7" >
            <h1>
                <a href="/">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>

        </div>
        <div class="col-sm-7 col-sm-offset-7">
            <span>by: </span><a href="">Javier Juan Uceda</a>
        </div>
    </div>
</header>
<div class="container-fluid content-wrapper">
    <div class="container">


