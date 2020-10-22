@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student class</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">class</li>
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
               <h3>
                @if(isset($editData))
                Edit class
                @else
                Add class
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('setups.student.class.view')}}"><i class="fa fa-list"></i>Class list List</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{(@$editData)?route('setups.student.class.update',$editData->id):route('setups.student.class.store')}}" id="myForm" enctype="multipart/form-data">
                @csrf
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Student Class</label>
                    <input class="form-control" name="name" value="{{@$editData->name}}" type="text">
                    <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                  </div>
          
                   <div class="form-group col-md-6" style="padding: 30px;">
                     
                     <button type="submit" class="btn btn-primary">{{(@$editData)?'Update':'Submit'}}</button>

              </div>
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
      
      name: {
        required: true,
      },

    },
    messages: {
       
      name: {
        required: "Enter Class Name",
      },
     
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