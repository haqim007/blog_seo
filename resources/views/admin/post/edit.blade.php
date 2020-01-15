@extends('template_admin.home')
@section('subtitle','Edit Post')
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
            <form method="POST" action="{{route('post.update', $posts->id)}}" enctype="multipart/form-data">
            	@csrf
            	@method('patch')
            	<div class="form-group">
	              <label>Judul</label>
	              <input type="text" class="form-control" name="title" value="{{$posts->title}}">
	            </div>
	            <div class="form-group">
	              <label>Kategori</label>
	              <select class="form-control" name="category_id">
	              	<option>-- Pilih --</option>
	              	@foreach($category as $key => $result)
	              		<option value="{{$result->id}}"
	              			@if($posts->category_id == $result->id)
	              				selected
	              			@endif
	              			>{{$result->name}}</option>
	              	@endforeach
	              </select>
	            </div>
	            <div class="form-group">
                  <label>Tags</label>
                  <select class="form-control select2" multiple name="tags[]">
                    <option>-- Pilih --</option>
                    @foreach($tags as $tag)
                    	<option value="{{$tag->id}}" 
                    		@foreach($posts->tags as $value)
                    			@if($tag->id == $value->id)
	                    			selected 
	                    		@endif
                    		@endforeach
                    		>{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
	            <div class="form-group">
	              <label>Konten</label>
	              <textarea name="content" id="content" class="form-control">{{$posts->content}}</textarea>
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
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'content' );
	</script>

@endsection