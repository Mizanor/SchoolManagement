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
              <li class="breadcrumb-item"><a href="">Home</a></li>
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
               <h3>Student List
               <a class="btn btn-success float-right btn-sm" href="{{route('students.registration.add')}}"><i class="fa fa-plus-circle"></i>Add Attendence</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="GET" action="{{route('get.students.attendence')}}" id="myForm">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                    <label>Year <font style="color: red">*</font></label>
                    <select name="year_id" class="form-control form-control-sm">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}" {{(@$year_id==$year->id)?"selected":""}}>{{$year->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-3">
                    <label>Class <font style="color: red">*</font></label>
                    <select name="class_id" class="form-control form-control-sm">
                      <option value="">Select Class</option>
                      @foreach($classes as $cls)
                      <option value="{{$cls->id}}" {{(@$class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
                      @endforeach
                    </select>
                    
                   </div>
                   <div class="form-group col-md-2">
                    <label>Section <font style="color: red">*</font></label>
                     <select name="shift_id" class="form-control form-control-sm">
                        <option value="">Select Section</option>
                        @foreach($shifts as $shift)
                        <option value="{{$shift->id}}" {{(@$shift_id==$shift->id)?"selected":""}}>{{$shift->name}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Group <font style="color: red">*</font></label>
                     <select name="group_id" class="form-control form-control-sm">
                        <option value="">Select Group</option>
                        @foreach($groups as $groups)
                        <option value="{{$groups->id}}" {{(@$groups_id==$groups->id)?"selected":""}}>{{$groups->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  

                   <div class="form-group col-md-4" style="padding-top: 32px;">
                    <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                   </div>
                  </div>
                </form>
                
              </div>
              <div class="card-body">
                @if(!@$search)
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    
                    <tr>
                      <th>SL.</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                   
                  </thead>
                  <tbody>
                    @foreach($allData as $key=> $value)
                    <tr class="{{$value->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{date('d-m-Y',strtotime($value->date))}}</td>
                      <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                         <a title="Edit" class="btn btn-sm btn-success" href=""><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                     @endforeach
                    
                  </tbody>
                </table>
                @else
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    
                    <tr>
                      <th width="7%">SL.</th>
                      <th>Name</th>
                      <th>Id No</th>
                      <th>Roll</th>
                      <th>Year</th>
                      <th>Class</th>
                      <th>Section</th>
                      
                      <th width="15%">Action</th>
                    </tr>
                   
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $value)
                    <tr class="{{$value->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$value['student']['name']}}</td>
                      <td>{{$value['student']['id_no']}}</td>
                      <td>{{$value->roll}}</td>
                      <td>{{$value['year']['name']}}</td>
                      <td>{{$value['student_class']['name']}}</td>
                      <td>{{$value['section']['name']}}</td>
                      
                     
                      <td>
                       
                     <a target="_blank" title="Details" class="btn btn-sm btn-primary" href="{{route('students.registration.result', $value->student_id)}}">Result</a>
                      </td>
                    </tr>
                     @endforeach
                    
                  </tbody>
                </table>
                @endif
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