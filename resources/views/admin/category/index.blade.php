@extends('template_admin.home')
@section('subtitle','Kategori')
@section('content')

<a href="{{route('category.create')}}" class="btn btn-info btn-sm">Tambah Kategori</a>
<br><br>
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