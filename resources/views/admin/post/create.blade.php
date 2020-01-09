@extends('template_admin.home')
@section('subtitle','Tambah Post')
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
            <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            	@csrf
            	<div class="form-group">
	              <label>Judul</label>
	              <input type="text" class="form-control" name="title">
	            </div>
	            <div class="form-group">
	              <label>Kategori</label>
	              <select class="form-control" name="category_id">
	              	<option>-- Pilih --</option>
	              	@foreach($category as $key => $result)
	              		<option value="{{$result->id}}">{{$result->name}}</option>
	              	@endforeach
	              </select>
	            </div>
	            <div class="form-group">
	              <label>Konten</label>
	              <textarea name="content" class="form-control"></textarea>
	            </div>
	            <div class="form-group">
	              <label>Thumbnail</label>
	              <input type="file" class="form-control" name="image">
	            </div>
	            <div class="form-group">
	              <button class="btn btn-primary btn-sm btn-block">Simpan Post</button>
	            </div>
            </form>
          </div>
	    </div>
	  </div>
	</div>


@endsection