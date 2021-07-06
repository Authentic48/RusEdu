<!-- Our Job -->
		<div class="section-full bg-white content-inner-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="d-flex job-title-bx section-head">
							<div class="mr-auto">
								<h2 class="m-b5">Последние школы</h2>
								<h6 class="fw4 m-b0">Недавно добавленные школы</h5>
							</div>
							<div class="align-self-end">
								<a href="{{route('schools')}}" class="site-button button-sm">Просмотреть все школы <i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
						<ul class="post-job-bx">
						<div class="row">
							@foreach ($schools as $school)
							 <div class="col-lg-4 mt-1">
								<li>
									<a href="{{ route('schools.show', $school->slug) }}">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{ asset($school->pic) }}"/></span>
											</div>
											<div class="job-post-info">
												<h4>{{ $school->name }}</h4>
												<ul>
													<li><i class="fa fa-map-marker"></i>{{$school->location}}</li>
												</ul>
											</div>
										</div>
										<div class="d-flex">
											<div class="job-time mr-auto">
												<span>{{$school->subject}}</span>
											</div>
										</div>
									</a>
								</li>
							</div>
								@endforeach
						</div>
						</ul>
						@include('frontend.partials.teachers')
						
						@include('frontend.partials.jobs')
					</div>
						<div class="col-lg-3">
						<div class="sticky-top">
							@if ($jobs->count() == 1000)
							<div class="candidates-are-sys m-b30">
								<div class="candidates-bx">
									<div class="testimonial-pic radius"><img src="{{asset('assets/images/testimonials/pic3.jpg')}}" alt="" width="100" height="100"></div>
									<div class="testimonial-text">
										<p>I just got a job that I applied for via careerfy! I used the site all the time during my job hunt.</p>
									</div>
									<div class="testimonial-detail"> <strong class="testimonial-name">Richard Anderson</strong> <span class="testimonial-position">Nevada, USA</span> </div>
								</div>
							</div>
							@endif
							@if (!Auth::check())
							<div class="quote-bx">
								<div class="quote-info">
									<h4>Сделайте разницу с вашим онлайн-профилем!</h4>
									<p>Ваш профиль в минутах с нами!</p>
									<a href="{{ route('register') }}" class="site-button">Завести аккаунт</a>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Our Job END -->