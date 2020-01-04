@extends('template_admin.home')
@section('content')
<h1>Ini adalah laman category</h1>

<table class="table table-hover table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($category as $key => $result)
		<tr>
			<td>{{$key + $category->firstitem()}}</td>
			<td> {{$result->name}} </td>
			<td><a href="" class="btn btn-primary btn-sm">Edit</a> <a href="" class="btn btn-danger btn-sm">Hapus</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{{$category->links()}}
@endsection