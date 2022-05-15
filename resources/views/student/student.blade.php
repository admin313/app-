@extends('layouts.app')
@section("style")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
    <link href="/panel/asset/css/jquery-confirm.css" rel="stylesheet">
@endsection
@section('content')

    <div class="container mt-5">
        <h2 class="mb-4 text-center">جدول دانش آموزان</h2>
        <table class="table table-bordered yajra-datatable">

            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>نام کاربری</th>
                <th>تلفن</th>
                <th>فعالیت</th>
            </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
@endsection
@section('script')

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <!-- sorting plugin reference https://datatables.net/plug-ins/sorting/natural -->
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/natural.js"></script>
    <script type="text/javascript"
            src="https://www.ukincomeinvestor.co.uk/Editor-1.8.1/js/dataTables.editor.js"></script>

    <!-- extra js https://www.ukincomeinvestor.co.uk/Editor-PHP-1.8.1/examples/extensions/exportButtons.html -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>

    <!-- HIGHCHARTS -->
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/no-data-to-display.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
    {{--    <script src="/panel/asset/js/datatabel_student.js"></script>--}}
    <script type="text/javascript">
        // $(document).off('.editStudent')
        // $(document).on('.editStudent', function () {
        //    // let item_id = $(this).attr('id')
        //     // let item_id = $(this).data('item_id');
        //
        // })
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
            $('.yajra-datatable').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this, {
                    submit: 'allIfChanged'
                });
            });
        });
        function editClick(obj) {
            var rowID = $(obj).attr('id');
            var employeeID = $(obj).closest('tr').find('td:first').html();
            console.log(employeeID)
        }
    </script>
    <script>
        $('.deleteStudent').on('click', function () {
            $.confirm({
                title: 'delete !',
                content: result.message,
                type: 'green',
                buttons: {
                    omg: {
                        text: 'Thank you!',
                        btnClass: 'btn-green',
                    },
                    close: function () {
                    }
                }
            });
        });

    </script>
@endsection
