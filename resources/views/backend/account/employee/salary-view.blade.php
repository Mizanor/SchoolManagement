@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content 21:mu tuto33 -->
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
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
              <div class="card-header" style="background-color: lightblue;">
               <h3>Employee Salary List
                <a class="btn btn-success float-right btn-sm" href="{{route('accounts.salary.add')}}"><i class="fa fa-plus-circle"></i>Add/Edit Employee Salary</a>

               </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    
                    <tr>
                      <th>SL.</th>
                      <th>Id No</th>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                   
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $data)
                    <tr class="{{$data->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$data['user']['id_no']}}</td>
                      <td>{{$data['user']['name']}}</td>
                      <td>{{$data->amount}}Tk</td>
                      <td>{{date('M Y', strtotime($data->date))}}</td>
                      
                     
                    </tr>
                     @endforeach
                    
                  </tbody>
                </table>
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
@endsection