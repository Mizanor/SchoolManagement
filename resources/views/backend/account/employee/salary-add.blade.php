@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content Munite:30 tu33 -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee salary</li>
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
              <div class="card-header" style="background-color: lightblue">
               <h3>
                
                  Add/Edit Employee salary
                
                <a class="btn btn-success float-right btn-sm" href="{{route('accounts.salary.view')}}"><i class="fa fa-list"></i>Employee salary List</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <lavel classs="control-label">Date</lavel>
                    <input type="text" name="date" id="date" class="form-control singledatepicker" autocomplete="off" placeholder="DD-MM-YYYY" readonly>
                    
                  </div>
                  <div class="form-group col-md-2" >
                    <a id="search" class="btn btn-success" name="search" style="margin-top: 25px; color: white">Search</a>
                  </div>

                 </div>
               </div>

               <div class="card-body">
                <div id="DocumentResult"></div>
                <script type="text/x-handlebars-template" id="document-template">
                  <form action="{{route('accounts.salary.store')}}" method="POST">
                    @csrf
                  <table class="table-sm table-bordered table-striped" style="width: 100%" >
                    <thead>
                       <tr>
                         @{{{thsource}}}
                       </tr>
                       </thead>
                       <tbody>
                         @{{#each this}}
                         <tr>
                          @{{{tdsource}}}
                         </tr>
                         @{{/each}}
                       </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top:10px;">Submit</button>
                  </form>

                </script>
              </div>
                
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

<script type="text/javascript">
    $(document).on('click', '#search', function(){
      
      var date = $('#date').val();
      $('.notifyjs-corner').html('');
      
      if(date == ''){
        $.notify("Month Required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      $.ajax({
        url:"{{route('accounts.salary.get-employee')}}",
        type: "get",
        data: {'date':date},
        beforeSend: function(){

        },
        success: function (data){
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResult').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
    });
  </script>
@endsection