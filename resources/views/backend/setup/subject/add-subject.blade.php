@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subject</li>
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
                Edit Subject
                @else
                Add Subject
                @endif
                <a class="btn btn-success float-right btn-sm" href="{{route('setups.subject.view')}}"><i class="fa fa-list"></i>Subject List</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <form method="post" action="{{(@$editData)?route('setups.subject.update',$editData->id):route('setups.subject.store')}}" id="myForm" enctype="multipart/form-data">
                @csrf
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Subject Name</label>
                    <input class="form-control" name="name" value="{{@$editData->name}}" type="text">
                    <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label> Subject Code </label>
                    <input class="form-control" name="code" value="{{@$editData->code}}" type="text">
                    <font style="color: red">{{($errors->has('code'))?($errors->first('code')):''}}</font>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Subject Type</label>
                    <select name="type" class="form-control">
                      <option value="">Subject Type</option>
                      <option value="Core Subject" {{(@$editData->type=='Core Subject')?'selected':''}}>Core Subject</option>
                      <option value="OptionAl Subject" {{(@$editData->type=='OptionAl Subject')?'selected':''}}>Optional Subject</option>
                    </select>
                   </div>

                  

                  
                   <div class="form-group col-md-6">
                     
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