@extends('template_admin.home')
@section('subtitle','Daftar User')
@section('content')


@if(Session::has('message'))
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		{{Session('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
<a href="{{route('user.create')}}" class="btn btn-info btn-sm">Tambah User</a>
<br><br>
<table class="table table-hover table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama User</th>
			<th>Email</th>
			<th>Tipe</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $result)
		<tr>
			<td>{{$key + $users->firstitem()}}</td>
			<td> {{$result->name}} </td>
			<td> {{$result->email}} </td>
			<td>
				@if($result->type)
					<span class="badge badge-info">Administrator</span>
				@else
					<span class="badge badge-warning">Author</span>
				@endif
			</td>
			<td> 
				<form method="POST" action="{{route('user.destroy', $result->id)}}">
					@csrf
					@method('delete')
					<a href="{{route('user.edit', $result->id)}}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
				</form>
		</tr>
		@endforeach
	</tbody>
</table>
{{$users->links()}}
@endsection