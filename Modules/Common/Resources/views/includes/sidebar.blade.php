@php
    $route = Route::current()->getName();
    $currenturl = url()->full();
    $url = parse_url($currenturl, PHP_URL_SCHEME) . '://' . parse_url($currenturl, PHP_URL_HOST) . ':' . parse_url($currenturl, PHP_URL_PORT);
    // echo $currenturl;
    // dd($currenturl);
@endphp
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="../../../html/rtl/vertical-menu-template/index.html">
                    <span class="brand-logo">
                        {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path"
                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                            style="fill:currentColor"></path>
                                        <path id="Path1"
                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                            fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                        </polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                        </polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg> --}}
                        <div style="width: 5%">
                            <img class="img-fluid" src="{{ asset('') }}admin/images/pages/reading.png"
                                alt="Login V4" />
                        </div>
                    </span>
                    <h2 class="brand-text">حاضر</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.dashboard') }}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="eCommerce">الرئيسية</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>
            @can('Index-country')
                <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                            data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice"> المناطق
                            والادارات</span></a>

                    <ul class="menu-content">

                        <li class="nav-item {{ $currenturl == $url . '/admin/cities' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/cities') }}"><i
                                    data-feather="user-check"></i><span class="menu-title text-truncate"
                                    data-i18n="Email">المناطق</span></a>
                        </li>
                        <li class="nav-item {{ $currenturl == $url . '/admin/areas' ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ url('admin/areas/') }}"><i
                                    data-feather="user-check"></i><span class="menu-title text-truncate" data-i18n="Email">
                                    الادارات</span></a>
                        </li>

                    </ul>

                </li>
            @endcan
            {{-- @can('Index-country') --}}
            <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice"> اولياء
                        الامور</span></a>

                <ul class="menu-content">

                    <li class="nav-item {{ $route == 'parents.index' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ url('admin/parents') }}"><i
                                data-feather="user-check"></i><span class="menu-title text-truncate"
                                data-i18n="Email">اولياء الامور</span></a>
                    </li>
                    <li class="nav-item {{ $route == 'students.index' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('admin/students/') }}"><i
                                data-feather="user-check"></i><span class="menu-title text-truncate" data-i18n="Email">
                                الطلاب</span></a>
                    </li>

                </ul>

            </li>
            {{-- @endcan --}}
            @can('Index-school')
                <li class="nav-item {{ $route == 'schools.index' ? 'active' : '' }}"><a class="d-flex align-items-center"
                        href="{{ url('admin/schools') }}"><i data-feather='file-text'></i><span
                            class="menu-title text-truncate" data-i18n="Email">المؤسسات التعليمية</span></a>
                </li>
            @endcan

            @if (auth()->user()->can('Index-subject'))
                <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                            data-feather="file-text"></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">بيانات اساسية</span></a>
                    <ul class="menu-content">
                        @can('Index-subject')
                            <li class="nav-item {{ $route == 'subjects.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/subjects') }}"><i
                                        data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                        data-i18n="Email">المواد الدراسية</span></a>
                            </li>
                        @endcan

                        @can('Index-teacher_levels')
                            <li class="nav-item {{ $route == 'teacher_levels.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/teacher_levels') }}"><i
                                        data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                        data-i18n="Email"> المستوي /الرتبة</span></a>
                            </li>
                        @endcan

                        @can('Index-holiday')
                            <li class="nav-item {{ $route == 'holiday_types.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/holiday_types') }}"><i
                                        data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                        data-i18n="Email"> انواع الاجازات</span></a>
                            </li>
                        @endcan

                        @can('Index-violation')
                            <li class="nav-item {{ $route == 'violations.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/violations') }}"><i
                                        data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                        data-i18n="Email"> انواع المخالفات</span></a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endif

            @if (auth()->user()->can('Index-admin') ||
                    auth()->user()->can('Index-branch') ||
                    auth()->user()->can('Index-driver') ||
                    auth()->user()->can('Index-role') ||
                    auth()->user()->can('Index-employee') ||
                    auth()->user()->can('Index-client'))
                <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                            data-feather="file-text"></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">ادارة العضويات</span></a>
                    <ul class="menu-content">
                        @can('Index-admin')
                            <li class="nav-item {{ $route == 'admins.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/admins') }}"><i
                                        data-feather="user-check"></i><span class="menu-title text-truncate"
                                        data-i18n="Email">المديرين</span></a>
                            </li>
                        @endcan
                        @can('Index-branch')
                            <li class="nav-item {{ $route == 'branches.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/branches') }}"><i
                                        data-feather='users'></i><span class="menu-title text-truncate"
                                        data-i18n="Email">الفروع</span></a>
                            </li>
                        @endcan
                        @can('Index-driver')
                            <li class="nav-item {{ $route == 'drivers.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/drivers') }}"><i
                                        data-feather="user-check"></i><span class="menu-title text-truncate"
                                        data-i18n="Email">السائقين</span></a>
                            </li>
                        @endcan
                        @can('Index-role')
                            <li class="nav-item {{ $route == 'roles.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/roles') }}"><i
                                        data-feather='shield'></i><span class="menu-title text-truncate"
                                        data-i18n="Email">الوظائف</span></a>
                            </li>
                        @endcan

                        @can('Index-employee')
                            {{-- <li class="nav-item {{ $route == 'employees.index' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ url('admin/employees') }}"><i
                                        data-feather='users'></i><span class="menu-title text-truncate"
                                        data-i18n="Email">الموظفين</span></a>
                            </li> --}}
                            <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                                        data-feather="file-text"></i><span class="menu-title text-truncate"
                                        data-i18n="Invoice"> الموظفين</span></a>

                                <ul class="menu-content">

                                    <li class="nav-item {{ $currenturl == $url . '/admin/employees' ? 'active' : '' }}"><a
                                            class="d-flex align-items-center" href="{{ url('admin/employees') }}"><i
                                                data-feather="user-check"></i><span class="menu-title text-truncate"
                                                data-i18n="Email">الكل</span></a>
                                    </li>
                                    <li
                                        class="nav-item {{ $currenturl == $url . '/admin/employees?type=teacher' ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="{{ url('admin/employees?type=teacher') }}"><i
                                                data-feather="user-check"></i><span class="menu-title text-truncate"
                                                data-i18n="Email">المعلم</span></a>
                                    </li>

                                    <li
                                        class="nav-item {{ $currenturl == $url . '/admin/employees?type=administrative' ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="{{ url('admin/employees?type=administrative') }}"><i
                                                data-feather='users'></i><span class="menu-title text-truncate"
                                                data-i18n="Email">الاداري</span></a>
                                    </li>
                                </ul>

                            </li>
                        @endcan


                    </ul>
                </li>
            @endif

            {{-- delay section --}}
            <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">
                        سجل الموظفين</span></a>
                <ul class="menu-content">
                    @can('Index-delay_request')
                        <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                                    data-feather="file-text"></i><span class="menu-title text-truncate"
                                    data-i18n="Invoice"> طلبات التأخير</span></a>

                            <ul class="menu-content">

                                <li class="nav-item {{ $currenturl == $url . '/admin/delay' ? 'active' : '' }}"><a
                                        class="d-flex align-items-center" href="{{ url('admin/delay') }}"><i
                                            data-feather="user-check"></i><span class="menu-title text-truncate"
                                            data-i18n="Email">الكل</span></a>
                                </li>
                                <li class="nav-item {{ $currenturl == $url . '/admin/delayHours' ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ url('admin/delayHours/') }}"><i
                                            data-feather="user-check"></i><span class="menu-title text-truncate"
                                            data-i18n="Email"> قرار حسم تأخير</span></a>
                                </li>

                            </ul>

                        </li>
                    @endcan
                    @can('Index-absence_request')
                        <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                                    data-feather="file-text"></i><span class="menu-title text-truncate"
                                    data-i18n="Invoice"> طلبات الغياب</span></a>

                            <ul class="menu-content">

                                <li class="nav-item {{ $currenturl == $url . '/admin/absence' ? 'active' : '' }}"><a
                                        class="d-flex align-items-center" href="{{ url('admin/absence') }}"><i
                                            data-feather="user-check"></i><span class="menu-title text-truncate"
                                            data-i18n="Email">الكل</span></a>
                                </li>
                                <li class="nav-item {{ $currenturl == $url . '/admin/absenceDecision' ? 'active' : '' }}">
                                    <a class="d-flex align-items-center" href="{{ url('admin/absenceDecision/') }}"><i
                                            data-feather="user-check"></i><span class="menu-title text-truncate"
                                            data-i18n="Email"> قرار حسم غياب</span></a>
                                </li>

                            </ul>

                        </li>
                    @endcan
                    @can('Index-leave_request')
                        <li class="nav-item {{ $route == 'leaves.index' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/leaves') }}"><i
                                    data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                    data-i18n="Email"> طلبات المغادرة</span></a>
                        </li>
                    @endcan
                    @can('Index-holiday_request')
                        <li class="nav-item {{ $route == 'holiday.index' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/holiday') }}"><i
                                    data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                    data-i18n="Email"> طلبات الاجازه</span></a>
                        </li>
                    @endcan
                    @can('Index-supervisor_notes')
                        <li class="nav-item {{ $route == 'supervisorNote.index' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/supervisorNote') }}"><i
                                    data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                    data-i18n="Email"> ملاحظات الاشراف </span></a>
                        </li>
                    @endcan
                    @can('Index-shift_notes')
                        <li class="nav-item {{ $route == 'shiftNote.index' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/shiftNote') }}"><i
                                    data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                                    data-i18n="Email"> ملاحظات المناوبة </span></a>
                        </li>
                    @endcan

                </ul>
            </li>

            @can('Index-vacation')
                <li class="nav-item {{ $route == 'vacation.index' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ url('admin/vacation') }}"><i
                            data-feather='file-text'></i><span class="menu-title text-truncate" data-i18n="Email">العطلات
                            و <br>الاجازات الرسميه </span></a>
                </li>
            @endcan

            @can('Index-news')
                <li class="nav-item {{ $route == 'news.index' ? 'active' : '' }}"><a class="d-flex align-items-center"
                        href="{{ url('admin/news') }}"><i data-feather='file-text'></i><span
                            class="menu-title text-truncate" data-i18n="Email">الاخبار</span></a>
                </li>
            @endcan

            <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">ادارة
                        الاشعارات</span></a>
                <ul class="menu-content">

                    @can('Index-notification')
                        <li class="nav-item {{ $route == 'notifications.index' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/notifications') }}"><i
                                    data-feather='users'></i><span class="menu-title text-truncate"
                                    data-i18n="Email">الاشعارات</span></a>
                        </li>
                    @endcan
                    @can('Create-notification')
                        <li class="nav-item {{ $route == 'notifications.create' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ url('admin/notifications/create') }}"><i
                                    data-feather='users'></i><span class="menu-title text-truncate"
                                    data-i18n="Email">ارسال
                                    اشعار</span></a>
                        </li>
                    @endcan
                </ul>
            </li>

            @can('Index-setting')
                <li class="nav-item {{ $route == 'setting.index' ? 'active' : '' }}"><a class="d-flex align-items-center"
                        href="{{ url('admin/setting') }}"><i data-feather='settings'></i><span
                            class="menu-title text-truncate" data-i18n="Email">الاعدادات</span></a>
                </li>
            @endcan

            @can('Index-setting')
                <li class="nav-item {{ $route == 'qrcode.index' ? 'active' : '' }}"><a class="d-flex align-items-center"
                        href="{{ url('admin/qrcode') }}"><i data-feather='settings'></i><span
                            class="menu-title text-truncate" data-i18n="Email">الرمز التعريفي للحضور</span></a>
                </li>
            @endcan
        </ul>

    </div>
</div>
<!-- END: Main Menu-->
