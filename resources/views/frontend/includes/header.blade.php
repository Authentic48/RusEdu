<!-- header -->
<header class="site-header mo-left header fullwidth">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container clearfix">
                <!-- website logo -->
                <div class="logo-header mostion">
                    <a href="{{ route('landing') }}"><img src="{{ asset('assets/images/logo2.png') }}" class="logo" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        @guest
                            <a href="{{ route('login') }}" class="site-button"><i
                                    class="fa fa-lock"></i> вход</a>
                            @if(Route::has('register'))
                                <a href="{{ route('register') }}" class="site-button"><i
                                        class="fa fa-user"></i> регистрация</a>
                            @endif

                        @else
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h6
                                        class="mr-2 d-none d-lg-inline ">{{ Auth::user()->name }}</h6>
                                    <img class="img-profile"
                                        src="{{ Auth::user()->profile_image ? Auth::user()->profile_image: url('assets/images/placeholder.jpg') }}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                        
                                    @if (Auth::user()->hasAnyRole('student'))
                                    <code><a class="dropdown-item" href="{{ route('student.post') }}">
                                       <i class="ti-user"> </i> мой пост
                                       </a></code>
                                    @endif
                                     @if (Auth::user()->hasSchoolProfile(Auth::user()->id))
                                       <code>
                                    <a class="dropdown-item" href="{{ route('job.post')}}">
                                       <i class="ti-bag"></i> Мой вакансии 
                                    </a>
                                     <a class="dropdown-item" href="{{ route('program.index')}}">
                                       <i class="ti-bag"></i> наши программы
                                    </a>
                                     <a class="dropdown-item" href="{{ route('invitations') }}">
                                       <i class="ti-email"> </i>мое приглашение
                                       </a>
                                </code>
                                    @endif
                                    @if (Auth::user()->hasAnyRole('school') && !Auth::user()->hasSchoolProfile(Auth::user()->id))
                                    <a class="dropdown-item" href="{{ route('school.profile')}}">
                                        <i class="ti-bag"></i> создать профиль
                                     </a>
                                    @endif
                                    @if (Auth::user()->hasAnyRole('teacher') && !Auth::user()->hasTeacherProfile(Auth::user()->id))
                                    <a class="dropdown-item" href="{{ route('teacher.profile')}}">
                                        <i class="ti-bag"></i> создать профиль
                                     </a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->hasAnyRole('admin'))
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        <i class="ti-bag"> </i>Admin
                                        </a>
                                    @endif
                                     @if (Auth::user()->hasTeacherProfile(Auth::user()->id))
                                        <a class="dropdown-item" href="{{ route('myapplication') }}">
                                       <i class="ti-bag"> </i> моя заявка на работу
                                       </a>
                                        <a class="dropdown-item" href="{{ route('invitations') }}">
                                       <i class="ti-email"> </i>Мои сообщения
                                       </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                       <i class="ti-settings"> </i> настройки
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        data-toggle="modal" data-target="#logoutModal"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('выйти') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                          </ul>
                        @endguest
                    </div>
                </div>
                <!-- Quik search -->
                <div class="dez-quik-search bg-primary">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span id="quik-search-remove"><i class="flaticon-close"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('teachers') }}">инструкторы</i></a>
                        </li>
                        <li>
                            <a href="{{ route('schools') }}">школы</i></a>
                        </li>
                        <li>
                            <a href="{{ route('students') }}">посты</i></a>
                        </li>
                         <li>
                            <a href="{{ route('jobs') }}">вакансии</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->



