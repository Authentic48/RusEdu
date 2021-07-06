@extends('frontend.layouts.app')

@section('content')
        	@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
            @endif
		<div class="content-block">
            <div class="section-full bg-white browse-job content-inner-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8">
							<ul class="post-job-bx">
								<div class="row">
								@foreach ($teachers as $teacher)
								<div class="col-lg-4">
									<li>
									<a href="{{ route('teachers.show', $teacher->slug)}}">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{ asset($teacher->pic)}}"/></span>
											</div>
											<div class="job-post-info">
												<h4>{{$teacher->name}}</h4>
												<ul>
													<li><i class="fa fa-map-marker"></i>{{$teacher->location}}</li>
												</ul>
											</div>
										</div>
										<div class="d-flex">
											<div class="job-time mr-auto">
												<span>{{$teacher->subject}}</span>
											</div>
										</div>
									</a>
								</li>
							</div>
								@endforeach
							</div>
							</ul>
							{{$teachers->links()}}
						</div>
						<div class="col-xl-3 col-lg-4">
							<div class="sticky-top">
							<form action="{{ route('search.teacher') }}"  method="POST">
								@csrf
									<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">ключевые слова</h5>
										<input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="поиск">
									 @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="clearfix m-b10">
									<h5 class="widget-title font-weight-700 m-t0 text-uppercase">город</h5>
									<input type="text" name="location" class="form-control m-b30 @error('location') is-invalid @enderror" placeholder="Москва">
									 @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
                              <button type="submit" class="site-button">поиск</button>
								</form>
							</div>
							<!-- ads -->
						</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
@endsection