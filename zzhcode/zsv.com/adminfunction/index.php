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
    <div class="containers">
        <div class="row">
            <div class="col-sm-1">
                <h2>后台管理</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="?OPENCODE">OPENCODE</a></li>
                    <li><a href="?publish">发布文章</a></li>
                    <li><a href="?mpas">管理文章</a></li>
                    <li><a href="?publuogu">洛谷题目</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-11">
                <? if ($_SESSION['admintime'] < time() - 3600 * 24 || $_SESSION['pasadm'] !== '114514') {  ?>
                    <form method="post">
                        <input type="password" name="adminpas">
                        <input type="submit" value="验证">
                    </form>
                <? } else {
                    if (isset($_GET['OPENCODE'])) include "f/opencode.php";
                    if (isset($_GET['publish'])) include "f/publish.php";
                    if (isset($_GET['mpas'])) include "f/mpas.php";
                    if (isset($_GET['publuogu'])) include "f/publuogu.php";
                } ?>
            </div>
        </div>
    </div>
</body>
<?php if ($_POST) : ?>
    <script>window.location=location.href</script>
<? endif; ?>