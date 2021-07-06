<!-- Call To Action -->
		@if ($reviews->count() != 0)
		<div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" style="background-image: url({{ asset('assets/images/background/bg4.jpg')}});">
			<div class="container">
				<div class="section-head text-center text-white">
					<h2 class="m-b5">отзывы</h2>
					<h5 class="fw4">Несколько слов от учеников и родителей</h5>
				</div>
				<div class="blog-carousel-center owl-carousel owl-none">
					@foreach ($reviews as $review)
						<div class="item">
						<div class="testimonial-5">
							<div class="testimonial-text">
								<p>{{$review->content}}</p>
							</div>
							<div class="testimonial-detail clearfix">
								<div class="testimonial-pic radius shadow">
									<img src="{{ $review->image ?  $review->image:url('https://img.icons8.com/officel/80/000000/user-male-circle.png') }}" width="100" height="100" alt="">
								</div>
								<strong class="testimonial-name">{{ $review->name }}</strong> 
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@endif
<!-- Call To Action END -->