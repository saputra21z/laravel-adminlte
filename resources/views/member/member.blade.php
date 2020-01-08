@extends('templates.base')

@section('content')
<section class="content">
  <section class="content-header">
    <h1>
      Data Table
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
          <h3 class="box-title"><a href="{{ url('member/create')}}" class=" btn btn-primary mt-3">Tambah Data</a></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" seatitle="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
         
        <div class="box-body">
          {{-- content --}}
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($no = $members->perPage() * $members->currentPage() - $members->perPage()+ 1)
                        
                      @foreach ($members as $item)
              
                  <tr>
                    <th scope="row">{{$no}}</th>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->email}}</td>
                    <td>

      
                      
                      <form action="/member/{{ $item->id }}" method="POST" class="d-inline">
                       
                        <a href="/member/{{ $item->id }}/edit"  class="btn btn-primary">
                          <i class="fa fa-edit"> edit </i>
                        </a>
                        {{-- untuk ngelabuhi method post yaitu dengan menambahkan method delete --}}
                        @method('delete')  

                        @csrf

                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash"> delete </i>
                        </button>
                    </form>
                    </td>
                  </tr>
                  @php ($no++)
                  @endforeach
                </table>
              </div>
         
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{$members->links()}}
        </div>
        <!-- /.box-footer-->
      </div>
</section>
@endsection