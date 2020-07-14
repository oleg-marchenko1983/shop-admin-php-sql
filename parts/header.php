<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/icon.png">

    <title>Shop</title>
</head>

<body>
    <!--- MENU HEADER ------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Shop-master</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Contacts</a>
                </li>
            </ul>
            <!-------------- Форма поиска отзывов --------------------------->
            <div class="row">
                <div class="col-12">
                    <form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success no-text-decoration " id="go-busket" href="/basket.php">
                            Перейти в корзину
                            <img src="img/cart.png" width="22px">
                            <span id="count"></span>
                        </a>
                    </form>

                </div>

            </div>


            <!--- корзина--->
    </nav>
    <!---- END MENU HEADER------>

    <!------ LEFT NAV MENU --------->
    <div class="container">
        <div class="row m-3">
            <div class="col-3">
                <?php
                // Подключаем левое меню с категориями
                include $_SERVER['DOCUMENT_ROOT'] . "/parts/cat_nav.php" ?>
            </div>
            <!--- RIGHT COL CARD--->
            <div class="col-9">
                <div class="container">