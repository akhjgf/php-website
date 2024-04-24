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

<html>

<head>
	<meta charset="UTF-8">
	<title>招聘网站</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
	<script src="./jquery-3.5.1.slim.min.js"></script>
	<script src="./js/bootstrap.js"></script>
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
	th{
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">四川科技有限工资</a>


		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a href="addStudent.html">我要报名</a>
				</li>

			</ul>
			<form class="form-inline my-2 my-lg-0">
			<a href="searchStudent.html">查找信息</a>
			<a href="people.php">&nbsp;&nbsp;&nbsp;详情</a>
			</form>
		</div>
	</nav>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" style="width: 100%; height: 600px;">
			<div class="carousel-item active">
				<img src="./img/OIP-C (1).jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="./img/OIP-C (2).jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="./img/OIP-C.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</button>
	</div>
	<div class="container">
    <h2 style="text-align: center; color: #E839E4; ">加入我们</h2>
    <h3 style="text-align: center; color: #7c7e81;">最人性化的公司</h3>
    <div class="card-deck" style="margin-top: 50px;">
      <div class="card">
        <img src="./img/OIP-C (6).jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">同事关系融洽，相互支持，团队合作默契。</p>
          <a href="#" class="btn btn-primary" style="float: right;">更多&gt;&gt;</a>
        </div>
      </div>
      <div class="card">
        <img src="./img/OIP-C (4).jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">公司领导注重员工发展，提供良好的晋升机会。</p>
          <a href="#" class="btn btn-primary" style="float: right;">更多&gt;&gt;</a>
        </div>
      </div>
      <div class="card">
        <img src="./img/OIP-C (5).jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">工作氛围积极向上，每天都充满活力和动力。</p>
          <a href="#" class="btn btn-primary" style="float: right;">更多&gt;&gt;</a>
        </div>
      </div>
    </div>

    <div class="card-deck" style="margin-top: 40px;">
      <div class="card">
        <img src="./img/OIP-C (4).jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">提供丰富的培训资源，持续提升员工的专业能力。</p>
          <a href="#" class="btn btn-primary" style="float: right;">更多&gt;&gt;</a>
        </div>
      </div>
      <div class="card">
        <img src="./img/下载 (1).jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">定期举办团建活动，增进员工之间的凝聚力和友谊。</p>
          <a href="#" class="btn btn-primary" style="float: right;">更多&gt;&gt;</a>
        </div>
      </div>
      <div class="card">
        <img src="./img/OIP-C (6).jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">重视员工福利，提供有竞争力的薪酬和福利待遇。</p>
          <a href="#" class="btn btn-primary" style="float: right;">更多&gt;&gt;</a>

        </div>
      </div>

    </div>
  </div>
	<div class="card text-center">
		<div class="card-header">
			四川科技有限公司
		</div>
		<div class="card-body">
			<h5 class="card-title">欢迎您的到来</h5>
			<p class="card-text">全四川最牛逼待遇最好的公司</p>
			
		</div>
		<div class="card-footer text-muted">
			已备案
		</div>
	</div>


</body>

</html>