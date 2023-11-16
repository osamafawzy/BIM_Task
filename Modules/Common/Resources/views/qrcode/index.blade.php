@php
    $currentDate = date('Y-m-d');
    // phpinfo();
@endphp
@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> الرمز التعريفي للحضور</h4>
            </div>
            <div class="card-body">
                {{-- <div id="printcont" class="mb-5">
                {!! QrCode::size(700)->generate($currentDate) !!}

                </div> --}}
                <div id="printcont" class="mb-5">
{{--                    <img src="data:image/png;base64, {!! base64_encode(--}}
{{--                        QrCode::format('png')->size(700)->generate($currentDate),--}}
{{--                    ) !!} ">--}}
                    {{QrCode::size(700)->generate($currentDate)}}
                </div>
{{--                <a class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true"--}}
{{--                    href="data:image/png;base64, {!! base64_encode(--}}
{{--                        QrCode::format('png')->size(700)->generate($currentDate),--}}
{{--                    ) !!} " download>تحميل</a>--}}

                <a onclick="printDiv()" href="#" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                    aria-disabled="true">
                    طباعة</a>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
    @if (session('updated'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم تعديل البيانات بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    {{-- <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
CKEDITOR.replace('about');
CKEDITOR.replace('terms');

</script> --}}

    <script>
        function printDiv() {
            var divContents = document.getElementById("printcont").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
