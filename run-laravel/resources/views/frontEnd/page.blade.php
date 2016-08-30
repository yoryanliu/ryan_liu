<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>活動說明</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::asset('admin_css/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('admin_css/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('admin_css/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

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

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">路跑活動 - 說明</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>活動名稱: </label>
                                    <p class="form-control-static"><?php echo $info_name;?></p>
                                </div>
                                <div class="form-group">
                                    <label>活動時間: </label>
                                    <p class="form-control-static"><?php echo $info_dateStartToEnd;?></p>
                                </div>
                                <div class="form-group">
                                    <label>報名時間: </label>
                                    <p class="form-control-static"><?php echo $info_registrationStartEnds;?></p>
                                </div>
                                <div class="form-group">
                                    <label>活動說明: </label>
                                    <p class="form-control-static"><?php echo $info_detal;?></p>
                                </div>
                                <button class="btn btn-default" type="button" onclick="document.location.href='/sign_up/<?php echo $id;?>';">馬上報名</button>
                                <button class="btn btn-default" type="button" onclick="document.location.href='/';">回到首頁</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{URL::asset('admin_css/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{URL::asset('admin_css/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{URL::asset('admin_css/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>
