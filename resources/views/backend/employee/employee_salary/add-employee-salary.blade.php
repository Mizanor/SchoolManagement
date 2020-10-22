@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
                Employee Salary Increment
                
                <a class="btn btn-success float-right btn-sm" href="{{route('employees.salary.view')}}"><i class="fa fa-list"></i>Employee List</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{route('employees.salary.store',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                @csrf
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Salary Amount</label>
                    <input class="form-control" name="increment_salary"  type="text">
                  </div>

                  <div class="form-group col-md-4">
                    <label>Effected Date</label>
                    <input class="form-control singledatepicker" name="effected_salary"  type="text">
                  </div>
          
                   <div class="form-group col-md-4" style="padding: 30px;">
                     
                     <button type="submit" class="btn btn-primary">Submit</button>

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
        
        "increment_salary": {
          required: true,
        },
        "effected_salary": {
          required: true,
        }
      

      },
      messages: {
         
        
       
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