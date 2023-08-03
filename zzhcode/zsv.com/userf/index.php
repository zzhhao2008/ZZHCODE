<!DOCTYPE html>
<html>

<head>
    <link rel='shortcut icon' href="/icon.png">
    <script src="/static/bootstrap-3.4.1-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/static/bootstrap-3.4.1-dist/css/bootstrap.css" th:href="@{/lib/semantic/dist/semantic.min.css}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理-ZZHCODE</title>
    <style>
        pre {
            white-space: pre-wrap;
            word-break: break-all;
        }

        .row {
            margin-top: 50px;
        }
    </style>
</head>
<?php
session_start();
if ($_POST['adminpas'] === '114514') {
    $_SESSION['admintime'] = time();
    $_SESSION['pasadm'] = "114514";
}
?>

<body>
    <?php include "../static/generalheadbar.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h2>用户中心</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="?publish">发布文章</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8">
                <? if (empty($_COOKIE['id'])) {  ?>
                    <h1>请登录后再试！</h1>
                <? } else {
                    if (isset($_GET['publish'])) include "dealf/publish.php";
                } ?>
            </div>
        </div>
    </div>
</body>
<?php if ($_POST) : ?>
    <script>window.location=location.href</script>
<? endif; ?>