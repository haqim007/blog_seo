@extends('template_admin.home')
@section('subtitle','Tag')
@section('content')


@if(Session::has('message'))
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		{{Session('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
<a href="{{route('tag.create')}}" class="btn btn-info btn-sm">Tambah Tag</a>
<br><br>
<table class="table table-hover table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Tag</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tag as $key => $result)
		<tr>
			<td>{{$key + $tag->firstitem()}}</td>
			<td> {{$result->name}} </td>
			<td> 
				<form method="POST" action="{{route('tag.destroy', $result->id)}}">
					@csrf
					@method('delete')
					<a href="{{route('tag.edit', $result->id)}}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
				</form>
		</tr>
		@endforeach
	</tbody>
</table>
{{$tag->links()}}
@endsection