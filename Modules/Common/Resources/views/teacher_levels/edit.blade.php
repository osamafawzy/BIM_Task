@extends('common::layouts.master')


@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل البيانات الخاصه  بالمستوي / الرتبة {{$teacher_levels['title']}}</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{url('admin/teacher_levels/'.$teacher_levels->id)}}" method="POST">
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
                                        <input type="text" id="fname-icon" value="{{$teacher_levels->title}}" class="form-control" name="title" placeholder="العنوان" />
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
                                    <label class="col-form-label" for="pass-icon4">النوع</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group-merge">
                                        <select class="select2 form-select dt-role" id="type"
                                                name="for">
                                            <option value="administrative"
                                                    @if ($teacher_levels['for'] == 'administrative') selected @endif>ادارى</option>
                                            <option value="teacher" @if ($teacher_levels['for'] == 'teacher') selected @endif>معلم
                                            </option>
                                        </select>
                                        @error('for')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
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

