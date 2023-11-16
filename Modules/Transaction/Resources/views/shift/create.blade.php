{{-- @php
    $days = ['Friday' => 'الجمعه', 'Saturday' => 'السبت', 'Sunday' => 'الاحد', 'Monday' => 'الاثنين', 'Tuesday' => 'الثلاثاء', 'Wednesday' => 'الاربعاء', 'Thursday' => 'الخميس'];
    foreach ($days as $key => $value) {
        foreach ($holidayes as $holiday) {
            if ($holiday == $key) {
                unset($days[$key]);
                //dd(1);
            }
        }
    }

    //dd($days);

@endphp --}}
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
                <h4 class="card-title">انشاء المناوبة الخاص بالمدرسة</h4>
            </div>

            <div class="card-body">
                <form class="form form-horizontal invoice-repeater"
                    action="{{ url('admin/school/' . request()->route('school_id') . '/shift') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">

                        <div data-repeater-list="shifts">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-3 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-icon-default-date"> تاريخ</label>
                                            <input type="date" name="date" id="fp-date-time" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-12">
                                        <div class="mb-1 ">
                                            <label class="col-form-label" for="default-select-multi2">الموظف </label>


                                            <select class="select form-select " multiple required name="employee_id"
                                                id="default-select-multi2">
                                                @foreach ($viewModel->employees(request()->route('school_id')) as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach

                                            </select>

                                            {{-- </div> --}}
                                        </div>
                                    </div>


                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
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
