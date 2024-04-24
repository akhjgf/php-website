<?php
//连接数据库
include 'conn.php';

//获取id
$id = $_GET['id'];


//编写查询sql语句
$sql = "SELECT * FROM `student` WHERE `id`=$id";
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
	exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (!$data) {
	//输出提示，跳转到首页
	echo "没有这个学生！<br><br>";
	header('Refresh: 3; url=index.php');  //3s后跳转
	exit();
}
//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
	foreach ($value as $k => $v) {
		$arr[$k] = $v;
	}
}





?>

<html>

<head>
	<meta charset="UTF-8">
	<title>学生信息管理系统</title>
	<style type="text/css">
		body {
			background-image: url(./123.jpg);
			background-size: 100%;
		}

		.box {
			display: table;
			margin: 0 auto;
		}

		h2 {
			text-align: center;
		}

		.add {
			margin-bottom: 20px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			border: 2px solid black;
		}
		input {
			border: none;
			background-color: transparent;
		}
		select{
			background-color: transparent;
		}
	</style>
</head>

<body>
	<!--输出定制表单-->
	<div class="box">
		<h2>查看学生信息</h2>
		<div class="add">
			<form action="index.php" method="post" enctype="multipart/form-data">
				<table border="1">
					<tr>
						<th>编　　号：</th>
						<td><input type="text" name="id" size="5" value="<?php echo $arr["id"] ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<th>姓　　名：</th>
						<td><input type="text" name="name" size="25" value="<?php echo $arr["name"] ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<th>性　　别：</th>
						<td>
							<label><input <?php if ($arr["sex"] == "男") {
												echo "checked";
											} ?> type="radio" name="sex" value="男" disabled="disabled">男</label>
							<label><input <?php if ($arr["sex"] == "女") {
												echo "checked";
											} ?> type="radio" name="sex" value="女" disabled="disabled">女</label>
						</td>
					</tr>
					<tr>
						<th>年　　龄：</th>
						<td><input type="text" name="age" size="25" value="<?php echo $arr["age"] ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<th>学　　历：</th>
						<td>
							<select name="edu" disabled="disabled">
								<option <?php if (!$arr["edu"]) {
											echo "selected";
										} ?> value="">--请选择--</option>
								<option <?php if ($arr["edu"] == "研究生") {
											echo "selected";
										} ?> value="研究生">研究生</option>
								<option <?php if ($arr["edu"] == "本科") {
											echo "selected";
										} ?> value="本科">本科</option>
								<option <?php if ($arr["edu"] == "专科") {
											echo "selected";
										} ?> value="专科">专科</option>
								<option <?php if ($arr["edu"] == "高中") {
											echo "selected";
										} ?> value="高中">高中</option>
								<option <?php if ($arr["edu"] == "初中") {
											echo "selected";
										} ?> value="初中">初中</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>期望工资</th>
						<td><input type="text" name="salary" size="25" value="<?php echo $arr["salary"] ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<th>工作年数：</th>
						<td><input type="text" name="bonus" size="25" value="<?php echo $arr["bonus"] ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<th>地址</th>
						<td><input type="text" name="city" size="25" value="<?php echo $arr["city"] ?>" readonly="readonly"></td>
					</tr>
					<tr>
						<th></th>
						<td>
							<input type="button" onClick="javascript :history.back(-1);" value="返回">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" value="确定">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>