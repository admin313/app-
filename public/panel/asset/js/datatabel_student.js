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
