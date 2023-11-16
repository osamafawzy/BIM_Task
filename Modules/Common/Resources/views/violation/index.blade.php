@php
    $admin = Auth::user();
    // dd($admin);
@endphp
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end mb-2">
                    <a class="btn btn-primary p-1" href="violations/create" role="button"> اضافة جديد</a>

                </div>
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الادوات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($violation as $data)
                                <tr>
                                    @if ($data->violation_id === null)
                                        <td>
                                            <ul id="myUL">
                                                <li><span class="caret">
                                                        {{ $data->title }}
                                                    </span>

                                                    <ul class="nested mt-1">
                                                        @foreach ($data->childs as $child)
                                                            <li class="mb-1">
                                                                {{ $child->title }}
                                                                <span class="ms-1">

                                                                    <a href="#" class="delete-record me-5"
                                                                        data-id="{{ $child->id }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </a>

                                                                    <a class="item-edit pe-1"
                                                                        href="violations/{{ $child->id }}/edit"><i
                                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    @endif
                                    @if ($data->violation_id === null)
                                        <td>
                                            <div class="d-flex">

                                                <a href="#" class="delete-record me-5" data-id="{{ $data->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>

                                                <a class="item-edit pe-1" href="violations/{{ $data->id }}/edit"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                            </div>

                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="mx-auto pb-10 w-4/5 d-flex justify-content-between ">
        <div>
            Showing {{ $violation->firstItem() }} to {{ $violation->lastItem() }}
            of {{ $violation->total() }} entries
        </div>
        <div>
        {!! $violation->withQueryString()->links() !!}
    </div>
    </div>
    
    {{-- {{  }} --}}

    <!--/ Basic table -->
@endsection


@section('js')
    @include('common::includes.datatable')


    {{--    <script src="{{asset('')}}admin/js/scripts/tables/table-datatables-basic.js"></script> --}}

    {{-- <script src="{{asset('')}}js/subjects/script.js"></script> --}}

    @if (session('updated'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم تعديل المخالفة بنجاح',
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
                text: 'لقد تم انشاء المخالفة بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    <script>
        $(function() {
            'use strict';
            $('.delete-record').on('click', function() {
                var id = $(this).data("id")
                var token = $("meta[name='csrf-token']").attr("content");
                console.log(token);
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

                        $.ajax({
                            url: window.location.origin + "/admin/violations/" + id,
                            type: 'POST',
                            data: {
                                "id": id,
                                "_method": "DELETE",
                                "_token": token,
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'تم الحذف!',
                                    text: 'تم حذف المخالفة بنجاح.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function(result) {
                                    location.reload();
                                })
                            }
                        });

                    }
                });
            });
        });
        var toggler = document.getElementsByClassName("caret");
        var k;
        // console.log(toggler)
        for (k = 0; k < toggler.length; k++) {
            toggler[k].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active2");
                this.classList.toggle("caret-down");
            });
        }
    </script>
@endsection
