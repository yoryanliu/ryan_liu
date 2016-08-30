<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>路跑管理系統</title>

	<!-- Bootstrap Core CSS -->
	<link href="/assets/admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="/assets/admin_css/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- DataTables CSS -->
	<link href="/assets/admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="/assets/admin_css/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
				<h1 class="page-header">路跑活動列表</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">

					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="dataTable_wrapper">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
								<tr>
									<td>流水號</td>
									<td>活動名稱</td>
									<td>簡介</td>
									<td>活動時間</td>
									<td>報名時間</td>
									<td></td>
								</tr>
								</thead>
								<tbody>
								<?=$list;?>
								</tbody>
							</table>
							<button class="btn btn-link" type="button" onclick="document.location.href='/admin';">進入管理介面</button>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
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

<!-- DataTables JavaScript -->
<script src="/assets/admin_css/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets/admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="/assets/admin_css/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/assets/admin_css/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>

</body>

</html>
