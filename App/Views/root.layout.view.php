<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91bb1fdf20.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/styl.css">
    <script src="public/js/script.js"></script>
</head>
<body>
<div class="hlavicka fixed-top">
    <nav class="navbar navbar-expand-md navbar-dark punchPinkDark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Trasovanie zásielok</a>
            <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="skryte collapse navbar-collapse efekt-hover" id="collapsibleNavbar">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link link-light p-2" href="?c=home"">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light p-2" href="?c=newpackage">Nová zásielka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light p-2" href="?c=history">História zásielok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light p-2" href="?c=deliverycompanies">Prepravcovia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light p-2" href="?c=contact">Kontakt</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>
<div class="main">
    <div class="navigacia efekt-hover punchPinkDark" id="sidebar">
        <ul class="navbar-nav nav-pills flex-column p-2 sticky-top">
            <li class="nav-item">
                <a class="nav-link link-light p-2" href="?c=home">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-light p-2" href="?c=newpackage">Nová zásielka</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-light p-2" href="?c=history">História zásielok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-light p-2" href="?c=deliverycompanies">Prepravcovia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-light p-2" href="?c=contact">Kontakt</a>
            </li>
        </ul>
    </div>

    <div class="web-content obsah">
        <?= $contentHTML ?>
    </div>
</div>



</body>
</html>
