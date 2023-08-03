<title>Edit Config</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    input[type='text'] {
        width: 100%;

    }
</style>

<?php
$file_path = "../static/sys/open/cfg.php";

$data = include($file_path); // 读取配置数据

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        // 添加新项
        $new_item = array(
            "tag" => $_POST['tag'],
            "t" => $_POST["title"],
            "p" => $_POST["program"],
            "d" => $_POST["description"],
            "questionpath" => $_POST["questionpath"]
        );

        $data[] = $new_item;
    } elseif (isset($_POST["edit"])) {
        // 编辑已知项目
        $index = $_POST["index"];
        $data[$index]["tag"] = $_POST["tag"];
        $data[$index]["t"] = $_POST["title"];
        $data[$index]["p"] = $_POST["program"];
        $data[$index]["d"] = $_POST["description"];
        $data[$index]["questionpath"] = $_POST["questionpath"];
    } elseif (isset($_POST["delete"])) {
        // 删除已知项目
        $index = $_POST["index"];
        array_splice($data, $index, 1);
    }

    $file_handle = fopen($file_path, "w");
    fwrite($file_handle, "<?php return " . var_export($data, true) . "; ?>");
    fclose($file_handle);
}

?>
<table>
    <tr>
        <th>标签</th>
        <th>标题</th>
        <th>程序路径</th>
        <th>描述</th>
        <th>题面路径</th>
        <th>操作</th>
    </tr>
    <?php foreach ($data as $index => $item) : ?>
        <tr>
            <form method="post">
                <td>
                    <input type="text" name="tag" value="<?php echo $item["tag"]; ?>" placeholder="tag">
                </td>
                <td>
                    <input type="text" name="title" value="<?php echo $item["t"]; ?>">
                </td>
                <td>
                    <input type="text" name="program" value="<?php echo $item["p"]; ?>">
                </td>
                <td>
                    <input type="text" name="description" value="<?php echo $item["d"]; ?>">
                </td>
                <td>
                    <input type="text" name="questionpath" value="<?php echo $item["questionpath"]; ?>">
                </td>
                <td>
                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                    <input type="submit" name="edit" value="保存编辑">
                    <input type="submit" name="delete" value="删除">
                </td>
            </form>
        </tr>
    <?php endforeach; ?>
    <tr>
        <form method="post">
            <td>
                <input type="text" name="tag" placeholder="tag">
            </td>
            <td>
                <input type="text" name="title" placeholder="Title" required>
            </td>
            <td>
                <input type="text" name="program" placeholder="Program" required>
            </td>
            <td>
                <input type="text" name="description" placeholder="Description" required>
            </td>
            <td>
                <input type="text" name="questionpath" placeholder="Question Path">
            </td>
            <td>
                <input type="submit" name="add" value="Add">
            </td>
        </form>
    </tr>
</table>