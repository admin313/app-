@extends('layouts.app')
@section("style")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">

@endsection
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">جدول دانش آموزان</h2>
    <button class="btn btn-primary example-1" id="complexConfirm">Click me</button>
    <table class="table table-bordered yajra-datatable">

        <thead>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" id="btnSend">show</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">update</a>
            </li>


        </ul>
        <tr>
            <th>ردیف</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>نام کاربری</th>
            <th>تلفن</th>
        </tr>
        </thead>
        <tbody class="text-center">
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="/panel/asset/js/fremwork/jquery-confirm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $('.example-1').on('click', function(){
        $.confirm({
            icon: 'fa fa-smile-o',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'blue',
        });
    });
    $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'username', name: 'username'},
                {data: 'phone', name: 'phone'},

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]

        });
        $('.yajra-datatable').on( 'click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this, {
                submit: 'allIfChanged'
            });
        });

    });

</script>

@endsection
