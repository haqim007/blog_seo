
<div class="col-md-4">

	<!-- social widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">Social Media</h2>
		</div>
		<div class="social-widget">
			<ul>
				<li>
					<a href="#" class="social-facebook">
						<i class="fa fa-facebook"></i>
						<span>21.2K<br>Followers</span>
					</a>
				</li>
				<li>
					<a href="#" class="social-twitter">
						<i class="fa fa-twitter"></i>
						<span>10.2K<br>Followers</span>
					</a>
				</li>
				<li>
					<a href="#" class="social-google-plus">
						<i class="fa fa-google-plus"></i>
						<span>5K<br>Followers</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /social widget -->

	<!-- category widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">Categories</h2>
		</div>
		<div class="category-widget">
			<ul>
				@foreach($categories as $category)
					<li><a href="{{route('blog.category', $category->slug)}}">{{$category->name}} <span>{{$category->posts->count()}}</span></a></li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /category widget -->

	<!-- newsletter widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">Newsletter</h2>
		</div>
		<div class="newsletter-widget">
			<form>
				<input class="input" name="newsletter" placeholder="Enter Your Email">
				<button class="primary-button">Subscribe</button>
			</form>
		</div>
	</div>
	<!-- /newsletter widget -->

	<!-- post widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">Popular Posts</h2>
		</div>
		@foreach($popular_post as $post)
		<!-- post -->
		<div class="post post-widget">
			<a class="post-img" href="blog-post.html"><img src="{{asset($file_loc.$post->image)}}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="{{route('blog.read_post', $post->category->slug)}}">{{$post->category->name}}</a>
				</div>
				<h3 class="post-title"><a href="{{route('blog.read_post', $post->slug)}}">{{$post->title}}</a></h3>
			</div>
		</div>
		<!-- /post -->
		@endforeach

	</div>
	<!-- /post widget -->
</div>