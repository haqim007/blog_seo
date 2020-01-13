@extends('template_admin.home')
@section('subtitle','Tambah User')
@section('content')
	
	@if($errors)
		@foreach($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{$error}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endforeach
	@endif

	<div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{route('user.store')}}">
            	@csrf
            	<div class="form-group">
	              <label>Nama User</label>
	              <input type="text" class="form-control" name="name">
	            </div>
	            <div class="form-group">
	              <label>Email</label>
	              <input type="email" class="form-control" name="email">
	            </div>
	            <div class="form-group">
	              <label>Tipe</label>
	              <select class="form-control" name="type">
	              	<option value="1">Administrator</option>
	              	<option value="0">Author</option>
	              </select>
	            </div>
	            <div class="form-group">
	              <label>Password</label>
	              <input type="Password" class="form-control" name="password">
	            </div>
	            <div class="form-group">
	              <button class="btn btn-primary btn-sm btn-block">Simpan User</button>
	            </div>
            </form>
          </div>
	    </div>
	  </div>
	</div>


@endsection