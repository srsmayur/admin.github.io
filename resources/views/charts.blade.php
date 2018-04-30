@extends('layouts.app')

@section('content')

    <div class="container">
    <div id="dummyModal" role="dialog" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                    <h4 class="modal-title">Comment Box</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="tbl_savedata">

                        <div class="row bottom-buffer left-buffer right-buffer">
                                <div class="form-group">
                                    <label for="formItem">Chart</label>
                                    <img src="chart.jpg" id="img1" name="img1" width="100%" height="200">

                                </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="text" class="form-control" id="s_date" name="startdate" readonly>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="text" class="form-control" id="e_date" name="enddate" readonly>
                            </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="cate">Category </label>
                                    <select class="form-control" id="cate" name="cate">
                                        <option>Good</option>
                                        <option>Bad</option>
                                        <option>Average</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                </div>


                            <input type="hidden" class="form-control" value="image" id="image" name="image" >
                            <input type="hidden" class="form-control" value="charttitle" id="charttitle" name="charttitle" >
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                            <button type="button" data-dismiss="modal" class="btn btn-danger">
                                {{ __('Close') }}
                            </button>

                        </div>

                    </form>


                </div>

            </div>
        </div>
    </div>
    </div>

    <section id="container" class="">
        @include('layouts.header')
        @include('layouts.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Charts</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="{{URL::to('dashboard')}}">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Charts</li>
                        </ol>
                    </div>
                </div>
            </section>
            <form class="form-group" id="formoid" method="POST" >
                @csrf
                <div class="container">

                    <div class='col-md-8'>
                        <label for="dtp_input2" class="col-md-2 control-label">From :</label>
                        <div class="form-group">
                            <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss p " data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" id="date_from" name="date_from"  value="">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <label for="dtp_input2" class="col-md-2 control-label">To :</label>
                        <div class="form-group">
                            <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss p " data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" id="date_to" name="date_to"  value="">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">
                        {{ __('Search') }}
                    </button>
                </div>
            </form>
            <div id="chartdiv"></div>
            <div class="row">
                <div class="col-sm-4" id="MWCT_BR_001_ACT"></div>
                <div class="col-sm-4" id="MWCT_BR_002_ACT"></div>
                <div class="col-sm-4" id="MWCT_BR_003_ACT"></div>
                <div class="col-sm-4" id="MWCT_PR_001_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_001_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_002_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_003_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_004_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_005_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_006_ACT"></div>
            </div>




        </section>
        <!-- Chart code -->
        <script>


            $(document).ready(function(){

                $("#tbl_savedata").submit(function(event) {
                   event.preventDefault();
                   /* var $form = $(this),
                            title = $form.find('input[name="title"]').val(),
                            cate = $form.find('input[name="cate"]').val(),
                            comment = $form.find('input[name="comment"]').val(),
                            charttitle = $form.find('input[name="charttitle"]').val(),
                            startdate = $form.find('input[name="startdate"]').val(),
                            enddate = $form.find('input[name="enddate"]').val(),
                            image = $form.find('input[name="image"]').val(),
                            url = $form.attr('action');*/
                       var formData = new FormData($('#tbl_savedata')[0]);

                        var url = 'http://localhost/Admin-panel/public/charts/comment_box';
                        $.ajax({
                            url: url,  //Server script to process data
                            type: 'POST',
                            cache : false,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: formData,
                            success: function (data) {
                                $('#dummyModal').modal('hide');
                            }

                        });
                });


            AmCharts.exportCFG.menu[0].menu.push({
                    "label" : "Save To database",
                    "click" : function () {
                    this.capture( {}, function() {
                        this.toJPG( {}, function( imgdata ) {
                            document.getElementById('img1').src = imgdata;
                            document.getElementById('image').value = imgdata;
                            $('#dummyModal').modal('show');
                        } );
                    } );
                    }

                });
            $("#formoid").submit(function(event) {
                    event.preventDefault();
                    var $form = $(this),
                            from_date = $form.find('input[name="date_from"]').val(),
                            to_date = $form.find('input[name="date_to"]').val(),
                            url = $form.attr('action');
                    var url = 'http://localhost/Admin-panel/public/charts/readdata';
                    $.ajax({

                        url: url,  //Server script to process data
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            from_date: from_date,
                            to_date: to_date
                        },
                        success: function (response) {
                            var chartdata = response.data;
                            var chart = AmCharts.makeChart("chartdiv", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "position": "left",
                                    "title": ""
                                }],
                                "graphs": [{
                                    "id": "g1",
                                    "fillAlphas": 0.4,
                                    "title": "MWCT_BR_001_ACT",
                                    "valueField": "MWCT_BR_001_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_BR_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g2",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_BR_002_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_BR_002_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g3",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_BR_003_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_BR_003_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g4",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_PR_001_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_PR_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g5",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_001_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g6",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_002_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_002_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g7",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_003_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_003_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g8",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_004_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_004_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g9",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_005_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_005_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g10",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_006_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_006_ACT:<b>[[value]]</b></div>"
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "Date & Time",
                                    "parseDates": true

                                },
                                "export": {
                                    "enabled": false,
                                }
                            });
                            chart.addListener("dataUpdated", zoomChart);


            //Chart -1
                            var chart1 = AmCharts.makeChart("MWCT_BR_001_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": false,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_BR_001_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_BR_001_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_BR_001_ACT';

                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart1.addListener("rendered", zoomChart);
            //Chart -2
                            var chart2 = AmCharts.makeChart("MWCT_BR_002_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_BR_002_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_BR_002_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString()
                                        var end_date = e.chart.endDate.toLocaleString();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_BR_002_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart2.addListener("rendered", zoomChart);
            //Chart -3
                            var chart3 = AmCharts.makeChart("MWCT_BR_003_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_BR_003_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_BR_003_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString()
                                        var end_date = e.chart.endDate.toLocaleString();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_BR_003_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart3.addListener("rendered", zoomChart);
            //Chart -4
                            var chart4 = AmCharts.makeChart("MWCT_PR_001_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_PR_001_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_PR_001_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_PR_001_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart4.addListener("rendered", zoomChart);
            //Chart -5
                            var chart5 = AmCharts.makeChart("MWCT_DS_001_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_001_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_001_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_DS_001_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart5.addListener("rendered", zoomChart);
            //Chart -6
                            var chart6 = AmCharts.makeChart("MWCT_DS_002_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_002_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_002_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_DS_002_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart6.addListener("rendered", zoomChart);
            //Chart -7
                            var chart7 = AmCharts.makeChart("MWCT_DS_003_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_003_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_003_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_DS_001_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart7.addListener("rendered", zoomChart);
            //Chart -8
                            var chart8 = AmCharts.makeChart("MWCT_DS_004_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_004_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_004_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_DS_004_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart8.addListener("rendered", zoomChart);
            //Chart -9
                            var chart9 = AmCharts.makeChart("MWCT_DS_005_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_005_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_005_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_DS_005_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart9.addListener("rendered", zoomChart);
            //Chart -10
                            var chart10 = AmCharts.makeChart("MWCT_DS_006_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_006_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_006_ACT",
                                    "parseDates": true
                                },
                                "listeners": [{
                                    "event": "zoomed",
                                    "method": function(e) {
                                        var start_date = e.chart.startDate.toLocaleString ()
                                        var end_date = e.chart.endDate.toLocaleString ();

                                        document.getElementById('s_date').value = start_date;
                                        document.getElementById('e_date').value = end_date;
                                        document.getElementById('charttitle').value = 'MWCT_DS_006_ACT';
                                    }
                                }],
                                "export": AmCharts.exportCFG
                            });

                            chart10.addListener("rendered", zoomChart);

                            zoomChart();
                            function zoomChart() {
                                chart.zoomToIndexes(chartdata.length - 250, chartdata.length - 100);

                            }

                        }
                    });
                });
            });
        </script>
    </section>

@endsection