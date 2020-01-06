@extends('templates.base')

@section('content')

<section class="content">
    <section class="content-header">
      <h1>
        Edit Data
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
      <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
    
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
           
          </div>
          
         
          <div class="box-body">
            <!-- form start -->
            <form method="POST" action="/member/{{ $member->id }}" role="form">
                @method('patch')
              @csrf
             <div class="box-body">
                <div class="form-group">
                  <label for="nama">Fullname</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter fullname" name="nama" value="{{ $member->nama, }}" >
                  @error('nama')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamat">Home address</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Enter address" name="alamat" value="{{$member->alamat, }}" >
                  @error('alamat')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ $member->email, }}">
                  @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
      
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
  </section>
    
@endsection