<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    window.onload = function() {
        var elements = document.querySelectorAll("*");
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            if (element.nodeName === "#text") {
                var markdownText = element.textContent;
                var htmlText = marked(markdownText);
                element.innerHTML = htmlText;
            }
        }
    };
</script>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZZH Coding</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/?doing">文章&问题</a></li>
                <li><a href="/?opencode">开放代码</a></li>
                <li><a href="/userf">用户中心</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if (empty($_COOKIE['id'])) { ?>
                    <li><a href="/?login"><span class="glyphicon glyphicon-log-in"></span>登录</a></li>
                <?php } else {
                    echo "<li><a>",$_COOKIE['id'],"</a></li>";
                } ?>
            </ul>

        </div>
    </div>
    <style>
        body {
            margin-top: 50px;
        }
    </style>
</nav>