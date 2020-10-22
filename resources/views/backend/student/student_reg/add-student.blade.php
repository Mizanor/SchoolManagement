@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
                Edit Student
                @else
                Add Student
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('students.registration.view')}}"><i class="fa fa-list"></i>Student List</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{(@$editData)?route('students.registration.update',$editData->student_id):route('students.registration.store')}}" id="myForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{(@$editData->id)}}">
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Student Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="name" value="{{@$editData['student']['name']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Father's Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="fname" value="{{@$editData['student']['fname']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Mother's Name <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="mname" value="{{@$editData['student']['mname']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Mobile No <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="mobile" value="{{@$editData['student']['mobile']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Address <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" name="address" value="{{@$editData['student']['address']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Gender <font style="color: red">*</font></label>
                    <select name="gender" class="form-control form-control-sm">
                      <option value="">Select Gender</option>
                      <option value="Male" {{(@$editData['student']['gender']=='Male')?'selected':''}}>Male</option>
                      <option value="Female" {{(@$editData['student']['gender']=='Female')?'selected':''}}>Female</option>
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Religion <font style="color: red">*</font></label>
                    <select name="religion" class="form-control form-control-sm">
                      <option value="">Select Religion</option>
                      <option value="Islam" {{(@$editData['student']['religion']=='Islam')?'selected':''}}>Islam</option>
                      <option value="Hindo" {{(@$editData['student']['religion']=='Hindo')?'selected':''}}>Hindo</option>
                      <option value="Khristan" {{(@$editData['student']['religion']=='Khristan')?'selected':''}}>Khristan</option>
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Date Of Birth <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm singledatepicker" autocomplete="off" name="dob" value="{{@$editData['student']['dob']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Discount <font style="color: red">*</font></label>
                    <input class="form-control form-control-sm" autocomplete="off" name="discount" value="{{@$editData['discount']['discount']}}" type="text">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Year <font style="color: red">*</font></label>
                    <select name="year_id" class="form-control form-control-sm">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}" {{(@$editData->year_id==$year->id)?'selected':''}}>{{$year->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Class <font style="color: red">*</font></label>
                    <select name="class_id" class="form-control form-control-sm">
                      <option value="">Select Class</option>
                      @foreach($classes as $cls)
                      <option value="{{$cls->id}}" {{(@$editData->class_id==$cls->id)?'selected':''}}>{{$cls->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Group</label>
                    <select name="group_id" class="form-control form-control-sm">
                      <option value="">Select Group</option>
                      @foreach($groups as $grp)
                      <option value="{{$grp->id}}" {{(@$editData->group_id==$grp->id)?'selected':''}}>{{$grp->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Shift</label>
                    <select name="shift_id" class="form-control form-control-sm">
                      <option value="">Select Shift</option>
                      @foreach($shifts as $shifts)
                      <option value="{{$shifts->id}}" {{(@$editData->shift_id==$shifts->id)?'selected':''}}>{{$shifts->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control form-control-sm" id="image">
                   </div>
                   <div class="form-group col-md-4">
                    <img id="showImage" src="{{(!empty($editData['student']['image']))?url('public/upload/student_images/'.$editData['student']['image']):url('public/upload/no_images.png')}}" style="width: 100px; height: 110px; border: 1px solid #000;">
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
        "discount": {
          required: true,
        },
        "year_id": {
          required: true,
        },
        "class_id": {
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