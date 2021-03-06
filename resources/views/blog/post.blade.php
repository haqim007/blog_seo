@extends('template_blog.blog')

@section('content')
	@foreach($post as $post)
			<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url({{asset($file_loc.$post->image)}});background-repeat: no-repeat;background-size: 100%" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="{{route('blog.category', $post->category->slug)}}">{{$post->category->name}}</a>
						</div>
						<h1>{{$post->title}}.</h1>
						<ul class="post-meta">
							<li><a href="#">{{$post->users->name}}</a></li>
							<li>{{$post->created_at->diffForHumans()}}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
			<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container col-md-8">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
		<div class="section-row">
			{!!$post->content!!}
		</div>

		<!-- post tags -->
		<div class="section-row">
			<div class="post-tags">
				<ul>
					<li>TAGS:</li>
					@foreach($post->tags as $tag)
						<li>{{$tag->name}}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
</div>
	@endforeach
@endsection