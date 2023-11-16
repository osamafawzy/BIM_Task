
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
            margin-right: 10px;
            margin-left: 10px;
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



    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="head" dir="rtl">
            <div class="row p-2">
                نموذج رقم (8/ب)
            </div>

        </div>
        <div class="bodycon" dir="rtl">
            <div class="headcont" style="margin-top: 5px">
                <div class="row " style="width:40% ">
                    اسم النموذج :جدول الاشراف اليومي
                </div>
                <div class="row " style="float: left ;width:40% ; margin-top:-20px; margin-left:-55px">
                    رمز النموذج:(و.ت.ع.ن.01-02/ب)
                </div>
            </div>
            <br>
            <div>
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
                        <th>مكان الاشراف</th>
                        <th>التوقيع</th>
                        <th>ملحوظات</th>
                    </tr>
                </thead>
{{--                <tbody>--}}
{{--                    @foreach ($supervisionData as $key => $value)--}}
{{--                        @foreach ($days as $key2 => $value2)--}}
{{--                            <tr>--}}
{{--                                <td rowspan="{{ count($value) }}">{{ $value2 }}</td>--}}
{{--                                @php--}}
{{--                                    $date = Carbon\Carbon::createFromDate($key2);--}}
{{--                                @endphp--}}

{{--                                <td rowspan="{{ count($value) }}">--}}
{{--                                    {{ $key === $key2 ? date('Y-m-d', strtotime($date)) : '' }}--}}
{{--                                </td>--}}

{{--                                <td>{{ $key === $key2 ? $value[0] : '' }}</td>--}}

{{--                                --}}{{-- @foreach ($value as $emp)--}}
{{--                                    <td>{{ $key === $key2 ? $emp : '' }}</td>--}}
{{--                                @endforeach --}}

{{--                                <td rowspan="{{ count($value) }}"></td>--}}
{{--                                <td rowspan="{{ count($value) }}"></td>--}}
{{--                                <td rowspan="{{ count($value) }}"></td>--}}
{{--                            </tr>--}}
{{--                            @for ($i = 1; $i < count($value); $i++)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $key === $key2 ? $value[$i] : '' }}</td>--}}
{{--                                </tr>--}}
{{--                            @endfor--}}
{{--                        @endforeach--}}
{{--                    @endforeach--}}

{{--                </tbody>--}}

                                <tbody>
                                    @foreach ($supervisionData as $key => $value)
                                        <tr>
                                            <th>{{arabicDayName()[$key]}}</th>
                                            <td></td>
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
                <div>92/الدليل الاجرائي لمدارس التعليم العام للعام الدراسي 1440-1441 هـ الاصدار الرابع</div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
