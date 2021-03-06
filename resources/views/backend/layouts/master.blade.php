<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Dashboard</title>

 <!-- Check Date Pick -->




  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker 
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.css">-->
  <link rel="stylesheet" href="{{asset('public/backend')}}/datepicker/daterangepicker.css">

  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- jQuery -->
  <script src="{{asset('public/backend')}}/plugins/jquery/jquery.min.js"></script>
  <style type="text/css">
    .notifyjs-corner{
      z-index: 10000 !important;
    }
  </style>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          
          <span>{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">Logout</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
               </form>
        </div>
      </li>
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DeshBoard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(Auth::user()->image))?url('public/upload/user_images/'.Auth::user()->image):url('public/upload/no_images.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

    @include('backend.layouts.sidebar')
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  @if(session()->has('success'))
  <script type="text/javascript">
    $(function(){
      $.notify("{{session()->get('success')}}",{globalPosition: 'top right', className:'success'});
    });
  </script>
  @endif
  @if(session()->has('error'))
  <script type="text/javascript">
    $(function(){
      $.notify("{{session()->get('error')}}",{globalPosition: 'top right', className:'error'});
    });
  </script>
  @endif
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Developped by &copy;<a href="https://www.facebook.com/mizan.reasat">Mizanor Rahman</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/backend')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend')}}/dist/js/pages/dashboard.js"></script>
<!-- DataTables -->
<script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="{{asset('public/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="{{asset('public/backend')}}/datepicker/moment.min.js"></script>
<script src="{{asset('public/backend')}}/datepicker/daterangepicker.js"></script>
<!--Handle bar -->
<script src="{{asset('public/backend')}}/js/handlebars-v4.7.6.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    $(document).on ('click', '#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          window.location.href = link;
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
          }
        })
    });
  });
</script>
<script>
  $(document).ready(function(){
    $(document).on('click','#delete2', function(){
      var actionTo = $(this).attr('href');
      var token = $(this).attr('data-token');
      var id = $(this).attr('data-id');
      swal({
        title: "are you sure?",
        type: "success",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText:'Yes',
        showCancelButton: "No",
        closeOnConfirm: false,
        closeOnCansel: false
      },
      function(isConfirm){
        if(isConfirm){
          $.ajax({
            url:actionTo,
            type:'post',
            data: {id:id, _token:token},
            success: function(data){
              swal({
                title: "Deleted",
                type: "success"
              },
              function(isConfirm){
                if(isConfirm){
                  $('.'+id).fadeOut();
                }
              });
              
            }
          });
        }else{
          swal("cancelled","","error");
        }
      });
      return false;
      
    });
  });
  

</script>
<script type="text/javascript">
  $(document). ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    $('.singledatepicker').daterangepicker({
      singleDatepicker: true,
      showDropdowns: true,
      autoUpdateInput: false,
      autoApply: true,
      locale: {
        format: 'DD-MM-YYYY',
        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        firstDay: 0
      },
      minDate: '01/01/1930',
    },
    function(start){
      this.element.val(start.format('DD-MM-YYYY'));
      this.element.parent().removeClass('has-error');
    },
    function(chosen_date){
      this.element.val(chosen_date.format('DD-MM-YYYY'));
    });
    $('.singledatepicker').on('apply.daterangepicker', function(ev,picker){
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
      $(this).trigger('change');
    });
  });
</script>
</body>
</html>
