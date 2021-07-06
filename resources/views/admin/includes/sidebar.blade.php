	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- side menu logo start -->
			<div class="ttr-sidebar-logo">
				<a href="#"><img alt="" src="{{ asset('assets/images/logo.png')}}" width="122" height="27"></a>
				<!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
					<i class="material-icons ttr-fixed-icon">gps_fixed</i>
					<i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
				</div> -->
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="{{route('admin')}}" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashboard</span>
		                </a>
					</li>
					@if (Auth::check() && Auth::user()->hasAnyRole('admin'))
					<li>
				   <a href="#" class="ttr-material-button">
					   <span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
					   <span class="ttr-label">Pages</span>
					   <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
				   </a>
				   <ul>
					   <li>
						   <a href="{{ route('pages')}}" class="ttr-material-button"><span class="ttr-label">Pages</span></a>
					   </li>
				   </ul>
			   </li>
			   <li>
				   <a href="{{ route('users') }}" class="ttr-material-button">
					   <span class="ttr-icon"><i class="ti-user"></i></span>
					   <span class="ttr-label">Users</span>
				   </a>
			   </li>
			   <li>
				<a href="{{ route('schools.admin') }}" class="ttr-material-button">
					<span class="ttr-icon"><i class="ti-folder"></i></span>
					<span class="ttr-label">Schools</span>
				</a>
				<li>
					<a href="{{ route('teachers.admin') }}" class="ttr-material-button">
						<span class="ttr-icon"><i class="ti-folder"></i></span>
						<span class="ttr-label">Teachers</span>
					</a>
				</li>
				<li>
					<a href="{{ route('messages') }}" class="ttr-material-button">
						<span class="ttr-icon"><i class="ti-email"></i></span>
						<span class="ttr-label">Messages</span>
					</a>
				</li>
				<li>
					<a href="{{ route('support.admin') }}" class="ttr-material-button">
						<span class="ttr-icon"><i class="ti-settings"></i></span>
						<span class="ttr-label">Feedbacks or Support</span>
					</a>
				</li>
			</li>
				@endif

					<li>
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->
