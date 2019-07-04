
<!DOCTYPE html>
@php  $lang = LaravelLocalization::getCurrentLocale();  @endphp



<html lang="{{ $lang }}" dir="{{ $lang == 'ar' ? 'rtl':'ltr' }}">




@include('partials.header')

{{--
 @yield('content')
 @include('partials.nav')
 @include('partials.sidbar')
 @include('partials.footer')
  --}}




  <body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img style="width:55px;height:30px" alt="Logo" src="{{asset('assets/logoapp.png')}}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
                <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                
                @include('partials.sidbar')
				

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							
						</div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							



							<!--begin: Language bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--langs">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<i class="fa fa-language"></i>
									</span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
									<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">

										@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
														<li class="kt-nav__item">
															<a class="kt-nav__link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
																{{ $properties['native'] }}
															</a>
														</li>
													@endforeach

									</ul>








							
							
							





								</div>
							</div>

							<!--end: Language bar -->

							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-username kt-hidden-mobile">{{auth()->user()->name}}</span>
										<img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
												<img src="{{asset(auth()->user()->imge)}}" alt="..." class="img-circle profile_img">
										</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(../assets/media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" />

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
													<img src="{{asset(auth()->user()->imge)}}" alt="..." class="img-circle profile_img">
											</span>
										</div>
										<div class="kt-user-card__name">
												{{auth()->user()->name}}
										</div>
										
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										
										<div class="kt-notification__custom">
											{{-- <a href="{{ route('logout') }}" target="_blank" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a> --}}

											<a data-toggle="tooltip" class="btn btn-label-brand btn-sm btn-bold" data-placement="top" title="" href="{{ route('logout') }}"     onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
												{{trans('backend.logout')}}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
					

						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                                @yield('content')
                        
                        </div>

						<!-- end:: Content -->
					</div>

				
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Panel -->


		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->



		<!-- begin::Demo Panel -->



        @include('partials.footer')

	</body>
</html>
