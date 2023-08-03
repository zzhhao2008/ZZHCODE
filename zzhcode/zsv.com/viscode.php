<!DOCTYPE html>
<html>

<head>
    <link rel='shortcut icon' href="/icon.png">
    <script src="/static/bootstrap-3.4.1-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/static/bootstrap-3.4.1-dist/css/bootstrap.css" th:href="@{/lib/semantic/dist/semantic.min.css}">
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ZZH的代码空间-浏览</title>
    <style>
        pre {
            white-space: pre-wrap;
            word-break: break-all;
        }
    </style>
</head>

<body>
    <?php include "./static/generalheadbar.php"; ?>
    <div class="container">
        <?php
        $code = require("./static/sys/open/cfg.php");
        $code = $code[$_GET['id']];
        if ($code['tag']) {
            $color=["R"=>"red","B"=>"blue","G"=>"green","O"=>"orange"];
            $c = $color[$code['tag'][0]];
            $code['tag'][0] = " ";
        }
        $tag = $code['tag'] ? "<font color='$c'>[" . $code['tag'] . " ]</font>" : "";
        $filepath = 'open/' . $code['p'];
        if (!file_exists($filepath) || is_dir($filepath)) {
            echo "<script>alert('文件不存在')</script>";
            echo file_get_contents($filepath);
        } else {
        ?>
            <h1>浏览代码</h1>
            <h2><?php echo $tag,$code['t'] ?></h2>
            <?php if ($code['questionpath']) {
                echo "<pre id='que'>", file_get_contents('que/' . $code['questionpath']), "</pre>" ?>
            <?php } ?>
            <pre><xmp><?php echo file_get_contents($filepath) ?></xmp></pre>
            <h1>关于此文件</h1>
            <pre id="about"><xmp><?php echo $code['d'] ?></xmp></pre>
        <?php } ?>
        
    </div>
</body>
<script>
    document.getElementById('que').innerHTML = marked.parse(document.getElementById('que').innerHTML)
</script>