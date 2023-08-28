@extends('admin.layouts.index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Home</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Teknisi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<section class="content">
        <div class="container-fluid">
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
           <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('AdminLTE/dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Servisan</h3>

                {{-- <p class="text-muted text-center">Software Engineer</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                    <b>Teknisi</b> <a class="float-right">{{$data}}</a>
                  </li>
                   <li class="list-group-item">
                    <b>Costumer</b> <a class="float-right">{{$cos}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Servisan Dikerja</b> <a class="float-right">{{$kerja}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Servisan Selesai</b>:<a class="float-right">{{$selesai}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Garansi di Klaim</b>:<a class="float-right">{{$klaim}}</a></a>
                  </li>
                   <li class="list-group-item">
                    <b>Garansi selesai</b>:<a class="float-right">{{$doneklaim}}</a>
                  </li>
                </ul>
                

              </div>
              <!-- /.card-body -->
            </div>
              </div>
         
          
           

    @endsection
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   


