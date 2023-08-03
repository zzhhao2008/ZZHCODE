<?php
$path = "../static/sys/p/" . $_GET['id'] . ".php";
if (!file_exists($path)) {
    echo "文章不存在";
} else {
    $pascfg=require($path);
?>
    <form method="post">
        <input type="text" name="title" value="<?php echo $pascfg['title'] ?>" placeholder="标题">
        <textarea name="pas"><?php echo $pascfg['p'] ?></textarea>
        <input type="submit" value="确定">
    </form>
    <style>
        input {
            display: block;
            width: 100%;
        }

        textarea {
            min-width: 100%;
            min-height: 500px;
            height: fit-content;
        }
    </style>
<?php
    if ($_POST['title'] && $_POST['pas']) {
        $pascfg = array(
            "title" => $_POST['title'],
            "p" => $_POST['pas'],
            "time" => time()
        );
        file_put_contents($path, "<?php return " . var_export($pascfg, 1) . ";?>");
    }
}
?>
<?php
$dir = scandir("../static/sys/p/");
foreach ($dir as $v) {
    if ($v == "." || $v == '..') {
        continue;
    }
    $fp = "../static/sys/p/" . $v;
    $pas = require($fp);
    $v = str_replace(".php", "", $v);
    echo "<a href='./?mpas&id=$v'> <xmp>$v:".$pas['title']."</xmp></a><br>";
}
?>