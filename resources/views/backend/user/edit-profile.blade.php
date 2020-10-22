@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
               <h3>Edit Profile
                <a class="btn btn-success float-right btn-sm" href="{{route('profiles.view')}}"><i class="fa fa-list"></i>Your Profile</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-row">
               
               
           

              
              <div class="form-group col-md-4">
                <label>Name</label>
                <input class="form-control" name="name"value="{{$editData->name}}" type="text" class="form-control" >
                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
              </div>
             <div class="form-group col-md-4">
               <label>Email</label>
               <input class="form-control" name="email" type="email" value="{{$editData->email}}" >
               <font style="color: red">
               {{($errors->has('email'))?($errors->first('email')):''}}</font>
             </div>

             <div class="form-group col-md-4">
               <label>Mobile</label>
               <input class="form-control" name="mobile" type="text" value="{{$editData->mobile}}" >
               <font style="color: red">
               {{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
             </div>

             <div class="form-group col-md-4">
               <label>Address</label>
               <input class="form-control" name="address" type="text" value="{{$editData->address}}" >
               <font style="color: red">
               {{($errors->has('address'))?($errors->first('address')):''}}</font>
             </div>

             <div class="form-group col-md-4">
               <label for="gender">Gender</label>
               <select name="gender" id="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
               <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
               </select>
             </div>
              <div class="form-group col-md-4">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control" id="image">
             </div>

             <div class="form-group col-md-5">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_images.png')}}" style="width: 150px; height: 160px; border: 1px solid #000;">
             </div>
            

               <div class="form-group col-md-6" style="padding-top: 180px;">
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
       usertype: {
        required: true,
      },
      name: {
        required: true,
      },

      email: {
        required: true,
        email: true,
      },
      password : {
        required : true,
        minlength : 6
      },
      password2 : {
        required : true,
        equalTo : '#password'
      }
    
    },
    messages: {
       usertype: {
        required: "Select User role",
      },
      name: {
        required: "Enter Name",
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters or number"
      },

        password2: {
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