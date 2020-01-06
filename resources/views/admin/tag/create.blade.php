@extends('template_admin.home')
@section('subtitle','Tambah Tag')
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
            <form method="POST" action="{{route('tag.store')}}">
            	@csrf
            	<div class="form-group">
	              <label>Nama Tag</label>
	              <input type="text" class="form-control" name="name">
	            </div>
	            <div class="form-group">
	              <button class="btn btn-primary btn-sm btn-block">Simpan Tag</button>
	            </div>
            </form>
          </div>
	    </div>
	  </div>
	</div>


@endsection