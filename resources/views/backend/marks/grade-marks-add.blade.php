@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Grade Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Grade Point</li>
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
                  Edit Grade Point
                @else
                  Add Grade Point
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('marks.grade.view')}}"><i class="fa fa-list"></i>Grade Point List</a>

               </h3>
              </div><!-- /.card-header -->
              

             <form method="post" action="{{(@$editData)?route('marks.grade.update',$editData->id):route('marks.grade.store')}}" id="myForm">
                @csrf
                <div class="card-body">
         
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Grade Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="grade_name" value="{{@$editData->grade_name}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Grade Point <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="grade_point" value="{{@$editData->grade_point}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Start Marks<font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="start_marks" value="{{@$editData->start_marks}}" type="text">
                  </div>

                  <div class="form-group col-md-4">
                    <label>End Marks <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="end_marks" value="{{@$editData->end_marks}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Start Point<font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="start_point" value="{{@$editData->start_point}}" type="text">
                  </div>

                  <div class="form-group col-md-4">
                    <label>End Point <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="end_point" value="{{@$editData->end_point}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Remarks <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="remarks" value="{{@$editData->remarks}}" type="text">
                  </div>
                   <button type="submit" class="btn btn-success" class="form-group" style="margin-top: 30px; margin-bottom: 40px;">{{(@$editData)?'Update':'Submit'}}</button>
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
      
      grade_name: {
        required: true,
      },
      grade_point: {
        required: true,
      },
      start_marks: {
        required: true,
      },
      end_marks: {
        required: true,
      },
      start_point: {
        required: true,
      },
      end_point: {
        required: true,
      },
      remarks: {
        required: true,
      },

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