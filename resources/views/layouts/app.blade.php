<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">


    <title>Admin Dashboard</title>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script type="text/javascript">var baseurl = '<?php echo URL::to('/'); ?>';</script>
    <!-- Bootstrap CSS -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap theme -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{URL::to('/')}}/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{URL::to('/')}}/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{URL::to('/')}}/css/owl.carousel.css" type="text/css">
    <link href="{{URL::to('/')}}/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{URL::to('/')}}/css/fullcalendar.css">
    <link href="{{URL::to('/')}}/css/widgets.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style-responsive.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/css/xcharts.min.css" rel=" stylesheet">
    <link href="{{URL::to('/')}}/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <script stype="text/javascript" rc="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <link href="{{URL::to('/')}}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- Styles -->
    <style>
        #chartdiv {
            width	: 100%;
            height	: 350px;
        }
        #MWCT_BR_001_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_BR_002_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_BR_003_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_PR_001_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_DS_001_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_DS_002_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_DS_003_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_DS_004_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_DS_005_ACT {
            width	: 30%;
            height	: 200px;
        }
        #MWCT_DS_006_ACT {
            width	: 30%;
            height	: 200px;
        }
        .bottom-buffer { margin-bottom:20px; }
        .left-buffer { margin-left:10px; }
        .right-buffer { margin-right:10px; }
        .formItem label {
            display: block;
            text-align: center;
            line-height: 150%;
            font-size: .85em;
        }
    </style>

    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/examples/export.config.default.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/datatable/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/datatable/datatables.responsive.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/datatable/select2-bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/datatable/select2.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/datatable/bootstrap-editable.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/datatable/summernote.css"/>

    <script type="text/javascript" src="datatable/jquery-1.11.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<body>
<main class="py-4">
    @yield('content')
</main>


<script type="text/javascript" src="{{URL::to('/')}}/js/jquery-3.3.1.js" charset="UTF-8"></script>
<script type="text/javascript" src="{{URL::to('/')}}/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
   </script>

<script type="text/javascript" src="{{URL::to('/')}}/js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="{{URL::to('/')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{URL::to('/')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{URL::to('/')}}/assets/jquery-knob/js/jquery.knob.js"></script>
<script src="{{URL::to('/')}}/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{URL::to('/')}}/js/owl.carousel.js"></script>
<!-- jQuery full calendar -->
<<script src="{{URL::to('/')}}/js/fullcalendar.min.js"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{URL::to('/')}}/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="{{URL::to('/')}}/js/calendar-custom.js"></script>
<script src="{{URL::to('/')}}/js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="{{URL::to('/')}}/js/jquery.customSelect.min.js"></script>
<script src="{{URL::to('/')}}/assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="{{URL::to('/')}}/js/scripts.js"></script>
<!-- custom script for this page-->
<script src="{{URL::to('/')}}/js/sparkline-chart.js"></script>
<script src="{{URL::to('/')}}/js/easy-pie-chart.js"></script>
<script src="{{URL::to('/')}}/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{URL::to('/')}}/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{URL::to('/')}}/js/xcharts.min.js"></script>
<script src="{{URL::to('/')}}/js/jquery.autosize.min.js"></script>
<script src="{{URL::to('/')}}/js/jquery.placeholder.min.js"></script>
<script src="{{URL::to('/')}}/js/gdp-data.js"></script>
<script src="{{URL::to('/')}}/js/morris.min.js"></script>
<script src="{{URL::to('/')}}/js/sparklines.js"></script>
<script src="{{URL::to('/')}}/js/charts.js"></script>
<script src="{{URL::to('/')}}/js/jquery.slimscroll.min.js"></script>
<script src="{{URL::to('/')}}/assets/chart-master/Chart.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/bootstrap.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/jquery-ui-1.10.3.minimal.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/TableTools.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/lodash.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/datatables.responsive.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/datatable/ZeroClipboard.js"></script>
<script src="{{URL::to('/')}}/js/charttable.js" type="text/javascript"></script>
</body>
</html>
