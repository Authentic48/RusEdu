                        <div class="d-flex job-title-bx section-head mt-5">
                            <div class="mr-auto">
                                <h2 class="m-b5">Последние инструкторы</h2>
                                <h6 class="fw4 m-b0">Недавно добавленные инструкторы</h5>
                            </div>
                            <div class="align-self-end">
                                <a href="{{route('teachers')}}" class="site-button button-sm">Просмотреть все инструкторы <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <ul class="post-job-bx">
                            <div class="row">
                            @foreach($teachers as $teacher)
                            <div class="col-lg-4 mt-1">
                                <li>
                                    <a href="{{ route('teachers.show', $teacher->slug) }}">
                                        <div class="d-flex m-b30">
                                            <div class="job-post-company">
                                                <span><img src="{{ asset($teacher->pic) }}" /></span>
                                            </div>
                                            <div class="job-post-info">
                                                <h4>{{ $teacher->name }}</h4>
                                                <ul>
                                                    <li><i class="fa fa-map-marker"></i>{{ $teacher->location }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="job-time mr-auto">
                                                <span>{{ $teacher->subject }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </div>
                            @endforeach
</ul>
