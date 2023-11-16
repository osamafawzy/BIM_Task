@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css-rtl/plugins/forms/form-validation.css">
@endsection
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">انشاء مخالفة</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ url('admin/violations/') }}" method="POST">
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
                                    <label class="col-form-label" for="default-select-multi2">القسم التابع لها</label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="select2 form-select " name="violation_id"
                                            id="default-select">
                                        <option value={{null}}>من فضلك اختر القسم التابع لها اذا وجد</option>
                                        @foreach ($viewModel->violations() as $violation)
                                            <option value="{{ @$violation['id'] }}">{{ @$violation['title'] }}</option>
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
@endsection
