<div class="vertical-menu">

                <div data-simplebar="init" class="h-100"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                    <div id="sidebar-menu" class="mm-active">
                        <ul class="metismenu list-unstyled mm-show" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            @can('dashboard.index')
                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>
                            @endcan
                            @can('request.module')
                            <li>
                                <a class="has-arrow waves-effect">
                                    <!--key icon in i tag-->
                                    <i class="bx bx-git-pull-request"></i>
                                    <span key="t-ecommerce">Request</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('request.list')
                                    <li><a href="{{ route('requests.index') }}" key="t-products">Request List</a></li>
                                    @endcan
                                    @can('request.create')
                                    <li><a href="{{ route('requests.create') }}" key="t-product-detail">Create Request</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            @can('schedule.module')
                            <li>
                                <a  class="has-arrow waves-effect">
                                    <i class="bx bx-calendar"></i>
                                    <span key="t-ecommerce">Schedules</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('schedule.list')
                                    <li><a href="{{ route('schedules.index') }}" key="t-products">Schedule List</a></li>
                                    @endcan
                                    @can('schedule.create')
                                    <li><a href="{{ route('schedules.create') }}" key="t-product-detail">Create Schedule</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            @can('activity.module')
                            <li>
                                <a  class="has-arrow waves-effect">
                                    <i class="bx bx-collection"></i>
                                    <span key="t-tasks">Activities</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('activity.list')
                                    <li><a href="{{ route('activities-types.index') }}" key="t-task-list">Activity List</a></li>
                                    @endcan
                                    @can('activity.create')
                                    <li><a href="{{ route('activities-types.create') }}" key="t-create-task">Create Activity</a></li>
                                    @endcan
                                    @can('club_activity.module')
                                    <li>
                                        <a  class="has-arrow" key="t-level-1-2">Club Activity</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('club_activity.list')
                                            <li><a href="{{ route('clubs-activities.index') }}" key="t-level-2-1">Club Activity List</a></li>
                                            @endcan
                                            @can('club_activity.create')
                                            <li><a href="{{ route('clubs-activities.create') }}" key="t-level-2-2">Create Club Activity</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan


                                </ul>
                            </li>
                            @endcan

                            @can('club.module')
                            <li>
                                <a  class="has-arrow waves-effect">
                                    <i class="bx bx-certification"></i>
                                    <span>Clubs</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('club.list')
                                    <li><a href="{{ route('clubs.index') }}" >Clubs List</a></li>
                                    @endcan
                                    @can('club.create')
                                    <li><a href="{{ route('clubs.create') }}" >Create Club</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            @can('school.module')
                            <li>
                                <a  class="has-arrow waves-effect">
                                    <i class="bx bx-building"></i>
                                    <span key="t-tasks">Schools</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('school.list')
                                    <li><a href="{{ route('schools.index') }}" key="t-task-list">School List</a></li>
                                    @endcan
                                    @can('school.create')
                                    <li><a href="{{ route('schools.create') }}" key="t-create-task">Create School</a></li>
                                    @endcan

                                    @can('school_club.module')
                                    <li>
                                        <a class="has-arrow" key="t-level-1-2">School Club</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('school_club.list')
                                            <li><a href="{{ route('school-clubs.index') }}" key="t-level-2-1">School Club List</a></li>
                                            @endcan
                                            <!-- @can('school_club.create')
                                            <li><a href="{{ route('school-clubs.create') }}" key="t-level-2-2">Create School Club</a></li>
                                            @endcan -->
                                        </ul>
                                    </li>
                                    @endcan

                                    @can('school_club_activity.module')
                                    <li>
                                        <a  class="has-arrow" key="t-level-1-2">School Club Activity </a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('school_club_activity.list')
                                            <li><a href="{{ route('school-club-activities.index') }}" key="t-level-2-1">School Club Activity List</a></li>
                                            @endcan
                                            @can('school_club_activity.create')
                                            <li><a href="{{ route('school-club-activities.create') }}" key="t-level-2-2">Create School Club Activity</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan

                                </ul>
                            </li>
                            @endcan



                            @can('availability.module')
                            <li>
                                <a class="has-arrow waves-effect">
                                    <i class="bx bx-task"></i>
                                    <span key="t-tasks">Availability</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('availability.list')
                                    <li><a href="{{ route('availabilities.index') }}" key="t-task-list">Availability List</a></li>
                                    @endcan
                                    @can('availability.create')
                                    <li><a href="{{ route('availabilities.create') }}" key="t-create-task">Create Availability</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            @can('resource.module')
                            <li>
                                <a class="has-arrow waves-effect">
                                    <!--book icon-->
                                    <i class="bx bx-book"></i>
                                    <span key="t-tasks">Resources</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('resource.list')
                                    <li><a href="{{ route('resources.index') }}" key="t-task-list">Resource List</a></li>
                                    @endcan
                                    @can('resource.create')
                                    <li><a href="{{ route('resources.create') }}" key="t-create-task">Create Resource</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            <!-- @can('user.module')
                            <li class="">
                                <a  class="has-arrow waves-effect mm-active" aria-expanded="false">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-contacts">Users</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                                    @can('user.list')
                                    <li><a href="{{ route('users.index') }}" key="t-user-list">User List</a></li>
                                    @endcan
                                    @can('user.create')
                                    <li class="mm-active"><a href="{{ route('users.create') }}" key="t-user-list" class="active">Create User</a></li>
                                    @endcan
                                    @can('mentor.module')
                                    <li>
                                        <a  class="has-arrow" key="t-level-1-2">Mentor</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('mentor.list')
                                            <li><a href="{{ route('mentors.index') }}" key="t-level-2-1">Mentor List</a></li>
                                            @endcan
                                            @can('mentor.create')
                                            <li><a href="{{ route('mentors.create') }}" key="t-level-2-2">Create Mentor</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan
                                    @can('coordinator.module')
                                    <li>
                                        <a class="has-arrow" key="t-level-1-2">Coordinator</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('coordinator.list')
                                            <li><a href="{{ route('coordinators.index') }}" key="t-level-2-1">Coordinator List</a></li>
                                            @endcan
                                            @can('coordinator.create')
                                            <li><a href="{{ route('coordinators.create') }}" key="t-level-2-2">Create Coordinator</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan

                                    @can('matron.module')
                                    <li>
                                        <a  class="has-arrow" key="t-level-1-2">Matron</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('matron.list')
                                            <li><a href="{{ route('matrons.index') }}" key="t-level-2-1">Matron List</a></li>
                                            @endcan
                                            @can('matron.create')
                                            <li><a href="{{ route('matrons.create') }}" key="t-level-2-2">Create Matron</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan                                  
                                </ul>
                            </li>
                            @endcan -->
                            @can('user.module')
                            <li>
                                <a  class="has-arrow waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-tasks">Users</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('user.list')
                                    <li><a href="{{ route('users.index') }}" key="t-task-list">User List</a></li>
                                    @endcan
                                    @can('user.create')
                                    <li><a href="{{ route('users.create') }}" key="t-create-task">Create User</a></li>
                                    @endcan

                                    @can('mentor.module')
                                    <li>
                                        <a class="has-arrow" key="t-level-1-2">Mentors</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('mentor.list')
                                            <li><a href="{{ route('mentors.index') }}" key="t-level-2-1">Mentor List</a></li>
                                            @endcan
                                            @can('mentor.create')
                                            <li><a href="{{ route('mentors.create') }}" key="t-level-2-2">Create Mentor</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan

                                    @can('matron.module')
                                    <li>
                                        <a  class="has-arrow" key="t-level-1-2">Matrons</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('matron.list')
                                            <li><a href="{{ route('matrons.index') }}" key="t-level-2-1">Matron List</a></li>
                                            @endcan
                                            @can('matron.create')
                                            <li><a href="{{ route('matrons.create') }}" key="t-level-2-2">Create Matron</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan

                                    @can('coordinator.module')
                                    <li>
                                        <a  class="has-arrow" key="t-level-1-2">Coordinators </a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            @can('coordinator.list')
                                            <li><a href="{{ route('coordinators.index') }}" key="t-level-2-1">Coordinator List</a></li>
                                            @endcan
                                            @can('coordinator.create')
                                            <li><a href="{{ route('coordinators.create') }}" key="t-level-2-2">Create Coordinator</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan

                                </ul>
                            </li>
                            @endcan
                         
                            @can('report.module')
                            <li>
                                <a  class="has-arrow waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-tasks">Reports</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    <!--Session report, Availability report, School report, Activity report, Schedule report-->
                                    @can('report.session')
                                    <li><a href="{{ route('reports.sessions') }}" key="t-task-list">Session Report</a></li>
                                    @endcan
                                    @can('report.availability')
                                    <li><a href="{{ route('reports.availability') }}" key="t-create-task">Availability Report</a></li>
                                    @endcan
                                    @can('report.school')
                                    <li><a href="{{ route('reports.school') }}" key="t-create-task">School Report</a></li>
                                    @endcan
                                    @can('report.activity')
                                    <li><a href="{{ route('reports.activity') }}" key="t-create-task">Activity Report</a></li>
                                    @endcan
                                    @can('report.schedule')
                                    <li><a href="{{ route('reports.schedule') }}" key="t-create-task">Schedule Report</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            @can('role.module')
                            <li>
                                <a class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-contacts">Roles & Permissions</span>
                                </a>

                                <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a  class="has-arrow"  key="t-user-list">Roles</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            <!-- @can('role.list') -->
                                            <li><a href="{{ route('roles.index') }}" key="t-user-list">Role List</a></li>
                                            <!-- @endcan
                                            @can('role.create') -->
                                            <li><a href="{{ route('roles.create') }}" key="t-user-list">Create Role</a></li>
                                            <!-- @endcan -->
                                        </ul>
                                    </li>
                                    @can('permission.module')
                                    <li>
                                        <a  class="has-arrow"  key="t-user-list">Permissions</a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                            <!-- @can('role.list') -->
                                            <li><a href="{{ route('permissions.index') }}" key="t-user-list">Permission List</a></li>
                                            <!-- @endcan
                                            @can('role.create') -->
                                            <li><a href="{{ route('permissions.create') }}" key="t-user-list">Create Permission</a></li>
                                            <!-- @endcan -->
                                        </ul>
                                    </li>
                                    @endcan
 
                                </ul>
                                
                            </li>
                            @endcan

                            @can('location.module')
                            <li>
                                <a class="has-arrow waves-effect">
                                    <i class="bx bx-share-alt"></i>
                                    <span key="t-multi-level">Location
                                </span></a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    @can('location.list')
                                    <li><a href="{{ route('locations.index') }}" key="t-user-list">Location List</a></li>
                                    @endcan
                                    <!-- @can('location.create')
                                    <li><a href="{{ route('locations.create') }}" key="t-user-list">Create Location</a></li>
                                    @endcan -->
                                </ul>
                            </li>
                            @endcan

                        </ul>
                    </div>
                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 576px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 125px; transform: translate3d(0px, 7px, 0px); display: block;"></div></div></div>
            </div>