
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        * {
            box-sizing: border-box;
            color: black;
        }

        .head {
            background-color: grey;
        }

        /* .bodycont {
            width: 90%;
        } */

        .main {
            border: 1px solid black;
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
        }

        .headcont {
            display: flex;

        }

        .row {
            padding-right: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            margin-right: 35px;

            width: 120px;

        }

        tr td {
            height: 50px;
            padding-right: 10px
        }

        .headcont div {
            display: inline-block;
        }
    </style>

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css/bootstrap.min.css"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css/viewform/styles.css"> --}}

    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="head" dir="rtl">
            <div class="row p-2">
                نموذج رقم (8/أ)
            </div>

        </div>
        <div class="bodycon" dir="rtl">
            <div class="headcont" style="margin-top: 5px">
                <div class="row " style="width:40% ">
                    اسم النموذج :جدول المناوبة
                </div>
                <div class="row " style="float: left ;width:40% ; margin-top:-20px; margin-left:-55px">
                    رمز النموذج:(و.ت.ع.ن.01-02/أ)
                </div>
            </div>
            <br>
            <div class="row ">
                العام الدراسي &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 14هـ/الفصل
                (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
            <br>

            <table class="">
                <thead class="">
                    <tr>
                        <th>اليوم</th>
                        <th>التاريخ</th>
                        <th>الاسم</th>
                        <th> التوقيع</th>
                        <th>ملحوظات</th>
                    </tr>
                </thead>
{{--                <tbody>--}}
{{--                    @foreach ($days as $key2 => $value2)--}}
{{--                        <tr>--}}
{{--                            <td rowspan="">{{ $value2 }}</td>--}}
{{--                            @foreach ($shiftData as $key => $value)--}}
{{--                                @php--}}
{{--                                    $date = Carbon\Carbon::parse($key);--}}
{{--                                @endphp--}}


{{--                                <td rowspan="{{ count($value) }}">--}}
{{--                                    {{ $date->format('l') === $key2 ? $key : '' }}--}}
{{--                                </td>--}}

{{--                                <td>{{ $date->format('l') === $key2 ? $value[0] : '' }}</td>--}}

{{--                                --}}{{-- @foreach ($value as $emp)--}}
{{--                                    <td>{{ $key === $key2 ? $emp : '' }}</td>--}}
{{--                                @endforeach --}}

{{--                                <td rowspan="{{ count($value) }}"></td>--}}
{{--                                <td rowspan="{{ count($value) }}"></td>--}}


{{--                                            @for ($i = 1; $i < count($value); $i++)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $date->format('l') === $key2 ? $value[$i] : '' }}</td>--}}
{{--                                    </tr>--}}
{{--                                   @endfor--}}
{{--                               @endforeach--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}

{{--                </tbody>--}}

                <tbody>
                @foreach ($shiftData as $key => $value)
                    <tr>
                        <th>{{arabicDayName()[\Carbon\Carbon::parse($key)->format('l')]}}</th>
                        <td>{{$key}}</td>
                        <td>
                            @foreach($value as $v)
                                - {{$v}} <br>
                            @endforeach
                        </td>
                        <td></td>
                        <td></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            <br />
            <div class="row col-lg-120 mb-2">
                <div> وكيل الشؤن التعليميه :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    قائد المدرسة :{{ @$mangerdata->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <br>
                <div> الاسم :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    الاسم :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    التوقيع :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    التوقيع :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <br>
                <div>*لا يقل الحد الأدني للمناوبة و الأشراف عن موظفين ، ويمكن زيادة العدد حسب الاحتياج.</div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
