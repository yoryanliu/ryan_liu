<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>報名路跑活動</title>

	<!-- Bootstrap Core CSS -->
	<link href="/assets/admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="/assets/admin_css/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="/assets/admin_css/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="/assets/admin_css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		#page-wrapper{
			margin:0 auto;
			width:1200px;
			border-left: 0px;
		}
	</style>
</head>

<body>

<div id="wrapper">

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">報名路跑活動</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div>路跑活動名稱： <?=$info_name?></div>
						<div>活動時間： <?=$info_dateStartToEnd?></div>
						<div>報名時間： <?=$info_registrationStartEnds?></div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<form role="form" method="post">
									<input type="hidden" name="id" value="<?=$id;?>">
									<div class="form-group">
										<label>姓名: </label>
										<input class="form-control" type="text" name="name" value="">
									</div>
									<div class="form-group">
										<label>身份證字號: </label>
										<input class="form-control" type="text" name="idNo" value="">
									</div>
									<div class="form-group">
										<label>電話: </label>
										<input class="form-control" type="text" name="phone" value="">
									</div>
									<div class="form-group">
										<label>email: </label>
										<input class="form-control" type="text" name="email" value="">
									</div>
									<button type="submit" class="btn btn-default">送出</button>
									<button type="reset" class="btn btn-default">重設</button>
									<button class="btn btn-default" type="button" onclick="document.location.href='/';">回到首頁</button>
								</form>
							</div>
							<!-- /.col-lg-6 (nested) -->
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/assets/admin_css/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/assets/admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/assets/admin_css/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/assets/admin_css/dist/js/sb-admin-2.js"></script>

</body>

</html>
