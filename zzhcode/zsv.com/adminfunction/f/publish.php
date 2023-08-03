<form method="post">
    <input type="text" name="title" placeholder="标题">
    <textarea name="pas"></textarea>
    <input type="submit" value="发布">
</form>
<style>
    input {
        display: block;
        width: 100%;
    }

    textarea {
        min-width: 100%;
        min-height: 400px;
        
    }
</style>
<?php
if ($_POST['title'] && $_POST['pas']) {
    $pascfg = array(
        "title" => $_POST['title'],
        "p" => $_POST['pas'],
        "time" => time()
    );
    file_put_contents("../static/sys/p/" . (2000000000 - time()) . ".php", "<?php return " . var_export($pascfg, 1) . ";?>");
}
?>
