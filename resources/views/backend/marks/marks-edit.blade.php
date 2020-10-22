@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Marks Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Marks Edit</li>
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
               <h3>Search Criteria
               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{route('marks.update')}}" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-2">
                    <label>Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control form-control-sm">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{$year->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-2">
                    <label for="class_id">Class <font style="color: red">*</font></label>
                    <select name="class_id" id="class_id" class="form-control form-control-sm select2bs4"> <!--27 Munite tuto 30-->
                      <option selected value="">Select Class</option>
                      @foreach($classes as $cls)
                      <option value="{{$cls->id}}" {{(@$class_id == $cls->id)?"selected":""}}>{{$cls->name}}</option>
                      @endforeach
                    </select>
                   </div>

                   <div class="form-group col-md-2">
                    <label>Section <font size="1px" style="color: green">না থাকলে খালি রাখুন</font></label>
                    <select name="section_id" id="section_id" class="form-control form-control-sm">
                      <option value="">Select Section</option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->name}}</option>
                      @endforeach
                    </select>
                   </div>

                   <div class="form-group col-md-3">
                    <label>Subject <font style="color: red">*</font></label>
                    <select name="assign_subject_id" id="assign_subject_id" class="form-control form-control-sm">
                      <option value="">Select Subject</option>
                      @foreach($classes as $cls)
                      <option value="{{$cls->id}}">{{$cls->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-3">
                    <label >Exam Type <font style="color: red">*</font></label>
                    <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm select2bs4"> <!--27 Munite tuto 30-->
                      <option selected value="">Select Exam Type</option>
                      @foreach($exam_type as $type)
                      <option value="{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                    <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                   </div>
                  </div><br/>
                  <div class="row d-none" id="marks-entry" >
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped dt-responsive" style="width:100%">
                        <thead>
                          <tr>
                            <th>ID No</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Writen Marks</th>
                            <th>Objective Marks</th>
                            <th>Practical Marks</th>
                            <th>Total <small style="color: green" >(Leave Blank. It will be auto genetate) </small> </th>
                          </tr>
                        </thead>
                        <tbody id="marks-entry-tr" >
                        </tbody>
                        
                      </table>
                      <button type="submit" class="btn btn-success btn-sm">UpDate</button>
                    </div>
                    
                  </div>
                  
                </form>
                
              </div>
              
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

  <script type="text/javascript">
    $(document).on('click', '#search', function(){
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
       var section_id = $('#section_id').val();
      var assign_subject_id = $('#assign_subject_id').val();
      var exam_type_id = $('#exam_type_id').val();
      $('.notifyjs-corner').html('');
      if(year_id == ''){
        $.notify("Year Required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      if(class_id == ''){
        $.notify("Class Required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      if(assign_subject_id == ''){
        $.notify("Subject is Required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      if(exam_type_id == ''){
        $.notify("Exam is Required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      $.ajax({
        url: "{{route('marks.get-student-marks')}}",
        type: "GET",
        data: {'year_id': year_id, 'class_id':class_id,'section_id':section_id,'assign_subject_id':assign_subject_id,'exam_type_id':exam_type_id},
        success: function(data){
          $('#marks-entry').removeClass('d-none');
          var html = '';
          $.each(data, function( key, v ){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
            '<td>'+v.student.name+'</td>'+
            
            '<td>'+v.student.gender+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+v.marks+'"></td>'+
            '<td><input type="text" class="form-control form-control-sm" name="mcq[]" value="'+v.mcq+'"></td>'+
            '<td><input type="text" class="form-control form-control-sm" name="practical[]" value="'+v.practical+'"></td>'+
            '<td><input type="text" class="form-control form-control-sm" name="total[]" value="'+v.total+'"></td>'+
            '</tr>';


          });
          html=$('#marks-entry-tr').html(html);//28 munite totu 20
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $(document).on('change','#class_id',function(){
        var class_id = $('#class_id').val();
        $.ajax({
          url: "{{route('get-subject')}}",
          type:"GET",
          data:{class_id:class_id},
          success:function(data){
            var html = '<option value="">Select Subject</option>';
            $.each( data, function(key,v){
              html +='<option value="'+v.id+'">'+v.subject.name+'</option>';
            });
            $('#assign_subject_id').html(html);
          }
        });
      });
    });
  </script>


  <script>
  $(function () {
    $('#myForm').validate({
      rules: {

        "marks[]": {
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