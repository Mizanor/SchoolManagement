@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                Edit Employee
                @else
                Add Employee
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('employees.reg.view')}}"><i class="fa fa-list"></i>Employee List</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{(@$editData)?route('employees.reg.update',$editData->id):route('employees.reg.store')}}" id="myForm" enctype="multipart/form-data">
                @csrf
         
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Employee Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="name" value="{{@$editData->name}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Father's Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="fname" value="{{@$editData->fname}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Mother's Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="mname" value="{{@$editData->mname}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Mobile No <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="mobile" value="{{@$editData->mobile}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Address <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="address" value="{{@$editData->address}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Gender <font style="color: red">*</font></label>
                    <select name="gender" class="form-control form-control-sm">
                      <option value="">Select Gender</option>
                      <option value="Male" {{(@$editData->gender=='Male')?'selected':''}}>Male</option>
                      <option value="Female" {{(@$editData->gender=='Female')?'selected':''}}>Female</option>
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Religion <font style="color: red">*</font></label>
                    <select name="religion" class="form-control form-control-sm">
                      <option value="">Select Religion</option>
                      <option value="Islam" {{(@$editData->religion=='Islam')?'selected':''}}>Islam</option>
                      <option value="Hindo" {{(@$editData->religion=='Hindo')?'selected':''}}>Hindo</option>
                      <option value="Khristan" {{(@$editData->religion=='Khristan')?'selected':''}}>Khristan</option>
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Date Of Birth <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm singledatepicker" autocomplete="off" name="dob" value="{{@$editData->dob}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Designation <font style="color: red">*</font></label>
                    <select name="designation_id" class="form-control form-control-sm">
                      <option value="">Select Designation</option>
                      @foreach($designations as $designation)
                      <option value="{{$designation->id}}" {{(@$editData->designation_id==$designation->id)?'selected':''}}>{{$designation->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   @if(!@$editData)
                   <div class="form-group col-md-3">
                    <label>Join Date <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm singledatepicker" autocomplete="off" name="join_date" value="{{@$editData->join_date}}" type="text">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Selary <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" autocomplete="off" name="salary" value="{{@$editData->salary}}" type="text">
                  </div>
                  @endif
                  
                
                   
                   <div class="form-group col-md-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control form-control-sm" id="image">
                   </div>
                   <div class="form-group col-md-3">
                    <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/employee_images/'.$editData->image):url('public/upload/no_images.png')}}" style="width: 100px; height: 110px; border: 1px solid #000;">
                   </div>

                 </div>
                 <button type="submit" class="btn btn-primary btn-sm">{{(@$editData)?'Update':'Submit'}}</button>  
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
        
        "name": {
          required: true,
        },
        "fname": {
          required: true,
        },
        "mname": {
          required: true,
        },
        "mobile": {
          required: true,
        },
        "address": {
          required: true,
        },
        "gender": {
          required: true,
        },
        "religion": {
          required: true,
        },
        "dob": {
          required: true,
        },
        "salary": {
          required: true,
        },
        "designation_id": {
          required: true,
        },
        "join_date": {
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