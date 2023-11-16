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
                <h4 class="card-title">انشاء مؤسسة تعليمية جديدة</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{url('admin/schools/')}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="title" placeholder="العنوان" value="{{old('title')}}" />
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
                                            <option value="administration">ادارة</option>
                                            <option value="office">مكتب تعليمي</option>
                                            <option value="school">مدرسة</option>
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
                                            <option value="{{ @$administration['id'] }}">{{ @$administration['title'] }}</option>
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
                                            <option value="{{ @$office['id'] }}">{{ @$office['title'] }}</option>
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
                                        <input type="text" id="contact-icon" required class="form-control" name="ministerial_number" value="{{old('ministerial_number')}}" placeholder="ministerial_number" />
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
                                            id="default-select">
                                            <option value="governmental"> حكومي</option>
                                            <option value="people"> اهلي</option>
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
                                        <input type="number" id="contact-icon" required class="form-control" name="phone" value="{{old('phone')}}" placeholder="Phone" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">العنوان</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input type="text" id="fname-icon" class="form-control" name="address" placeholder="address" value="{{old('address')}}" />
                                        @error('address')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
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
                                        <input type="text" id="fname-icon" class="form-control" name="lat" placeholder="lat" value="{{old('lat')}}" />
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
                                        <input type="text" id="fname-icon" class="form-control" name="long" placeholder="long" value="{{old('long')}}" />
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
                                        <input type="number" id="contact-icon" required class="form-control" name="distance" value="{{old('distance')}}" placeholder="distance" />
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
                                               value="{{ old('winter_start_at') }}" id="fp-time"
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
                                        <input type="text" name="winter_end_at" value="{{ old('winter_end_at') }}"
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
                                               value="{{ old('summer_start_at') }}" id="fp-time"
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
                                        <input type="text" name="summer_end_at" value="{{ old('summer_end_at') }}"
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
                                            id="default-select-multi2">
                                            <option value="winter">شتوى</option>
                                            <option value="summer">صيفى</option>
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
                                               placeholder="" value="{{ old('available_late_minutes') }}" />
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
                                        <option value="Friday">الجمعة</option>
                                        <option value="Saturday ">السبت</option>
                                        <option value="Sunday">الاحد</option>
                                        <option value="Monday">الاثنين</option>
                                        <option value="Tuesday">الثلاثاء</option>
                                        <option value="Wednesday">الاربعاء</option>
                                        <option value="Thursday">الخميس</option>
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
                            <div class="mb-1">
                                <div class="form-check">
                                    <input type="checkbox" value="1" name="is_active" class="form-check-input" id="customCheck2" />
                                    <label class="form-check-label" for="customCheck2">تفعيل</label>
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

        </script>
@endsection
