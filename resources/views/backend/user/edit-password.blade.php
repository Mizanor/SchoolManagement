@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pasword</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
               <h3>Edit Password
               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{route('profiles.password.update')}}" id="myForm" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-row">
                   <div class="form-group col-md-4">
               <label>Current Password</label>
                <input class="form-control" name="current_password"type="password" id="current_password">
              </div>
               
               <div class="form-group col-md-4">
               <label>New Password</label>
                <input class="form-control" minlength="5" name="new_password"type="password" id="new_password">
              </div>

              <div class="form-group col-md-4">
               <label>Again New Password</label>
                <input class="form-control" minlength="5" name="again_new_password"type="password">
              </div>
              </div>
               <div class="form-group col-md-6">
               <input type="submit" value="Update" class="btn btn-primary">
               </div>
               </div>  
      
          

              </form>
                
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            

           
            <!-- /.card -->
          </section>
          
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script>
$(function () {
  $('#myForm').validate({
    rules: {
      current_password : {
        required : true,
      },

      new_password : {
        required : true,
        minlength : 6
      },
      again_new_password : {
        required : true,
        equalTo : '#new_password'
      }
    
    },
    messages: {
        current_password: {
        required: "Please Enter current password",
      },
        new_password: {
        required: "Please Enter New password",
        minlength: "Your password must be at least 6 characters or number"
      },

        again_new_password: {
        required: "Please enter confirm password",
        equalTo : "Password Not match",
      }

     
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection