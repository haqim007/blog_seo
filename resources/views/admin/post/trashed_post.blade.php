@extends('template_admin.home')
@section('subtitle','Trashed Posting')
@section('content')
<style type="text/css">
	td {
		 vertical-align: middle!important;
	}
</style>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		{{Session('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

<table class="table table-hover table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Posting</th>
			<th>Kategory</th>
			<th>Tags</th>
			<th>Gambar</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($posts as $key => $result)
		<tr>
			<td>{{$key + $posts->firstitem()}}</td>
			<td> {{$result->title}} </td>
			<td> {{ $result->category->name }} </td>
			<td>
				<ul>
				@foreach($result->tags as $tag)
						<li>{{$tag->name}}</li>
				@endforeach
				</ul>
			</td>
			<td><img src="{{ asset($file_loc.$result->image) }}" class="mx-auto d-block" style="width: 25%" /></td>
			<td> 
				<form method="POST" action="{{route('post.destroy_permanent', $result->id)}}">
					@csrf
					@method('delete')
					<a href="{{route('post.restore', $result->id)}}" class="btn btn-primary btn-sm">Restore</a>
					<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
				</form>
		</tr>
		@endforeach
	</tbody>
</table>
{{$posts->links()}}
@endsection