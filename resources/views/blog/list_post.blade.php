@extends('template_blog.blog')

@section('content_header')
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					@foreach($newest_post as $np)
					<div class="post post-thumb">
						<a class="post-img" href="{{route('blog.read_post', $np->slug)}}"><img src="{{asset($file_loc.$np->image)}}" style="max-height: 400px" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('blog.category', $np->category->slug)}}">{{$np->category->name}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{route('blog.read_post', $np->slug)}}">{{$np->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="#">{{$np->users->name}}</a></li>
								<li>{{$np->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					@foreach($two_newest_post as $tnp)
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="{{asset($file_loc.$tnp->image)}}" style="height: 200px" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('blog.category', $tnp->category->slug)}}">{{$tnp->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('blog.read_post', $tnp->slug)}}">{{$tnp->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="#">{{$tnp->users->name}}</a></li>
								<li>{{$tnp->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
					@endforeach

				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection

@section('content')
<!-- post -->
<div class="col-md-8">
@foreach($posts as $post)
	<div class="post post-row">
		<a class="post-img" href="{{route('blog.read_post', $post->slug)}}"><img src="{{asset($file_loc.$post->image)}}" alt=""></a>
		<div class="post-body">
			<div class="post-category">
				<a href="#">{{$post->category->name}}</a>
			</div>
			<h3 class="post-title"><a href="{{route('blog.read_post', $post->slug)}}">{{$post->title}}</a></h3>
			<ul class="post-meta">
				<li><a href="author.html">{{$post->users->name}}</a></li>
				<li>{{$post->created_at->diffForHumans()}}</li>
			</ul>
			{!! Str::limit($post->content, 300) !!}
		</div>
	</div>
@endforeach
{{$posts->links()}}
</div>
@endsection