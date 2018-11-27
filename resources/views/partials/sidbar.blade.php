<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>
                    @if(app()->getLocale()=='ar' )

                        لوحه تحكم العمالقه
                        @else
                    Admin panel
                        @endif
                </span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset(auth()->user()->imge)}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{auth()->user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{trans('backend.admin_panel')}}</h3>
                <ul class="nav side-menu">
                   @can('admin-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.admins')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.index')}}">{{trans('backend.admins')}} </a></li>
                            @can('admin-create')

                            <li><a href="{{route('admin.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                    @endcan
                       @can('role-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.role')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('roles.index')}}">{{trans('backend.role')}} </a></li>
                            @can('role-create')

                            <li><a href="{{route('roles.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan

                       @can('user-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.users')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('user.index')}}">{{trans('backend.users')}} </a></li>

                        </ul>
                    </li>
                       @endcan

                       @can('goal-list')

                       <li><a><i class="fa fa-edit"></i> {{trans('backend.goals')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('goal.index')}}">{{trans('backend.goals')}} </a></li>
                            @can('goal-create')

                            <li><a href="{{route('goal.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('bodypart-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.bodys')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('body.index')}}">{{trans('backend.bodys')}} </a></li>
                            @can('bodypart-create')

                            <li><a href="{{route('body.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('equipment-list')

                       <li><a><i class="fa fa-edit"></i> {{trans('backend.equipment')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('equipment.index')}}">{{trans('backend.equipment')}} </a></li>
                            @can('equipment-create')

                            <li><a href="{{route('equipment.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('level-list')

                       <li><a><i class="fa fa-edit"></i> {{trans('backend.levels')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('level.index')}}">{{trans('backend.levels')}} </a></li>
                            @can('level-create')

                            <li><a href="{{route('level.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('exercise-list')

                       <li><a><i class="fa fa-edit"></i> {{trans('backend.exercises')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('exercises.index')}}">{{trans('backend.exercises')}} </a></li>
                            @can('exercise-create')

                            <li><a href="{{route('exercises.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('workout-list')

                       <li><a><i class="fa fa-edit"></i> {{trans('backend.workouts')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('workout.index')}}">{{trans('backend.workouts')}} </a></li>
                            @can('workout-create')

                            <li><a href="{{route('workout.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan


                        </ul>
                    </li>
                       @endcan
                       @can('category-list')

                       <li><a><i class="fa fa-edit"></i> {{trans('backend.category')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('cat.index')}}">{{trans('backend.category')}} </a></li>
                            @can('category-create')

                            <li><a href="{{route('cat.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('recipe-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.dites')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('dites.index')}}">{{trans('backend.dites')}} </a></li>
                            @can('recipe-create')

                            <li><a href="{{route('dites.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('tag-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.tag')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('tag.index')}}">{{trans('backend.tag')}} </a></li>
                            @can('tag-create')

                            <li><a href="{{route('tag.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan

                       @can('post-list')

                    <li><a><i class="fa fa-edit"></i> {{trans('backend.post')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('post.index')}}">{{trans('backend.post')}} </a></li>
                            @can('post-create')

                            <li><a href="{{route('post.create')}}">{{trans('backend.create')}} </a></li>
                            @endcan

                        </ul>
                    </li>
                       @endcan
                       @can('slider-list')

                    <li><a href="{{route('silder_all')}}"><i class="fa fa-laptop"></i>  {{trans('backend.slider')}}
                                    </a></li>
                       @endcan

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="خروج" href="{{ route('logout') }}"     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
