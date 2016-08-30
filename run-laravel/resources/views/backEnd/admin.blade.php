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
    <link href="{{URL::asset('admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::asset('admin_css/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{URL::asset('admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{URL::asset('admin_css/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">

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

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin">@lang('index.gameAdmin')</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> @lang('index.logout')</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@lang('index.gamelist')</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if ($admin == 2)
                            <button class="btn btn-default" type="button" onclick="document.location.href='/admin/game_add';">新增一筆路跑活動</button>
                        @endif
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <td>@lang('index.aino')</td>
                                    <td>@lang('index.game_name')</td>
                                    <td>@lang('index.detail')</td>
                                    <td>@lang('index.game_time')</td>
                                    <td>@lang('index.signup_time')</td>
                                    <td>@lang('index.signup_count')</td>
                                    <td>@lang('index.goto_url')</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($dataList as $key => $val)
                                    <tr>
                                        <td>{{ $val['id'] }}</td>
                                        <td>{{ $val['name'] }}</td>
                                        <td>{{ $val['detal'] }}</td>
                                        <td>{{ $val['dateStart'] }} ~ {{ $val['dateEnd'] }}</td>
                                        <td>{{ $val['registrationStarts'] }} ~ {{ $val['registrationEnds'] }}</td>
                                        <td>
                                            @if ($admin == 1)
                                            <a href="/admin/join_list/{{ $val['id'] }}">{{ $val['count'] }}</a>
                                        @else
                                            {{ $val['count'] }}
                                        @endif
                                        </td>
                                        <td><a href="/page/{{ $val['id'] }}">詳細資訊</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
<script src="{{URL::asset('admin_css/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{URL::asset('admin_css/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- DataTables JavaScript -->
<script src="{{URL::asset('admin_css/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admin_css/bower_components/datatables-responsive/js/dataTables.responsive.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{URL::asset('admin_css/dist/js/sb-admin-2.js')}}"></script>

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
