<?php
//连接数据库
include 'conn.php';

//编写查询sql语句
$sql = 'SELECT * FROM `student`';
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
	exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `student`';
//执行查询操作、处理结果集
$n = mysqli_query($link, $sql);
if (!$n) {
	exit('查询数量sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$num = mysqli_fetch_assoc($n);
//将一维数组的值转换为一个字符串
$num = implode($num);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
    body {
        background-image: url(./12\3.jpg);
        background-size: 100%;
    }

    .wrapper {
        width: 1000px;
        margin: 20px auto;
    }

    h1 {
        text-align: center;
    }

    .add {
        margin-bottom: 20px;
    }

    .add a {
        text-decoration: none;
        color: #fff;
        background-color: #00CCFF;
        padding: 6px;
        border-radius: 5px;


    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    a {
        color: black;

    }

    a:hover {
        color: blue;
        /* 鼠标移到链接上时文字颜色变为蓝色 */
    }
</style>

<body>
    </div>
    <div class="wrapper">
        <h1>已报名人员信息</h1>
        <div class="add">
            &nbsp;&nbsp;&nbsp;共
            <?php echo $num; ?>个学生&nbsp;&nbsp;&nbsp;

        </div>
        <table width="960" border="1">
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>学历</th>
                <th>期望工资</th>
                <th>工作年数</th>
                <th>地址</th>
                <th>操作</th>
            </tr>
            <?php


        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr[$k] = $v;
            }
            echo "<tr>";
            echo "<td>{$arr['id']}</td>";
            echo "<td>{$arr['name']}</td>";
            echo "<td>{$arr['sex']}</td>";
            echo "<td>{$arr['age']}</td>";
            echo "<td>{$arr['edu']}</td>";
            echo "<td>{$arr['salary']}</td>";
            echo "<td>{$arr['bonus']}</td>";
            echo "<td>{$arr['city']}</td>";
            echo "<td>
                        <a href='javascript:del({$arr['id']})'style='text-decoration: none;'>删除</a>
                        <a href='editStudent.php?id={$arr['id']}'style='text-decoration: none;'s>修改</a>
                  </td>";
            echo "</tr>";
            // echo "<pre>";
            // print_r($arr);
            // echo "</pre>";


        }
        // 关闭连接
        mysqli_close($link);




        ?>

        </table>
    </div>

    <script type="text/javascript">
        function del(id) {
            if (confirm("确定删除这个学生吗？")) {
                window.location = "action_del.php?id=" + id;
            }
        }
    </script>
</body>

</html>