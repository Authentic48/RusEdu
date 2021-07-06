@extends('frontend.layouts.app')

@section('content')
        <!-- inner page banner END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-7 m-b10">
                        <!-- blog start -->
                        <div class="blog-post blog-single blog-style-1">
							<div class="dez-post-meta">
								<ul class="d-flex align-items-center">
									<li class="post-date"><i class="fa fa-calendar"></i>{{ $post->created_at->diffForHumans() }}</li>
                                    <li class="post-author"><i class="fa fa-user"></i>Oт {{$post->name}} </li>
                                    <li class="post-comment"><i class="fa fa-envelope"></i>{{$post->email}} </li>
								</ul>
							</div>
                            <div class="dez-post-title">
                                <h4 class="post-title m-t0">{{$post->title}}</h4>
                            </div>
                            <div class="dez-post-text">
                                <p>{!! nl2br(e($post->content)) !!}</p>           
                            </div>
							<div class="dez-divider bg-gray-dark op4"><i class="icon-dot c-square"></i></div>
                        </div>
                        <h3 class="fw4 mb-3">Недавно добавленные вакансии</h3>
                            <div class="row">
                                @foreach($jobs as $job)
                                    <div class="col-lg-4">
                                        <div class="m-b30 blog-grid">
                                            <div class="dez-info p-a20 border-1">
                                                <div class="dez-post-title ">
                                                    <h5 class="post-title"><a
                                                            href="{{ route('jobs.show',$job->slug ) }}">{{ $job->title }}</a>
                                                    </h5>
                                                </div>
                                                <div class="dez-post-meta ">
                                                    <ul>
                                                        <li class="post-date"> <i class="ti-location-pin"></i>{{ $job->city }}</li>
                                                        <li class="post-author"><i class="ti-user"></i>Oт <a
                                                                href="#">{{ $job->name }}</a> </li>
                                                    </ul>
                                                </div>
                                                <div class="dez-post-text">
                                                    <p class="text-truncate">{{ $job->description }}</p>
                                                </div>
                                                <div class="dez-post-readmore">
                                                    <i class="fa fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</li>
                                                </div>
                                            </div>
                  
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                      </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-5 sticky-top">
                        <aside  class="side-bar">
                            <div class="widget recent-posts-entry">
                                <h6 class="widget-title style-1">Недавние Посты</h6>
                               @foreach ($posts as $post)
                                    <div class="widget-post-bx">
                                    <div class="widget-post clearfix">
                                        
                                        <div class="dez-post-info">
                                            <div class="dez-post-header">
                                                <h6 class="post-title"><a href="{{ route('students.show', $post->slug) }}">{{$post->title}}</a></h6>
                                            </div>
											<div class="dez-post-meta">
												<ul class="d-flex align-items-center">
													<li class="post-date">{{ $post->created_at->diffForHumans() }}</li>
													<li class="post-author"><i class="fa fa-user"></i>Oт {{$post->name}} </li>
												</ul>
											</div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </div>
							
							
							
							<div class="widget widget_archive">
                               <!--ads -->
                            </div>
							
                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
@endsection