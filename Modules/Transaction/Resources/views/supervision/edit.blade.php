@php
    $days = ['Friday' => 'الجمعه', 'Saturday' => 'السبت', 'Sunday' => 'الاحد', 'Monday' => 'الاثنين', 'Tuesday' => 'الثلاثاء', 'Wednesday' => 'الاربعاء', 'Thursday' => 'الخميس'];
    foreach ($days as $key => $value) {
        foreach ($holidayes as $holiday) {
            if ($holiday == $key) {
                unset($days[$key]);
                //dd(1);
            }
        }
    }

    $day_name = request()->route('supervision');

@endphp
@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css-rtl/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/forms/select/select2.min.css') }}">
@endsection


@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل البيانات </h4>
            </div>
            {{-- action="{{ url('admin/school/' . request()->route('school_id') . '/supervision/' .request()->route('title') ) }}" --}}

            <div class="card-body">
                <form class="form form-horizontal" action="{{ url('admin/school/' . request()->route('school_id') . '/supervision/' .$day_name ) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> اليوم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <select class="select form-select " id="title" name="title">

                                            @foreach ($days as $key => $value)
                                                    <option value="{{ $key }}" @if($key==$day_name) selected @endif>{{ $value }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="default-select-multi2"> الموظف</label>
                                </div>
                                <div class="col-sm-9">
                                        <select class="select2 form-select " multiple required name="employee_id[]"
                                                id="default-select-multi2">
                                            @foreach ($viewModel->employees() as $employee)
                                                <option @if(in_array($employee->id,$supervision->toArray())) selected @endif value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach

                                        </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}admin/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="{{ asset('') }}admin/js/scripts/forms/form-validation.js"></script>

    <script src="{{ asset('') }}admin/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="{{ asset('') }}admin/js/scripts/forms/form-repeater.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ asset('') }}admin/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ asset('') }}admin/js/scripts/forms/pickers/form-pickers.js"></script>
    <script>
        var select = $('.select2');

        select.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%',
                dropdownParent: $this.parent()
            });
        });
    @endsection
