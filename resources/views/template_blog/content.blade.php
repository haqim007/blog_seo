
<div class="col-md-8">
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2 class="title">Recent posts</h2>
		</div>
	</div>
	@foreach($posts as $post)
	<!-- post -->
	<div class="col-md-6">
		<div class="post">
			<a class="post-img" href="{{route('blog.read_post', $post->slug)}}"><img src="{{asset($file_loc.$post->image)}}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="{{route('blog.category', $post->category->slug)}}">{{$post->category->name}}</a>
				</div>
				<h3 class="post-title"><a href="{{route('blog.read_post', $post->slug)}}">{{$post->title}}</a></h3>
				<ul class="post-meta">
					<li><a href="{{route('blog.read_post', $post->slug)}}">{{$post->users->name}}</a></li>
					<li>{{$post->created_at->diffForHumans()}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /post -->
	@endforeach

</div>
</div>
			<!-- /row -->



