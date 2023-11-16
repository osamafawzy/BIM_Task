@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css-rtl/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
@endsection

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <!-- Medal Card -->
            {{-- <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>اهلا بك {{ auth()->user()->name }}🎉!</h5>
                        <p class="card-text font-small-3"> اهلا بك ف نظام ادارة المدارس</p>

                        <img src="{{ asset('') }}admin/images/illustration/badge.svg" class="congratulation-medal"
                            alt="Medal Pic" />
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{ asset('') }}admin/images/elements/decore-left.png" class="congratulations-img-left"
                            alt="card-img-left" />
                        <img src="{{ asset('') }}admin/images/elements/decore-right.png"
                            class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">اهلا بـك، {{ auth()->user()->name }} 🎉!</h1>
                            <p class="card-text m-auto w-75">

                                    اهلا بك في نظام ادارة المدارس
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{ asset('') }}admin/images/illustration/email.svg" alt="Meeting Pic"
                            height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">
                                <h6 class="mb-0">
                                    @php
                                        $date = strtotime(date('Y-m-d'));
                                        $dayName= date('l', $date);
                                    @endphp
                                    {{ arabicDayName()[$dayName] }}

                                </h6>
                                <h3 class="mb-0">
                                    @php
                                        $date = strtotime(date('Y-m-d'));
                                        echo date('d', $date);
                                    @endphp
                                </h3>
                            </div>
                            <div class="my-auto">
                                <h4 class="card-title mb-25">اهلا بك في لوحة التحكم 🎉!</h4>
                                <p class="card-text mb-0">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        {{-- <div class="mt-0">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Sat, May 25, 2020</h6>
                                <small>10:AM to 6:PM</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Central Park</h6>
                                <small>Manhattan, New york City</small>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">الاحصائيات</h4>
                        <div class="d-flex align-items-center">
                            {{-- <p class="card-text font-small-2 me-25 mb-0"> المقبولة اليوم</p> --}}
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $attendance }}</h4>
                                        <p class="card-text font-small-3 mb-0">الحاضرين اليوم</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $absenceEmployess }}</h4>
                                        <p class="card-text font-small-3 mb-0">الغائبين اليوم</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-warning me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user-check" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $teacher }}</h4>
                                        <p class="card-text font-small-3 mb-0">المعلمين المفعلين</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user-check" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $administrative }}</h4>
                                        <p class="card-text font-small-3 mb-0">الادارين المفعلين</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>
        @if (auth()->user()->school_id == null)
            <div class="row match-height">
                <div class="col-xl-12  col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">مؤسسات التعليمية</h4>
                            <div class="d-flex align-items-center">
                                {{-- <p class="card-text font-small-2 me-25 mb-0"> المقبولة اليوم</p> --}}
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-primary me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user-check" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $administrativeActive }}</h4>
                                            <p class="card-text font-small-3 mb-0"> الادارات المفعلة</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $administrativeNoteActive }}</h4>
                                            <p class="card-text font-small-3 mb-0"> الادارات الغير مفعلة</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-warning me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user-check" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $officeActive }}</h4>
                                            <p class="card-text font-small-3 mb-0"> المكاتب المفعلة</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $officeNoteActive }}</h4>
                                            <p class="card-text font-small-3 mb-0">المكاتب الغير مفعلة </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0 mt-2">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-success me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user-check" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $schoolsActive }}</h4>
                                            <p class="card-text font-small-3 mb-0"> المدارس المفعلة</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12  mt-sm-2">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $schoolsNotActive }}</h4>
                                            <p class="card-text font-small-3 mb-0">المدارس الغير مفعلة </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row match-height">
            <!-- Bar Chart - Absence -->
            {{-- <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>Absence</h6>
                                <h2 class="fw-bolder mb-1">2,76k</h2>
                                <div id="statistics-order-chart"></div>
                            </div>
                        </div>
                    </div> --}}
            <!--/ Bar Chart - Absence -->

            <!-- Line Chart - Profit -->
            {{-- <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Profit</h6>
                                <h2 class="fw-bolder mb-1">6,24k</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div> --}}
            <!--/ Line Chart - Profit -->

            <!-- Earnings Card -->
            {{-- <div class="col-lg-12 col-md-6 col-12">
                        <div class="card earnings-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title mb-1">Earnings</h4>
                                        <div class="font-small-2">This Month</div>
                                        <h5 class="mb-1">$4055.56</h5>
                                        <p class="card-text text-muted font-small-2">
                                            <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <div id="earnings-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            <!--/ Earnings Card -->
            {{-- </div>
            </div> --}}

            <!-- Revenue Report Card -->
            {{-- <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center me-2">
                                        <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                        <span>Earning</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-75">
                                        <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                        <span>Expense</span>
                                    </div>
                                </div>
                            </div>
                            <div id="revenue-report-chart"></div>
                        </div>
                        <div class="col-md-4 col-12 budget-wrapper">
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    2020
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">2020</a>
                                    <a class="dropdown-item" href="#">2019</a>
                                    <a class="dropdown-item" href="#">2018</a>
                                </div>
                            </div>
                            <h2 class="mb-25">$25,852</h2>
                            <div class="d-flex justify-content-center">
                                <span class="fw-bolder me-25">Budget:</span>
                                <span>56,800</span>
                            </div>
                            <div id="budget-chart"></div>
                            <button type="button" class="btn btn-primary">Increase Budget</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--/ Revenue Report Card -->
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div
                        class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                        <div class="header-left">
                            <h4 class="card-title">طلبات الغياب</h4>
                        </div>
                        <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                            <i data-feather="calendar"></i>
                            {{-- <p>اخر {{ $lastDaysCount }} يوم</p> --}}
                            <input onchange="getData()" id="date_from_to" type="text"
                                class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                    <div class="card-body" id="absence-chart">
                        <canvas class="bar-chart-ex chartjs" data-height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div
                        class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                        <div class="header-left">
                            <h4 class="card-title">طلبات التأخير</h4>
                        </div>
                        <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                            <i data-feather="calendar"></i>
                            <input onchange="getData2()" id="date2_from_to" type="text"
                                class="form-control flat-picker2 border-0 shadow-none bg-transparent pe-0"
                                placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="bar-chart-ex2 chartjs2" data-height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <div class="row match-height">
            <!-- Company Table Card -->
            {{-- <div class="col-lg-8 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Views</th>
                                        <th>Revenue</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/toolbox.svg"
                                                            alt="Toolbar svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Dixons</div>
                                                    <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Technology</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">23.4k</span>
                                                <span class="font-small-2 text-muted">in 24 hours</span>
                                            </div>
                                        </td>
                                        <td>$891.2</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">68%</span>
                                                <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/parachute.svg"
                                                            alt="Parachute svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Motels</div>
                                                    <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-success me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Grocery</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">78k</span>
                                                <span class="font-small-2 text-muted">in 2 days</span>
                                            </div>
                                        </td>
                                        <td>$668.51</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">97%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/brush.svg"
                                                            alt="Brush svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Zipcar</div>
                                                    <div class="font-small-2 text-muted">davcilse@is.gov</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">162</span>
                                                <span class="font-small-2 text-muted">in 5 days</span>
                                            </div>
                                        </td>
                                        <td>$522.29</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">62%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/star.svg"
                                                            alt="Star svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Owning</div>
                                                    <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Technology</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">214</span>
                                                <span class="font-small-2 text-muted">in 24 hours</span>
                                            </div>
                                        </td>
                                        <td>$291.01</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">88%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/book.svg"
                                                            alt="Book svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Cafés</div>
                                                    <div class="font-small-2 text-muted">pudais@jife.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-success me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Grocery</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">208</span>
                                                <span class="font-small-2 text-muted">in 1 week</span>
                                            </div>
                                        </td>
                                        <td>$783.93</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">16%</span>
                                                <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/rocket.svg"
                                                            alt="Rocket svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Kmart</div>
                                                    <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">990</span>
                                                <span class="font-small-2 text-muted">in 1 month</span>
                                            </div>
                                        </td>
                                        <td>$780.05</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">78%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/speaker.svg"
                                                            alt="Speaker svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Payers</div>
                                                    <div class="font-small-2 text-muted">luk@izug.io</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">12.9k</span>
                                                <span class="font-small-2 text-muted">in 12 hours</span>
                                            </div>
                                        </td>
                                        <td>$531.49</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">42%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--/ Company Table Card -->

            <!-- Developer Meetup Card -->
            {{-- <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">
                                <h6 class="mb-0">THU</h6>
                                <h3 class="mb-0">24</h3>
                            </div>
                            <div class="my-auto">
                                <h4 class="card-title mb-25">Developer Meetup</h4>
                                <p class="card-text mb-0">Meet world popular developers</p>
                            </div>
                        </div>
                        <div class="mt-0">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Sat, May 25, 2020</h6>
                                <small>10:AM to 6:PM</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Central Park</h6>
                                <small>Manhattan, New york City</small>
                            </div>
                        </div>
                        <div class="avatar-group">
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Billy Hopkins" class="avatar pull-up">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Amy Carson" class="avatar pull-up">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Brandon Miles" class="avatar pull-up">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Daisy Weber" class="avatar pull-up">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Jenny Looper" class="avatar pull-up">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--/ Developer Meetup Card -->

            <!-- Browser States Card -->
            {{-- <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-browser-states">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Browser States</h4>
                            <p class="card-text font-small-2">Counter August 2020</p>
                        </div>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="../../../app-assets/images/icons/google-chrome.png" class="rounded me-1"
                                    height="30" alt="Google Chrome" />
                                <h6 class="align-self-center mb-0">Google Chrome</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">54.4%</div>
                                <div id="browser-state-chart-primary"></div>
                            </div>
                        </div>

                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="../../../app-assets/images/icons/mozila-firefox.png" class="rounded me-1"
                                    height="30" alt="Mozila Firefox" />
                                <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">6.1%</div>
                                <div id="browser-state-chart-warning"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="../../../app-assets/images/icons/apple-safari.png" class="rounded me-1"
                                    height="30" alt="Apple Safari" />
                                <h6 class="align-self-center mb-0">Apple Safari</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">14.6%</div>
                                <div id="browser-state-chart-secondary"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="../../../app-assets/images/icons/internet-explorer.png" class="rounded me-1"
                                    height="30" alt="Internet Explorer" />
                                <h6 class="align-self-center mb-0">Internet Explorer</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">4.2%</div>
                                <div id="browser-state-chart-info"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="../../../app-assets/images/icons/opera.png" class="rounded me-1" height="30"
                                    alt="Opera Mini" />
                                <h6 class="align-self-center mb-0">Opera Mini</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">8.4%</div>
                                <div id="browser-state-chart-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--/ Browser States Card -->

            <!-- Goal Overview Card -->
            {{-- <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">ملاحظات الاشراف المتأخره</h4>
                        <div class="dropdown chart-dropdown">
                            <h4>
                                @php
                                    echo date('Y-m-d');
                                @endphp
                            </h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">الكل</p>
                                <h3 class="fw-bolder mb-0">{{ $AllsupervisorNotes }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">المخالفة</p>
                                <h3 class="fw-bolder mb-0">{{ $AllsupervisorNotesOffend }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"> ملاحظات المناوبة المتأخره</h4>
                        <div class="dropdown chart-dropdown">
                            <h4>
                                @php
                                    echo date('Y-m-d');
                                @endphp
                            </h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart2" class="my-2"></div>
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">الكل</p>
                                <h3 class="fw-bolder mb-0">{{ $AllshiftNotes }}</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">المخالفة</p>
                                <h3 class="fw-bolder mb-0">{{ $AllshiftNotesOffend }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Donut Chart Starts -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> ملاحظات الاشراف </h4>
                        <div class="dropdown chart-dropdown">
                            <h4>
                                @php
                                    echo date('Y-m-d');
                                @endphp
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="doughnut-chart-ex chartjs" data-height="275"></canvas>
                        <div class="d-flex justify-content-between mt-3 mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                <span class="fw-bold ms-75 me-25">المتأخره</span>
                                {{-- <span>- 80%</span> --}}
                            </div>
                            <div>
                                <span>{{ $AllsupervisorNotesLatepecentage }}%</span>
                                {{-- <i data-feather="arrow-up" class="text-success"></i> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                <span class="fw-bold ms-75 me-25">المخالفة</span>
                                {{-- <span>- 10%</span> --}}
                            </div>
                            <div>
                                <span>{{ $AllsupervisorNotesOffendpecentage }}%</span>
                                {{-- <i data-feather="arrow-up" class="text-success"></i> --}}
                            </div>
                        </div>
                        {{-- <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i data-feather="tablet" class="font-medium-2 text-success"></i>
                                <span class="fw-bold ms-75 me-25">Tablet</span>
                                <span>- 10%</span>
                            </div>
                            <div>
                                <span>-5%</span>
                                <i data-feather="arrow-down" class="text-danger"></i>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> ملاحظات المناوبة </h4>
                        <div class="dropdown chart-dropdown">
                            <h4>
                                @php
                                    echo date('Y-m-d');
                                @endphp
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="doughnut-chart-ex2 chartjs" data-height="275"></canvas>
                        <div class="d-flex justify-content-between mt-3 mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                <span class="fw-bold ms-75 me-25">متأخرة</span>
                                {{-- <span>- 80%</span> --}}
                            </div>
                            <div>
                                <span>{{ $AllshiftNotesLatepecentage }}%</span>
                                {{-- <i data-feather="arrow-up" class="text-success"></i> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                <span class="fw-bold ms-75 me-25">المخالفة</span>
                                {{-- <span>- 10%</span> --}}
                            </div>
                            <div>
                                <span>{{ $AllshiftNotesOffendpecentage }}%</span>
                                {{-- <i data-feather="arrow-up" class="text-success"></i> --}}
                            </div>
                        </div>
                        {{-- <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i data-feather="tablet" class="font-medium-2 text-success"></i>
                                <span class="fw-bold ms-75 me-25">Tablet</span>
                                <span>- 10%</span>
                            </div>
                            <div>
                                <span>-5%</span>
                                <i data-feather="arrow-down" class="text-danger"></i>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Donut Chart Starts -->
            <!--/ Goal Overview Card -->

            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header mt-3">
                        <h4 class="card-title">طلبات الاجازة</h4>
                        <div class="dropdown chart-dropdown">
                            اخر {{ $lastDaysCount }} يوم
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-primary rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title ">الكل</h6>
                                    <small>طلب</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-info">{{ $allHoliday }}</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar  bg-light-success rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title ">المقبولة</h6>
                                    <small>طلب</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">{{ $acceptHoliday }}</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-warning rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">المرسلة</h6>
                                    <small>طلب</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-warning">{{ $sendHoliday }}</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-danger rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">مرفوضة</h6>
                                    <small>طلب</small>
                                </div>
                            </div>
                            <div class="fw-bolder  text-danger ">{{ $refusedHoliday }}</div>
                        </div>
                        {{-- <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-warning rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Mastercard</h6>
                                    <small>Ordered Food</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-danger">- $23</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-info rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Transfer</h6>
                                    <small>Refund</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">+ $98</div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--/ Transaction Card -->
        </div>
    </section>

    <!-- Dashboard Ecommerce ends -->
@endsection

@section('js')
    {{-- <script src="{{ asset('') }}admin/vendors/js/charts/dashboard-ecommerce.min.js"></script> --}}
    {{-- <script src="{{ asset('') }}admin/vendors/js/charts/chart-chartjs.js"></script> --}}
    <script src="{{ asset('') }}admin/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/charts/chart.min.js"></script>

    <script>
        $(window).on('load', function() {
            'use strict';
            console.log(111);
            initializeNotesChart()
            initializeAbsenceChart()
            initializeDelayChart()
        });

        function getData2() {
            const date2 = document.getElementById('date2_from_to').value;

            const from2 = date2.slice(0, 10);
            const to2 = date2.slice(14, 24);

            if (to2 !== null && to2 !== '') {
                initializeDelayChart(from2, to2);
            }
        }

        function initializeDelayChart(from2 = null, to2 = null) {
            var flatPicker2 = $('.flat-picker2'),
                chartWrapper2 = $(".chartjs2"),
                barChartEx2 = $(".bar-chart-ex2");
            var primaryColorShade = "#836AF9",
                yellowColor = "#ffe800",
                successColorShade = "#28dac6",
                warningColorShade = "#ffe802",
                warningLightColor = "#FDAC34",
                infoColorShade = "#299AFF",
                greyColor = "#4F5D70",
                blueColor = "#2c9aff",
                blueLightColor = "#84D0FF",
                greyLightColor = "#EDF1F4",
                tooltipShadow = "rgba(0, 0, 0, 0.25)",
                lineChartPrimary = "#666ee8",
                lineChartDanger = "#ff4961",
                labelColor = "#6e6b7b",
                grid_line_color = "rgba(200, 200, 200, 0.2)"; // RGBA color helps in dark layout
            // console.log(AllsupervisorNotesLatepecentage);
            if ($("html").hasClass("dark-layout")) {
                labelColor = "#b4b7bd";
            }

            // Wrap charts with div of height according to their data-height
            if (chartWrapper2.length) {
                chartWrapper2.each(function() {
                    $(this).wrap(
                        $(
                            '<div style="height:' +
                            this.getAttribute("data-height") +
                            'px"></div>'
                        )
                    );
                });
            }
            // Init flatpicker
            if (flatPicker2.length) {
                if (from2 == null && to2 == null) {
                    var now = new Date();
                    var dd = now.getDate();

                    var mm = now.getMonth() + 1;
                    var yyyy = now.getFullYear();

                    var from2 = yyyy + '-' + (mm - 1) + '-' + dd;
                    var to2 = yyyy + '-' + mm + '-' + dd;

                } else {
                    var from2 = from2;
                    var to2 = to2;
                }
                flatPicker2.each(function() {
                    $(this).flatpickr({
                        mode: 'range',
                        defaultDate: [from2, to2]
                    });
                });

                console.log(window.location.origin + '/admin/delayChart?from2=' + from2 + '&to2=' + to2);
            }
            $.ajax({
                url: window.location.origin + '/admin/delayChart?from2=' + from2 + '&to2=' + to2,
                success: function(response) {
                    // Area Chart


                    if (barChartEx2.length) {
                        var barChartExample = new Chart(barChartEx2, {
                            type: "bar",
                            options: {
                                elements: {
                                    rectangle: {
                                        borderWidth: 2,
                                        borderSkipped: "bottom",
                                    },
                                },
                                responsive: true,
                                maintainAspectRatio: false,
                                responsiveAnimationDuration: 500,
                                legend: {
                                    display: false,
                                },
                                tooltips: {
                                    // Updated default tooltip UI
                                    shadowOffsetX: 1,
                                    shadowOffsetY: 1,
                                    shadowBlur: 8,
                                    shadowColor: tooltipShadow,
                                    backgroundColor: window.colors.solid.white,
                                    titleFontColor: window.colors.solid.black,
                                    bodyFontColor: window.colors.solid.black,
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        gridLines: {
                                            display: true,
                                            color: grid_line_color,
                                            zeroLineColor: grid_line_color,
                                        },
                                        scaleLabel: {
                                            display: false,
                                        },
                                        ticks: {
                                            fontColor: labelColor,
                                        },
                                    }, ],
                                    yAxes: [{
                                        display: true,
                                        gridLines: {
                                            color: grid_line_color,
                                            zeroLineColor: grid_line_color,
                                        },
                                        ticks: {
                                            stepSize: 2,
                                            min: 1,
                                            fontColor: labelColor,
                                        },
                                    }, ],
                                },
                            },
                            data: {
                                labels: ["الكل", "المقبولة", "المرسلة", "المرفوضة"],
                                datasets: [{
                                    data: [response.total_all_delay_count, response
                                        .total_accept_delay_count, response
                                        .total_send_delay_count, response
                                        .total_refused_delay_count
                                    ],
                                    barThickness: 15,
                                    backgroundColor: successColorShade,
                                    borderColor: "transparent",
                                }, ],
                            },
                        });
                    }

                },
                error: function() {
                    console.log("error");
                }
            });
        }

        function getData() {
            const date = document.getElementById('date_from_to').value;
            const from = date.slice(0, 10);
            const to = date.slice(14, 24);

            if (to !== null && to !== '') {
                initializeAbsenceChart(from, to);
            }
        }

        function initializeAbsenceChart(from = null, to = null) {
            var flatPicker = $('.flat-picker'),
                chartWrapper = $(".chartjs"),
                barChartEx = $(".bar-chart-ex");

            var primaryColorShade = "#836AF9",
                yellowColor = "#ffe800",
                successColorShade = "#28dac6",
                warningColorShade = "#ffe802",
                warningLightColor = "#FDAC34",
                infoColorShade = "#299AFF",
                greyColor = "#4F5D70",
                blueColor = "#2c9aff",
                blueLightColor = "#84D0FF",
                greyLightColor = "#EDF1F4",
                tooltipShadow = "rgba(0, 0, 0, 0.25)",
                lineChartPrimary = "#666ee8",
                lineChartDanger = "#ff4961",
                labelColor = "#6e6b7b",
                grid_line_color = "rgba(200, 200, 200, 0.2)"; // RGBA color helps in dark layout
            // console.log(AllsupervisorNotesLatepecentage);
            if ($("html").hasClass("dark-layout")) {
                labelColor = "#b4b7bd";
            }

            // Wrap charts with div of height according to their data-height
            if (chartWrapper.length) {
                chartWrapper.each(function() {
                    $(this).wrap(
                        $(
                            '<div style="height:' +
                            this.getAttribute("data-height") +
                            'px"></div>'
                        )
                    );
                });
            }
            // Init flatpicker
            if (flatPicker.length) {
                if (from == null && to == null) {
                    var now = new Date();
                    var dd = now.getDate();

                    var mm = now.getMonth() + 1;
                    var yyyy = now.getFullYear();

                    var from = yyyy + '-' + (mm - 1) + '-' + dd;
                    var to = yyyy + '-' + mm + '-' + dd;

                } else {
                    var from = from;
                    var to = to;
                }
                flatPicker.each(function() {
                    $(this).flatpickr({
                        mode: 'range',
                        defaultDate: [from, to]
                    });
                });
                // console.log(from, to);
                // console.log(barChartEx);
                // console.log(window.location.origin+ '/admin/absenceChart?from=' + from + '&to=' + to);
            }
            $.ajax({
                url: window.location.origin + '/admin/absenceChart?from=' + from + '&to=' + to,
                success: function(response) {
                    // Area Chart
                    // console.log(response.absence);
                    // console.log(response.from);
                    // --------------------------------------------------------------------
                    // $('#line-area-chart').remove(); // this is my <div> element
                    // $('#client_chart').append('<div id="line-area-chart"></div>');
                    if (barChartEx.length) {
                        var barChartExample = new Chart(barChartEx, {
                            type: "bar",
                            options: {
                                elements: {
                                    rectangle: {
                                        borderWidth: 2,
                                        borderSkipped: "bottom",
                                    },
                                },
                                responsive: true,
                                maintainAspectRatio: false,
                                responsiveAnimationDuration: 500,
                                legend: {
                                    display: false,
                                },
                                tooltips: {
                                    // Updated default tooltip UI
                                    shadowOffsetX: 1,
                                    shadowOffsetY: 1,
                                    shadowBlur: 8,
                                    shadowColor: tooltipShadow,
                                    backgroundColor: window.colors.solid.white,
                                    titleFontColor: window.colors.solid.black,
                                    bodyFontColor: window.colors.solid.black,
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        gridLines: {
                                            display: true,
                                            color: grid_line_color,
                                            zeroLineColor: grid_line_color,
                                        },
                                        scaleLabel: {
                                            display: false,
                                        },
                                        ticks: {
                                            fontColor: labelColor,
                                        },
                                    }, ],
                                    yAxes: [{
                                        display: true,
                                        gridLines: {
                                            color: grid_line_color,
                                            zeroLineColor: grid_line_color,
                                        },
                                        ticks: {
                                            stepSize: 2,
                                            min: 1,
                                            fontColor: labelColor,
                                        },
                                    }, ],
                                },
                            },
                            data: {
                                labels: ["الكل", "المقبولة", "المرسلة", "المرفوضة"],
                                datasets: [{
                                    data: [response.total_all_absence_count, response
                                        .total_accept_absence_count, response
                                        .total_send_absence_count, response
                                        .total_refused_absence_count
                                    ],
                                    barThickness: 15,
                                    backgroundColor: successColorShade,
                                    borderColor: "transparent",
                                }, ],
                            },
                        });
                    }


                },
                error: function() {
                    console.log("error");
                }
            });
        }

        function initializeNotesChart() {
            var chartWrapper = $(".chartjs"),
                doughnutChartEx = $(".doughnut-chart-ex"),
                doughnutChartEx2 = $(".doughnut-chart-ex2");

            var primaryColorShade = "#836AF9",
                yellowColor = "#ffe800",
                successColorShade = "#28dac6",
                warningColorShade = "#ffe802",
                warningLightColor = "#FDAC34",
                infoColorShade = "#299AFF",
                greyColor = "#4F5D70",
                blueColor = "#2c9aff",
                blueLightColor = "#84D0FF",
                greyLightColor = "#EDF1F4",
                tooltipShadow = "rgba(0, 0, 0, 0.25)",
                lineChartPrimary = "#666ee8",
                lineChartDanger = "#ff4961",
                labelColor = "#6e6b7b",
                grid_line_color = "rgba(200, 200, 200, 0.2)"; // RGBA color helps in dark layout
            // console.log(AllsupervisorNotesLatepecentage);
            if ($("html").hasClass("dark-layout")) {
                labelColor = "#b4b7bd";
            }

            // Wrap charts with div of height according to their data-height
            if (chartWrapper.length) {
                chartWrapper.each(function() {
                    $(this).wrap(
                        $(
                            '<div style="height:' +
                            this.getAttribute("data-height") +
                            'px"></div>'
                        )
                    );
                });
            }

            $.ajax({
                url: window.location.origin + '/admin/notesChart',
                success: function(response) {
                    // console.log(response.AllsupervisorNotesLatepecentage);
                    if (doughnutChartEx.length) {
                        var doughnutExample = new Chart(doughnutChartEx, {
                            type: "doughnut",
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                responsiveAnimationDuration: 500,
                                cutoutPercentage: 60,
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem, data) {
                                            var label =
                                                data.datasets[0].labels[
                                                    tooltipItem.index
                                                ] || "",
                                                value =
                                                data.datasets[0].data[tooltipItem.index];
                                            var output = " " + label + " : " + value + " %";
                                            return output;
                                        },
                                    },
                                    // Updated default tooltip UI
                                    shadowOffsetX: 1,
                                    shadowOffsetY: 1,
                                    shadowBlur: 8,
                                    shadowColor: tooltipShadow,
                                    backgroundColor: window.colors.solid.white,
                                    titleFontColor: window.colors.solid.black,
                                    bodyFontColor: window.colors.solid.black,
                                },
                            },
                            data: {
                                datasets: [{
                                    labels: ["متأخرة", "مخالفة"],
                                    data: [
                                        response.AllsupervisorNotesLatepecentage,
                                        response.AllsupervisorNotesOffendpecentage,
                                    ],
                                    backgroundColor: [
                                        successColorShade,
                                        warningLightColor,
                                        window.colors.solid.primary,
                                    ],
                                    borderWidth: 0,
                                    pointStyle: "rectRounded",
                                }, ],
                            },
                        });
                    }
                    if (doughnutChartEx2.length) {
                        var doughnutExample = new Chart(doughnutChartEx2, {
                            type: "doughnut",
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                responsiveAnimationDuration: 500,
                                cutoutPercentage: 60,
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem, data) {
                                            var label =
                                                data.datasets[0].labels[
                                                    tooltipItem.index
                                                ] || "",
                                                value =
                                                data.datasets[0].data[tooltipItem.index];
                                            var output = " " + label + " : " + value + " %";
                                            return output;
                                        },
                                    },
                                    // Updated default tooltip UI
                                    shadowOffsetX: 1,
                                    shadowOffsetY: 1,
                                    shadowBlur: 8,
                                    shadowColor: tooltipShadow,
                                    backgroundColor: window.colors.solid.white,
                                    titleFontColor: window.colors.solid.black,
                                    bodyFontColor: window.colors.solid.black,
                                },
                            },
                            data: {
                                datasets: [{
                                    labels: ["متأخرة", "مخالفة"],
                                    data: [
                                        response.AllshiftNotesLatepecentage,
                                        response.AllshiftNotesOffendpecentage,
                                    ],
                                    backgroundColor: [
                                        successColorShade,
                                        warningLightColor,
                                        window.colors.solid.primary,
                                    ],
                                    borderWidth: 0,
                                    pointStyle: "rectRounded",
                                }, ],
                            },
                        });

                    }
                }
            });

        }
    </script>
@endsection
