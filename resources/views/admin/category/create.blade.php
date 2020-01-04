@extends('template_admin.home')
@section('subtitle','Tambah Kategori')
@section('content')
	
	<div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{route('category.store')}}">
            	@csrf
            	<div class="form-group">
	              <label>Nama Kategori</label>
	              <input type="text" class="form-control" name="name">
	            </div>
	            <div class="form-group">
	              <button class="btn btn-primary btn-sm btn-block">Simpan Kategori</button>
	            </div>
            </form>
          </div>
	    </div>
	  </div>
	</div>


@endsection