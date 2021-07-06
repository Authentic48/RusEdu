  <div class="d-flex job-title-bx section-head mt-5">
      <div class="mr-auto">
          <h2 class="m-b5">Последние вакансии</h2>
          <h6 class="fw4 m-b0">Недавно добавленные вакансии</h5>
      </div>
      <div class="align-self-end">
          <a href="{{route('jobs')}}" class="site-button button-sm">Просмотреть все вакансии <i class="fa fa-long-arrow-right"></i></a>
      </div>
  </div>
          <div class="row">
              @foreach($jobs as $job)
                  <div class="col-lg-4 mt-1">
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

 
