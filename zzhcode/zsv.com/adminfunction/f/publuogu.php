<?php
if ($_POST['qid']) {
    $file_path = "../static/sys/open/cfg.php";
    $data = include($file_path); // 读取配置数据
    $qid = $_POST['qid'];
    $codepath = "../open/" . $qid . ".cpp";
    $quepath = "../que/luogu/" . $qid . ".md";
    $new_item = array(
        "tag" => $_POST['tag'],
        "t" => $_POST["title"],
        "p" => $qid . ".cpp",
        "d" => $_POST["d"],
        "questionpath" => "luogu/". $qid . ".md",
    );
    $data[]=$new_item;
    file_put_contents($codepath,$_POST['c']);
    file_put_contents($quepath,$_POST['q']);
    print_r($data);
    $file_handle = fopen($file_path, "w");
    fwrite($file_handle, "<?php return " . var_export($data, true) . "; ?>");
    fclose($file_handle);
}
?>
<form method="post">
    <input name="qid" placeholder="题目ID 如P1145">
    <input name="title" placeholder="标题">
    <input name="tag" placeholder="标签">
    <textarea name="d" placeholder="描述"></textarea>
    <textarea name="q" placeholder="题面"></textarea>
    <textarea name="c" placeholder="代码"></textarea>
    <input type="submit" value="确定">
</form>
<style>
    textarea {
        display: block;
        min-width: 100%;
        min-height: 200px;
        margin-top: 10px;
    }
</style>