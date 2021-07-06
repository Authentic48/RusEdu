@extends('frontend.layouts.app')

@section('content')
   
   	<div class="content-block">
            <div class="section-full bg-white browse-job content-inner-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8">
							<ul class="post-job-bx">
								<div class="row">
								@foreach ($schools as $school)
								  <div class="col-lg-4 mt-2">
									<li>
									<a href="{{ route('schools.show', $school->slug)}}">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{ asset($school->pic)}}"/></span>
											</div>
											<div class="job-post-info">
												<h4>{{$school->name}}</h4>
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

						</div>
						<div class="col-xl-3 col-lg-4">
							<!-- ads -->
						</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

@endsection