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

        .ids {
            width: 30px
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
                نموذج رقم (17)
            </div>

        </div>
        <div class="bodycon" dir="rtl">
            <div class="headcont" style="margin-top: 5px">
                <div class="row " style="width:40% ">
                    اسم النموذج : سجل العمل الرسمي
                </div>
                <div class="row " style="float: left ;width:40% ; margin-top:-20px; margin-left:-55px">
                    رمز النموذج:(و.م.ع.ن.02-01)
                </div>
            </div>
            <br>
            <div class="row ">
                سجل دوام الموظفين للعام الدراسي
                :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                الفصل :
            </div>
            <br>
            <div class="row ">
                يوم : {{ isset($date) && $date != null ? date('Y-m-d', strtotime($date)) : date('Y-m-d') }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                الموافق : &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp; 14هـ
            </div>
            <br>
            <table class="">
                <thead class="">
                    <tr>
                        <th class="ids">م</th>
                        <th>اسم الموظف رباعي</th>
                        <th>الوظيفه</th>
                        <th>وقت الحضور</th>
                        <th>التوقيع</th>
                        <th>وقت الخروج</th>
                        <th>التوقيع</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($attendance as $key => $value)
                        <tr>
                            <td class="ids">{{ $i++ }}</td>
                            <td>{{ $key }}</td>
                            @foreach ($value as $key2 => $value2)
                                <td>{{ isset($key2) && $key2 != null ? $key2 : '' }}</td>

                                <td>{{ isset($value2['in']) && $value2['in'] != null ? $value2['in'] : '' }}</td>
                                <td></td>
                                <td>{{ isset($value2['out']) && $value2['out'] != null ? $value2['out'] : '' }}</td>
                                <td></td>
                            @endforeach

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <br />
            <div
                style="margin-right:auto ; margin-left:auto;background-color: grey;color:white;text-align:center;padding-top:3px;padding-bottom:3px;width:80%">
                الموظفون الغائبون
            </div>
            <table class="" style="margin-right:auto ; margin-left:auto;width:80%">
                <thead class="">
                    <tr>
                        <th class="ids">م</th>
                        <th>اسم الموظف رباعي</th>
                        <th>الوظيفه</th>
                        <th>سبب الغياب</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $n = 1;
                    @endphp
                    @foreach ($absence as $value)
                        <tr>
                            <td class="ids">{{ $n++ }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ isset($value) && $value->currentjob != null ? $value->currentjob : '' }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="row col-lg-120 mb-2">
                {{-- <div> وكيل الشؤن التعليميه :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    قائد المدرسة :{{ $mangerdata->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <br> --}}

                @foreach ($shift as $data)
                    <div>
                        المعلم المناوب بداية و نهاية العمل :{{ $data->employee->name }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        اسم المعلم و توقيعه :

                    </div>
                @endforeach
                <br>
                @foreach ($supervisor as $data)
                    <div>
                        المشرف الزائر : {{ $data->employee->name }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        اسم المعلم و توقيعه :
                    </div>
                @endforeach



                <br>
                <div>ملاحظة : يغلق االدوام مرتين في الفترة الأولي بعد بداية البرنامج الصباحي مباشرة وفي المرة الثانية
                    عند بداية الحصه الاولي مباشرة. </div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
