<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bikes list</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/header.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/mian.css">
</head>
<body>
<!--<pre>-->
<!--    --><? //= var_dump($_SESSION) ?>
<!--</pre>-->
<div class="bgLogin <? if (!isset($_SESSION['msg'])) { ?>hidden<? } ?>">
    <div class="log-in ">
        <svg id="cansel" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
             class="bi bi-arrow-up-right-square-fill " viewBox="0 0 16 16">
            <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z"/>
        </svg>
        <? if (!isset($_SESSION['login'])): ?>
            <form action="/login" method="post">
                <p><label>Login <input type="text" name="login"></label></p>
                <p><label>Password <input type="password" name="password"></label></p>
                <input type="submit" name="submitIn">
            </form>
        <? endif; ?>
        <? if (isset($_SESSION['msg'])) { ?>
            <div class="error text-center">
                <? foreach ($_SESSION['msg'] as $e) { ?>
                    <p class="alert-danger"><?= $e ?></p>
                <? } ?>
            </div>
        <? } ?>
    </div>
</div>
<div class="container header">
    <div class="nav row text-center">
        <div class="col-sm-4 "><a href="/index"><img src="https://storage.yandexcloud.net/bike/arend_bike.png"
                                                     style="width: 40px; height: 40px" alt="Logo"></a></div>
        <div class="col-sm-4 ">Best Bike</div>

        <div class="col-sm-2 text-right <? if (!isset($_SESSION['login'])) { ?>hidden<? } ?>"><?= $_SESSION['login'] ?></div>
        <div id="out" class="col-sm-2  text-left <? if (!isset($_SESSION['login'])) { ?>hidden<? } ?>">Выйти</div>

        <div id="in" class="col-sm-4 <? if (isset($_SESSION['login'])) { ?>hidden<? } ?>">Войти</div>
    </div>
</div>

<script>
    window.addEventListener('load', function () {
        let inlog = document.getElementById('in');
        let outlog = document.getElementById('out');
        let login = document.getElementsByClassName('bgLogin')[0];
        let cansel = document.getElementById('cansel');

        inlog.onclick = function () {
            login.classList.remove('hidden');
        };
        outlog.onclick = function () {
            document.location.href = '/logout';
        };
        cansel.onclick = function () {
            login.classList.add('hidden');
        };
    })
</script>
