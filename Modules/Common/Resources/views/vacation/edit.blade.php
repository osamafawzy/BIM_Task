@php
    $admin = Auth::user();
    // dd($admin);
@endphp
@extends('common::layouts.master')


@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل البيانات الخاصه بالعطله او الاجازه الرسميه {{ $vacation['title'] }}</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ url('admin/vacation/' . $vacation->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="fname-icon" value="{{ $vacation->title }}"
                                            class="form-control" name="title" placeholder="العنوان" />
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
                                            value="{{ $vacation->date }}" />
                                        {{-- @error('days_number')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror --}}
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
                                                {{-- <option disabled selected> اختر المدرسة</option> --}}
                                                @foreach ($viewModel->schools() as $school)
                                                    <option value="{{ $school['id'] }}"  @if($admin->school_id == $school['id']) selected @else disabled @endif >{{ $school['title'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div id="" style="" class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3 text-center">
                                        <label class="col-form-label" for="pass-icon">المدرسة</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group-merge">
                                            <select class="select2 form-select dt-role" name="school_id">
                                                {{-- <option disabled selected> اختر المدرسة</option> --}}
                                               @foreach ($viewModel->schools() as $school)
                                                    <option value="{{ $school['id'] }}"  @if($vacation->school_id == $school['id']) selected @endif >{{ $school['title'] }}</option>
                                                @endforeach
                                            </select>
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
