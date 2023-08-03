<!DOCTYPE html>
<html>

<head>
    <link rel='shortcut icon' href="/icon.png">
    <script src="/static/bootstrap-3.4.1-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/static/bootstrap-3.4.1-dist/css/bootstrap.css" th:href="@{/lib/semantic/dist/semantic.min.css}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ZZH Coding</title>
    <style>
        pre {
            white-space: pre-wrap;
            word-break: break-all;
        }

        .pasmini {
            max-height: 200px;
            overflow-y: hidden;
        }
        a:link,a:hover,a:visited{
            color:rgb(0,0,150)
        }
    </style>
</head>
<?php include "./static/generalheadbar.php"  ?>

<body>
    <div class="container">
        <?php if (isset($_GET['opencode'])) { //开放代码
            $code = require("./static/sys/open/cfg.php");
            $color=["R"=>"red","B"=>"blue","G"=>"green","O"=>"orange"];
            foreach ($code as $k => $v) {
                $p = $v['p'];
                $t = $v['t'];
                $des = $v['d'];
                if($v['tag']){
                    $c=$color[$v['tag'][0]];
                    $v['tag'][0]=" ";
                }
                $tag=$v['tag']?"<font color='$c'>[".$v['tag']." ]</font>":"";
                echo "<a href='viscode.php?id=$k'>
                    <h2>$k.$tag$t</h2>
                    <p>$des</p>
                    </a>";
            }
        ?>
        <?php } elseif (isset($_GET['jc'])) { // 注册
        ?>
        <?php } elseif (isset($_GET['login'])) {  //登录
            if ($_POST['QQ']) {
                $okqq = [1931509347, 2103352969, 1972969785, 2155260790, 354236959, 3525600059, 2155260790, 2987412326];
                if (in_array($_POST['QQ'], $okqq)) {
                    setcookie("id", $_POST['QQ'], time() + 3600 * 12, "/");
                    echo "登录成功，跳转其他页面有效，请勿刷新本页面";
                } else {
                    setcookie("id", "", time() - 3600 * 12, "/");
                    echo "QQ无效";
                }
            }
        ?>
            <form method="post">
                <input type="text" name="QQ" placeholder="QQ号">
                <input type="submit" value="验证">
            </form>
        <?php } else { ?>
            <div class="row">
                <div class="col-sm-2">
                    <h2>关于我</h2>
                    <h5>我的照片:</h5>
                    <div class="fakeimg">
                        <img src="./icon.png">
                    </div>
                    <p>关于我的介绍..</p>
                    <h3>我的空间</h3>
                    <p>从哪里找到我</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="https://github.com/zzhhao2008/">GitHub</a></li>
                        <li><a href="https://space.bilibili.com/2127988502">bilibili</a></li>
                        <li><a href="http://61.183.42.64:45337/">ZSV Studio</a></li>
                    </ul>
                    <hr class="hidden-sm hidden-md hidden-lg">
                </div>
                <div class="col-sm-10"><!--文章与默认-->
                    <?php if (isset($_GET['doing'])) {
                        $dir = scandir("./static/sys/p/");
                        if (count($dir) <= 2) {
                            echo "<h5>什么也没做...</h5>";
                        } else if ($_GET['look']) {
                            $fp = "./static/sys/p/" . $_GET['look'] . ".php";
                            if (!file_exists($fp)) {
                                echo "该文章不存在！";
                            } else {
                                $pas = require($fp);
                                if ($pas['title'] === '已删除') echo $pas['title'];
                                echo "<h2>", $pas['title'], "</h2>";
                                echo "<h5>", $pas['er'] ? $pas['er'] : '--', " 于 ", date("Y-m-d H:i:s", $pas['time']), "</h5>";
                                echo "<pre><xmp>" . $pas['p'], "</xmp></pre>";
                            }
                        } else {
                            $cnt = 0;
                            foreach ($dir as $v) {
                                if ($v == "." || $v == '..') {
                                    continue;
                                }
                                $fp = "./static/sys/p/" . $v;
                                $pas = require($fp);
                                if ($pas['title'] === '已删除') continue;
                                $v = str_replace(".php", "", $v);
                                echo "<h2>", $pas['title'], "</h2>";
                                echo "<h5>", $pas['er'] ? $pas['er'] : '--', " 于 ", date("Y-m-d H:i:s", $pas['time']), "<a href='/?doing&look=$v'>详情</a></h5>";
                                echo "<pre class='pasmini'><xmp>" . $pas['p'], "</xmp></pre><hr>";
                                $cnt++;
                            }
                            echo "共 $cnt 篇，已是最底部";
                        }
                    } else {  ?>
                        <h2>你好</h2>
                        <h5>朋友</h5>
                        <p>欢迎来到我的Coding空间</p>
                        <p>我将在此发布我开放的代码和动态，本页面不含有任何自动第三方跳转或SRC</p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>