<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAIS | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/summernote/summernote-bs4.min.css">

  @if(Route::currentRouteName() == '/add-projects')
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  @endif
  @if(Route::currentRouteName() == '/projects')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/manager/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
      .buttons-html5{
        background-color: #315b80;
      }
      .buttons-print{
        background-color: #315b80;
      }
      .buttons-collection{
        background-color: #315b80;
      }
      .alert-success{
        background-color: #007bff;
      }
    </style>
    @endif
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('/') }}/manager/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('manager/components/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('manager/components/sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  {{-- @include('manager/components/footer') --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/') }}/manager/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/manager/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/manager/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('/') }}/manager/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('/') }}/manager/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ url('/') }}/manager/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('/') }}/manager/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/') }}/manager/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('/') }}/manager/plugins/moment/moment.min.js"></script>
<script src="{{ url('/') }}/manager/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/') }}/manager/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ url('/') }}/manager/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/') }}/manager/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/manager/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/manager/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/') }}/manager/dist/js/pages/dashboard.js"></script>

@if(Route::currentRouteName() == '/projects')
  <!-- DataTables  & Plugins -->
  <script src="{{ url('/') }}/manager/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/jszip/jszip.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/pdfmake/vfs_fonts.js"></script>

  {{-- DATA TABLES WITH BUTTONS (Commented for yajra table, you can use it if you dont use yajra table) --}}

  {{-- <script src="{{ url('/') }}/manager/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> --}}
  {{-- <script src="{{ url('/') }}/manager/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}

  {{-- <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script> --}}
@endif
@if(Route::currentRouteName() == '/add-projects' || Route::currentRouteName() == '/edit-projects')
  <!-- Select2 -->
  <script src="{{ url('/') }}/manager/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="{{ url('/') }}/manager/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="{{ url('/') }}/manager/plugins/moment/moment.min.js"></script>
  <script src="{{ url('/') }}/manager/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="{{ url('/') }}/manager/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Bootstrap Switch -->
  <script src="{{ url('/') }}/manager/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

  <script>
     $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('.reservationdate').datetimepicker({
        format: 'L'
    });

    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('.reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    // $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    // $('.my-colorpicker1').colorpicker()
    //color picker with addon
    // $('.my-colorpicker2').colorpicker()

    // $('.my-colorpicker2').on('colorpickerChange', function(event) {
    //   $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    // })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  </script>
  @endif
</body>
</html>
