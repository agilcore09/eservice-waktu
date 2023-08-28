@extends('admin.layouts.index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<section class="content">
        <div class="container-fluid">
  
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="float-right">
                               
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="{{ route('printr')}}"> <button class="btn btn-primary" type="button">Report</button></a>
                                    <a href="{{ route('hapus')}}" onclick="return confirm('anda yakin ingin mereset data')"><button class="btn btn-danger" type="button">Reset</button></a>
                                  </div>
                               
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- Button trigger modal -->



                        </div>
                     

                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                
            </div>
        </div>
        
        <!-- /.row -->
    </section>
       {{-- {{ $data->render() }} --}}
    @endsection
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
    
        function tes(id){
            $('#id').val(id);
            
            $('#id').val(id);

        }

        //  $('#edit').on('show.bs.modal', function (event){
          
        //  console.log("hello");
        // var button = $(event.relatedTarget)
        //   // // var id = button.data('myid')
        //   // var nama_teknisi = button.data('mynama_teknisi')
        //   // var username = button.data('myusername')
        //   // var password = button.data('mypassword')
        //   // var no_hp = button.data('myno_hp')
        //   // var no_tenan = button.data('myno_tenan')
          
          
        //   // var modal =$(this) 
        //   // // modal.find('.modal-body #idedit').val(id);
        //   // modal.find('.modal-body #nama_teknisiq').val(nama_teknisi);
        //   // modal.find('.modal-body #usernameq').val(username);
        //   // modal.find('.modal-body #passwordq').val(password);
        //   // modal.find('.modal-body #no_hpq').val(no_hp);
        //   // modal.find('.modal-body #no_tenanq').val(no_tenan);
        //  })
          
          
        

        
</script>



