<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>inter.com</title>
    <link rel="shortcut icon" href="{{asset('img/icons/icon.ico')}}">
    <link href="{{asset('css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}} " rel="stylesheet">
    <link href="{{asset('css/style.css')}} " rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css')}} " rel="stylesheet">
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}} " rel="stylesheet">
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}} " rel="stylesheet">
    <link href="{{asset('css/plugins/clockpicker/clockpicker.css')}} " rel="stylesheet">
    <link href="{{asset('css/plugins/dualListbox/bootstrap-duallistbox.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/select2/select2.min.css')}} " rel="stylesheet">
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-notifications.min.css')}}">
    <link href="{{asset('css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <style type="text/css">
        ::-webkit-scrollbar{
            width: 0;
        }
    </style>
  </head>
  <body class="pace-done">
    <div id="wrapper">
      @include('layout.sidebar')
      <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('layout.header')
            @yield('dashboard-header')
        </div>
            @yield('breadcrumb')
        <div class="wrapper wrapper-content">
            <div class="row">
              @yield('content')
            </div>
        </div>
        <div class="footer">
            <!-- <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div> -->
            <div>
                <strong>Copyright</strong> Romusha Team &copy; 2017-2018
            </div>
        </div>
      </div>
    </div>
        
    @if (Request::is('permainan/*'))
    @else
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    @endif
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/plugins/switchery/switchery.js')}}"></script>
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

    @if(Auth::user()->status==5)
    <script type="text/javascript">
        var date = new Date();
            if (date.getMonth() == 7 && date.getDate() == 17) {
            var i = 0;
            var elem = $('[name=trigger_animation]');

            function loop(){
                setTimeout(function(){
                        $('[name=trigger_animation]:eq('+i+')').removeAttr('class').attr('class', '');
                        var animation = "hinge";
                        $('[name=trigger_animation]:eq('+i+')').addClass('animated');
                        $('[name=trigger_animation]:eq('+i+')').addClass(animation);
                    i++;
                    if (i < elem.length) {
                        loop();
                    }else if(i == elem.length){
                        swal({
                            title: "Cieee bingung..",
                            text: "Udah istirahat aja dulu, ga usah buka ginian wkwkwk ;)",
                            type: "info",
                            showCancelButton: false,
                            confirmButtonColor: "#41bae0",
                            confirmButtonText: "Dih!",
                            closeOnConfirm: false
                        }, function () {
                            swal({
                                title: "Tau ga ini hari apa?",
                                text: "Hari ini, tanggal 17 Agustus itu hari kemerdekaan tauuu",
                                type: "info",
                                showCancelButton: false,
                                confirmButtonColor: "#41bae0",
                                confirmButtonText: "Iya tau gua!!",
                                closeOnConfirm: false
                            }, function () {
                            swal({
                                title: "Dih selow dong",
                                text: "Iya tau kok kalo kamu tau, tapi karena sekarang hari kemerdekaan ada sesuatu nihh",
                                type: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#41bae0",
                                confirmButtonText: "Ap tuch??",
                                closeOnConfirm: false
                            }, function () {
                            swal({
                                title: "Kepo yaaaaa?",
                                text: "Penasaran?? tapi cape kan klik klik muluuu??",
                                type: "info",
                                showCancelButton: false,
                                confirmButtonColor: "#41bae0",
                                confirmButtonText: "Iya sih",
                                closeOnConfirm: false
                            },function () {
                            swal({
                                title: "Owhhh kalo gitu",
                                text: "Makan tuh, udah tidur aja sana wkwkwkkwk",
                                type: "info",
                                showCancelButton: false,
                                confirmButtonColor: "#41bae0",
                                confirmButtonText: "Jebo lu!",
                                closeOnConfirm: false
                            });
                        });
                        });
                        });
                        });
                    }
                }, 100);
            };
            loop();
            }
    </script>
    @endif

    <script>

            $(document).ready(function(){
            $('.chosen-select').chosen({width: "100%"});
              $(".select2").select2();
                $('.dataTables-example').DataTable({
                    "language": {
                          "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Indonesian.json"
                      },
                    pageLength: 25,
                    responsive: true,
                    buttons: [
                    ]
                });

                $('.dataTables-cus').DataTable({
                    "language": {
                          "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Indonesian.json"
                      },
                    pageLength: 25,
                    responsive: true,
                    searching: false,
                    bFilter: false,
                    buttons: [
                    ]
                });

                $('.form-group .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
            });


        </script>
  </body>
</html>
