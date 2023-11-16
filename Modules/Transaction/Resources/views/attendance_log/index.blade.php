@extends('common::layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')
    <div class="col-lg-12 col-12">
        <div class="card">
            <div
                class="
                        card-header
                        d-flex
                        flex-sm-row flex-column
                        justify-content-md-between
                        align-items-start
                        justify-content-start
                    ">
                <div>
                    <h4 class="card-title mb-25"> فلترة سجل العمل
                    </h4>

                </div>

            </div>
            <div class="card-body">

                <div class="card-body">
                    <form class="dt_adv_search">
                        <div class="row g-1 mb-md-1">
                            {{-- <div class="col-md-4">
                                <label class="form-label" for="basic-icon-default-date"> الموظف</label>

                                <select name="employee_id" class="form-select" id="name522">
                                    <option selected value="{{ null }}">اختر</option>

                                    @foreach ($viewModel->employees() as $employee)
                                        <option @if ($employee->id == @$_GET['employee_id']) selected @endif
                                            value="{{ $employee->id }}">{{ $employee->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div> --}}
                            {{-- <div class="col-md-4">
                                <label class="form-label" for="basic-icon-default-date"> المدرسة</label>

                                <select name="school_id" class="form-select" id="name511">
                                    <option selected value="{{ null }}">اختر</option>

                                    @foreach ($viewModel->schools() as $school)
                                        <option @if ($school->id == @$_GET['school_id']) selected @endif
                                            value="{{ $school->id }}">{{ $school->title }}</option>
                                    @endforeach

                                </select>
                            </div> --}}
                            <div class="col-md-4">
                                <label class="form-label" for="basic-icon-default-date"> تاريخ</label>
                                <input type="date" value="{{ @$_GET['date'] }}" name="date" id="fp-date-time"
                                    class="form-control" />
                            </div>


                            <div style=" margin-top: 37px" class="col-md-1">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i data-feather="search"></i>
                                    <span>بحث</span>
                                </button>
                            </div>
                        </div>


                    </form>
                    {{-- @error('holiday_type_id')
                        <p class="alert alert-danger" style="height: 20px">{{ $message }}</p>
                    @enderror --}}
                </div>
                <div id="line-chart"></div>
            </div>
        </div>
    </div>
    <!-- Basic table -->
    {{-- <a href='school/attendenceLog/download?school_id={{ isset($school_id) ? $school_id : null }}&date={{ isset($_GET['date']) ? $_GET['date'] : null }}'
        class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true"> تحميل</a> --}}
    @can('Download-attendence_log')
        <div class="d-flex flex-wrap justify-content-end">
            <a href="{{ URL::route('attendenceLog.download', ['school_id' => $school_id, 'date' => isset($_GET['date']) && $_GET['date'] !== null ? $_GET['date'] : null]) }}"
                class="btn btn-primary btn-lg mb-2 " tabindex="-1" role="button" aria-disabled="true"> تحميل</a>
        </div>
    @endcan

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>

                                <th>اسم الموظف</th>
                                <th> الوظيفه</th>
                                <th> وقت الحضور </th>
                                <th>وقت الخروج</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @foreach ($value as $key2 => $value2)
                                        <td>{{ isset($key2) && $key2 != null ? $key2 : '' }}</td>

                                        <td>{{ isset($value2['in']) && $value2['in'] != null ? $value2['in'] : '' }}</td>
                                        <td>{{ isset($value2['out']) && $value2['out'] != null ? $value2['out'] : '' }}
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="col-12 text-center bg-dark pt-1 pb-1" style="color: white">الموظفون الغائبون</div>
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">

                        <thead>

                            <tr>
                                <th> اسم الموظف رباعي </th>
                                <th> الوظيفة </th>
                                <th> سبب الغياب</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absenceEmployess as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ isset($value) && $value->currentjob != null ? $value->currentjob : '' }}</td>
                                    <td></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    @include('common::includes.datatable')


    {{--    <script src="{{asset('')}}admin/js/scripts/tables/table-datatables-basic.js"></script> --}}

    {{-- <script src="{{asset('')}}js/subjects/script.js"></script> --}}

    @if (session('updated'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم تعديل ملاحظات الاشراف  بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    @if (session('created'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم انشاء المادة الدراسية بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif
    {{-- <script>
        function getabsenceId(val) {

            var id = document.getElementById("absence_id").value = val;
            console.log(id);

        }

        function tConvert(time) {
            // Check correct time format and split into components
            time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice(1); // Remove full string match value
                time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join(''); // return adjusted time or original string
        }
        $(function() {
            'use strict';
            var url = new URL(window.location.href);
            var url2 = window.location.href.split('/');
            var school_id = url2[5];
            var date = url.searchParams.get("date")

            var ajaxRequest = "attendenceLog?";
            if (date != null) {
                ajaxRequest += "date=" + date + "&";
            }
            var dt_basic_table = $('.datatables-basic'),
                dt_date_table = $('.dt-date');
            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    ajax: ajaxRequest,
                    columns: [{
                            data: 'id'
                        }, // for responsive show
                        {
                            data: 'id'
                        }, // for checkbox
                        {
                            data: 'id'
                        },
                        {
                            data: 'employee.name'
                        },
                        {
                            data: 'employee.currentjob'
                        },

                        {
                            data: 'time'
                        },
                        {
                            data: 'time'
                        },

                        // {
                        //     data: 'id'
                        // },
                    ],
                    columnDefs: [{
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            responsivePriority: 2,
                            targets: 0
                        },
                        {
                            // For Checkboxes
                            targets: 1,
                            orderable: false,
                            responsivePriority: 3,
                            render: function(data, type, full, meta) {
                                return (
                                    '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                                    data +
                                    '" /><label class="form-check-label" for="checkbox' +
                                    data +
                                    '"></label></div>'
                                );
                            },
                            checkboxes: {
                                selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
                            }
                        },
                        // {
                        //     // For Checkboxes
                        //     targets: 5,
                        //     orderable: false,
                        //     responsivePriority: 3,
                        //     render: function(data, type, full, meta) {
                        //         if (data === "yes") {
                        //             return (

                        //                 `<span class="badge-light-info badge rounded-pil" >ذهاب و عودة</span>`
                        //             );
                        //         } else {
                        //             return (
                        //                 `<span class=" badge rounded-pil badge-light-danger" >ذهاب بلا عودة</span>`
                        //             )
                        //         }

                        //     }

                        // },
                        // {
                        //     // For Checkboxes
                        //     targets: 7,
                        //     orderable: false,
                        //     responsivePriority: 3,
                        //     render: function(data, type, full, meta) {

                        //         var returnat = tConvert(data);
                        //         return (
                        //             returnat
                        //         );

                        //     }
                        // },
                        // {
                        //     // For Checkboxes
                        //     targets: 9,
                        //     orderable: false,
                        //     responsivePriority: 3,
                        //     render: function(data, type, full, meta) {

                        //         var from = tConvert(data);
                        //         return (
                        //             from
                        //         );

                        //     }
                        // },
                        {
                            targets: 2,
                            visible: false
                        },
                        {
                            // Label
                            targets: -2,
                            render: function(data, type, full, meta) {

                                var type = full['type'];

                                if (type === "in") {
                                    return (
                                        `<div>${data}</div>`
                                    );
                                }
                                else {
                                    return (
                                        `<div></div>`
                                    );
                                }

                            }
                        },
                        {
                            // Label
                            targets: -1,
                            render: function(data, type, full, meta) {

                                var type = full['type'];
                                if (type === "out") {
                                    return (
                                        `<div>${data}</div>`
                                    );
                                }
                                else {
                                    return (
                                        `<div></div>`
                                    );
                                }

                            }
                        },
                        // {
                        //     // Actions
                        //     targets: -1,
                        //     title: 'الادوات',
                        //     orderable: false,
                        //     render: function(data, type, full, meta) {
                        //         console.log(full['status']);
                        //         if (full['status'] == 'send') {
                        //             return (
                        //                 '<div style="display: flex !important;align-items: center !important;justify-content: space-around!important" class="d-inline-flex justify-content-between align-items-center">' +
                        //                 @if (auth()->user()->can('Edit-leave_request'))
                        //                     `<form method="post" action="{{ url('/admin/leaves/${data}') }}"> {{ method_field('PUT') }}{{ csrf_field() }} <input type="hidden" value="${data}"   name="id"> <button type="submit" name="status" value="accept_leave" class="btn btn-success" href="#" >قبول المغادرة</button></form>'` +
                        //                     `<form method="post" action="{{ url('/admin/leaves/${data}') }}"> {{ method_field('PUT') }}{{ csrf_field() }} <input type="hidden" value="${data}"   name="id"> <button type="submit" name="status" value="refused" class="btn btn-danger" href="#" >رفض</button></form>'`
                        //                 @else
                        //                     `<form></form>`
                        //                 @endif
                        //                 @can('Edit-leave_request')
                        //                     +
                        //                     '<a href="leaves/' + data +
                        //                         '/edit" class="item-edit">' +
                        //                         feather.icons['edit'].toSvg({
                        //                             class: 'font-small-4'
                        //                         }) +
                        //                         '</a>'
                        //                 @endcan +
                        //                 '</div>'

                        //             );
                        //         } else if (full['status'] == 'return') {
                        //             return (
                        //                 '<div style="display: flex !important;align-items: center !important;justify-content: space-around!important" class="d-inline-flex justify-content-between align-items-center">' +
                        //                 @if (auth()->user()->can('Edit-leave_request'))
                        //                     `<form method="post" action="{{ url('/admin/leaves/${data}') }}"> {{ method_field('PUT') }}{{ csrf_field() }} <input type="hidden" value="${data}"   name="id"> <button type="submit" name="status" value="accept_return" class="btn btn-success" href="#" >قبول العودة</button></form>'`
                        //                 @else
                        //                     `<form></form>`
                        //                 @endif
                        //                 @can('Edit-leave_request')
                        //                     +
                        //                     '<a href="leaves/' + data +
                        //                         '/edit" class="item-edit">' +
                        //                         feather.icons['edit'].toSvg({
                        //                             class: 'font-small-4'
                        //                         }) +
                        //                         '</a>'
                        //                 @endcan +
                        //                 '</div>'

                        //             );
                        //         } else if (full['status'] == 'accept_return') {
                        //             return (
                        //                 '<div style="display: flex !important;align-items: center !important;justify-content: space-around!important" class="d-inline-flex justify-content-between align-items-center">' +
                        //                 `<span class=" badge rounded-pil badge-light-info" >تم عوده المدرس</span>`

                        //                 @can('Edit-leave_request')
                        //                     +
                        //                     '<a href="leaves/' + data +
                        //                         '/edit" class="item-edit">' +
                        //                         feather.icons['edit'].toSvg({
                        //                             class: 'font-small-4'
                        //                         }) +
                        //                         '</a>'
                        //                 @endcan +
                        //                 '</div>'

                        //             );
                        //         } else {
                        //             return (
                        //                 '<div style="display: flex !important;align-items: center !important;justify-content: space-around!important" class="d-inline-flex justify-content-between align-items-center">'

                        //                 @can('Edit-leave_request')
                        //                     +
                        //                     '<a href="leaves/' + data +
                        //                         '/edit" class="item-edit">' +
                        //                         feather.icons['edit'].toSvg({
                        //                             class: 'font-small-4'
                        //                         }) +
                        //                         '</a>'
                        //                 @endcan +
                        //                 '</div>'

                        //             );
                        //         }

                        //     }
                        // }
                    ],
                    order: [
                        [2, 'desc']
                    ],
                    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 100,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    buttons: [
                        @can('Download-attendence_log')
                            {
                                text: feather.icons['download'].toSvg({
                                    class: 'me-50 font-small-4'
                                }) + 'سجل العمل ',
                                className: 'create-new btn btn-primary',
                                // attr: {
                                //     'data-bs-toggle': 'modal',
                                //     'data-bs-target': '#modals-slide-in'
                                // },
                                action: function(e, dt, node, config) {
                                    //This will send the page to the location specified
                                    window.location.href = '/admin/school/' + school_id +
                                        '/attendenceLog/download';
                                },
                                init: function(api, node, config) {
                                    $(node).removeClass('btn-secondary');
                                }
                            }
                        @endcan
                        // {
                        //     extend: 'collection',
                        //     className: 'btn btn-outline-secondary dropdown-toggle me-2',
                        //     text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                        //     buttons: [
                        //         {
                        //             extend: 'print',
                        //             text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        //             className: 'dropdown-item',
                        //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                        //         },
                        //         {
                        //             extend: 'csv',
                        //             text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                        //             className: 'dropdown-item',
                        //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                        //         },
                        //         {
                        //             extend: 'excel',
                        //             text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        //             className: 'dropdown-item',
                        //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                        //         },
                        //         {
                        //             extend: 'pdf',
                        //             text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        //             className: 'dropdown-item',
                        //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                        //         },
                        //         {
                        //             extend: 'copy',
                        //             text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                        //             className: 'dropdown-item',
                        //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                        //         }
                        //     ],
                        //     init: function (api, node, config) {
                        //         $(node).removeClass('btn-secondary');
                        //         $(node).parent().removeClass('btn-group');
                        //         setTimeout(function () {
                        //             $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        //         }, 50);
                        //     }
                        // },
                    ],
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function(row) {
                                    var data = row.data();
                                    return 'Details of ' + data['title'];
                                }
                            }),
                            type: 'column',
                            renderer: function(api, rowIdx, columns) {
                                var data = $.map(columns, function(col, i) {
                                    return col.title !==
                                        '' // ? Do not show row in modal popup if title is blank (for check box)
                                        ?
                                        '<tr data-dt-row="' +
                                        col.rowIdx +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>' :
                                        '';
                                }).join('');

                                return data ? $('<table class="table"/>').append('<tbody>' + data +
                                    '</tbody>') : false;
                            }
                        }
                    },
                    language: {
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });
                $('div.head-label').html('<h6 class="mb-0">عرض البيانات الرئيسية</h6>');
            }

            // Flat Date picker
            if (dt_date_table.length) {
                dt_date_table.flatpickr({
                    monthSelectorType: 'static',
                    dateFormat: 'm/d/Y'
                });
            }

            // Delete Record
            $('.datatables-basic tbody').on('click', '.delete-record', function() {
                let that = this;
                var id = dt_basic.row($(this).parents('tr')).data().id
                var token = $("meta[name='csrf-token']").attr("content");
                Swal.fire({
                    title: 'هل انت متأكد من الحذف ؟ ',
                    text: "لن تتمكن من التراجع عن هذا!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'نعم ، احذفها!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        dt_basic.row($(that).parents('tr')).remove().draw();
                        $.ajax({
                            url: window.location.origin + "/admin/holiday_types/" + id,
                            type: 'POST',
                            data: {
                                "id": id,
                                "_method": "DELETE",
                                "_token": token,
                            },
                            success: function() {}
                        });
                        Swal.fire({
                            icon: 'success',
                            title: 'تم الحذف!',
                            text: 'تم حذف المادة الدراسية.',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    }
                });
            });
        });
    </script> --}}
@endsection
