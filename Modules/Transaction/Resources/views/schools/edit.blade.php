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
                <h4 class="card-title">تعديل البيانات الخاصه بالمؤسسة التعليمية {{$school['title']}}</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{url('admin/schools/'.$school->id)}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="fname-icon" value="{{$school->title}}" class="form-control" name="title" placeholder="العنوان" />
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
                                    <label class="col-form-label" for="default-select-multi2">النوع</label>
                                </div>
                                <div class="col-sm-9">
                                    <select onchange="checkType()" class="select2 form-select " name="type" id="type">
                                        <option @if($school->type == 'administration') selected @endif value="administration">ادارة</option>
                                        <option @if($school->type == 'office') selected @endif value="office">مكتب تعليمي</option>
                                        <option @if($school->type == 'school') selected @endif value="school">مدرسة</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-12" style="display: none" id="administration">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="default-select-multi2">الادارة التابع لها</label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="select2 form-select " name="administration_id" >
                                        <option value="{{ null }}">برجاء اختيار الادراة التابع لها</option>
                                        @foreach ($viewModel->administrations() as $administration)
                                            <option @if($school->administration_id == $administration['id']) selected @endif value="{{ @$administration['id'] }}">{{ @$administration['title'] }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-12" style="display: none" id="office">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="default-select-multi2">المكتب التعليمي التابع لها</label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="select2 form-select " name="office_id" >
                                        <option value="{{ null }}">برجاء اختيار مكتب تعليمي</option>
                                        @foreach ($viewModel->offices() as $office)
                                            <option @if($school->office_id == $office['id']) selected @endif value="{{ @$office['id'] }}">{{ @$office['title'] }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">الرقم الوزاري للمدرسه</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                        <input type="text" id="contact-icon" required class="form-control" name="ministerial_number" value="{{$school->ministerial_number}}" placeholder="ministerial_number" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="default-select-multi2">نوع التعليم </label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="select2 form-select " name="education_type"
                                           >
                                        <option value="governmental" @if ($school->education_type == "governmental") selected @endif> حكومي</option>
                                        <option value="people" @if ($school->education_type == "people") selected @endif> اهلي</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">رقم الجوال</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                        <input type="number" id="contact-icon" required class="form-control" name="phone" value="{{$school->phone}}" placeholder="Phone" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">العنوان</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                        <input type="text" id="contact-icon" required class="form-control" name="address" value="{{$school->address}}" placeholder="address" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">خطوط الطول (Lat)</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="fname-icon" class="form-control" name="lat" placeholder="lat" value="{{$school->lat}}" />
                                        @error('lat')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">دوائر العرض (Lng)</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="fname-icon" class="form-control" name="long" placeholder="long" value="{{$school->long}}" />
                                        @error('long')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">المسافة المسموح بها لمسح الرمز التعريفي</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                        <input type="number" id="contact-icon" required class="form-control" name="distance" value="{{$school->distance}}" placeholder="distance" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> وقت بدايه الدوام الشتوى</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="winter_start_at"
                                               value="{{$school->winter_start_at}}" id="fp-time"
                                               class="form-control flatpickr-time text-start flatpickr-input active"
                                               placeholder="HH:MM">
                                        @error('winter_start_at')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> وقت نهاية للدوام الشتوى</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="winter_end_at" value="{{$school->winter_end_at}}"
                                               id="fp-time"
                                               class="form-control flatpickr-time text-start flatpickr-input active"
                                               placeholder="HH:MM">
                                        @error('winter_end_at')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> وقت بدايه الدوام الصيفي</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="summer_start_at"
                                               value="{{$school->summer_start_at}}" id="fp-time"
                                               class="form-control flatpickr-time text-start flatpickr-input active"
                                               placeholder="HH:MM">
                                        @error('summer_start_at')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> وقت نهاية للدوام الصيفي</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="summer_end_at" value="{{$school->summer_end_at}}"
                                               id="fp-time"
                                               class="form-control flatpickr-time text-start flatpickr-input active"
                                               placeholder="HH:MM">
                                        @error('summer_end_at')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="default-select-multi2">التوقيت الحالي</label>
                                </div>
                                <div class="col-sm-9">

                                    <select class="select2 form-select " required name="current_season"
                                           >
                                        <option @if($school->current_season == 'winter') selected @endif value="winter">شتوى</option>
                                        <option @if($school->current_season == 'summer') selected @endif value="summer">صيفى</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">عدد الدقائق المسموح بالتأخير</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="number" id="fname-icon" class="form-control" name="available_late_minutes"
                                               placeholder="" value="{{$school->available_late_minutes}}" />
                                        @error('available_late_minutes')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="default-select-multi2">ايام الاجاوة الاسبوعية</label>
                                </div>
                                <div class="col-sm-9">

                                    <select class="select2 form-select " multiple required name="holidays[]"
                                            id="default-select-multi2">
                                        <option @if(in_array('Friday',$school->holidays??[])) selected @endif value="Friday">الجمعة</option>
                                        <option @if(in_array('Saturday',$school->holidays??[])) selected @endif value="Saturday ">السبت</option>
                                        <option @if(in_array('Sunday',$school->holidays??[])) selected @endif value="Sunday">الاحد</option>
                                        <option @if(in_array('Monday',$school->holidays??[])) selected @endif value="Monday">الاثنين</option>
                                        <option @if(in_array('Tuesday',$school->holidays??[])) selected @endif value="Tuesday">الثلاثاء</option>
                                        <option @if(in_array('Wednesday',$school->holidays??[])) selected @endif value="Wednesday">الاربعاء</option>
                                        <option @if(in_array('Thursday',$school->holidays??[])) selected @endif value="Thursday">الخميس</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon">الصوره</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="image"></i></span>
                                        <input type="file" id="pass-icon" class="form-control" name="image" placeholder="image" />
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

@section('js')
    <script>
        var type = document.getElementById('type');
        var administration = document.getElementById('administration');
        var office = document.getElementById('office');
        if (type.value == 'administration') {
            console.log('11');
            administration.style.display = "none";
            office.style.display = "none";
        } else if (type.value == 'office'){
            console.log('22');
            administration.style.display = "block";
            office.style.display = "none";
        }else if (type.value == 'school'){
            console.log('33');
            administration.style.display = "block";
            office.style.display = "block";
        }
    </script>
    <script src="{{asset('')}}admin/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="{{asset('')}}admin/js/scripts/forms/form-validation.js"></script>

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
        function checkType() {
            var type = document.getElementById('type');
            var administration = document.getElementById('administration');
            var office = document.getElementById('office');
            if (type.value == 'administration') {
                console.log('11');
                administration.style.display = "none";
                office.style.display = "none";
            } else if (type.value == 'office'){
                console.log('22');
                administration.style.display = "block";
                office.style.display = "none";
            }else if (type.value == 'school'){
                console.log('33');
                administration.style.display = "block";
                office.style.display = "block";
            }
        }

@endsection

