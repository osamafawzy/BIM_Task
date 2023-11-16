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
                نموذج رقم (7)
            </div>

        </div>
        <div class="bodycon" dir="rtl">
            <div class="headcont" style="margin-top: 5px">
                <div class="row " style="width:40% ">
                    اسم النموذج : سجل توزيع حصص الانتظار
                </div>
                <div class="row " style="float: left ;width:40% ; margin-top:-20px; margin-left:-55px">
                    رمز النموذج:(و.ت.ع.ن.01-01)
                </div>
            </div>
            <br>
            <div class="row">
                العام الدراسي &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 14هـ/الفصل (
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
            <br>

            @foreach ($alternatives as $key => $value)
                <div class="row">

                    <div style="margin-bottom: 10px">
                        زملائي المعلمين/نظرا لغياب الزميل {{ $key }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        لهذا اليوم :
                        {{arabicDayName()[$value[0]['day_name']]}}

                    </div>

                    <div style="margin-bottom: 10px">
                        الموافق
                        {{ $_GET['date'] ?? date('Y-m-d') }}
                        14هـ امل تسديد مكانة حسب الجدول الموضح و التوقيع بالعلم ،، ولكم جزيل الشكر
                    </div>

                    <table class="">
                        <thead>
                            <tr>
                                <th class="ids">م</th>
                                <th>الفصل</th>
                                <th> المادة</th>
                                <th> اسم المعلم المنتظر </th>
                                <th> ما تم تنفيذه في حصة الانتظار</th>
                                <th>التوقيع</th>
                                <th>ملحوظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($value as $data)
                                <tr>
                                    <td class="ids">{{ $n++ }}</td>
                                    <td>{{ $data->hall->title }}</td>
                                    <td>{{ $data->subject->title }}</td>
                                    <td>{{ $data->alternativeEmployee->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>
                    <br>
                </div>
            @endforeach


            <br>
            <div class="row col-lg-120 mb-2">
                <div>
                    وكيل الشؤون التعليمية :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;

                    التوقيع :
                </div>

                <br>
                <br>
                <div>
                    90/الدليل الاجرائي لمدارس التعليم العام للعام الدراسي 1440-1441هـ- الاصدار الرابع
                </div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
