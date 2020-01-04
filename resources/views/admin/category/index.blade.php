@extends('template_admin.home')
@section('content')
<h1>Ini adalah laman category</h1>
@foreach($category as $result)
	<table class="table table-hover table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td> {{$result->name}} </td>
				<td><a href="" class="btn btn-primary btn-sm">Edit</a><a href="" class="btn btn-danger btn-sm">Hapus</a></td>
			</tr>
		</tbody>
	</table>
@endforeach
@endsection