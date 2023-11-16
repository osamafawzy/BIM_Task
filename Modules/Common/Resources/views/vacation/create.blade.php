@php
    $admin = Auth::user();
    // dd($admin);
@endphp
@extends('common::layouts.master')

@section('css')
      <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/forms/form-validation.css">
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
                <h4 class="card-title">انشاء عطله و اجازه رسميه</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ url('admin/vacation/') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        {{-- <input type="hidden" name="admin_id" value="{{ $admin->id }}"> --}}
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" class="form-control" name="title" placeholder="العنوان"
                                            value="{{ old('title') }}" />
                                        @error('title')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> التاريخ</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="date" class="form-control" name="date" placeholder=" التاريخ"
                                            value="{{ old('date') }}" />
                                        @error('date')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($admin->school_id ?? null)
                            <div id="" style="" class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3 text-center">
                                        <label class="col-form-label" for="pass-icon">المدرسة</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group-merge">
                                            <select class="select2 form-select dt-role" name="school_id">
                                                @foreach ($viewModel->schools() as $school)
                                                    <option value="{{ $school['id'] }}"  @if ($admin->school_id == $school['id']) selected @else disabled @endif >{{ $school['title'] }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" disabled name="school_id" value="{{old("school_id")}}"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div id="" style="" class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3 text-center">
                                        <label class="col-form-label" for="default-select-multi7">المدرسة</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group-merge">
                                            <select multiple class="select2 form-select dt-role" name="school_id[]" id="default-select-multi7">
                                                {{-- <option disabled selected> اختر المدرسة</option> --}}
                                                @foreach ($viewModel->schools() as $school)
                                                    <option value="{{ $school['id'] }}">{{ $school['title'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('school_id')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


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
@endsection
