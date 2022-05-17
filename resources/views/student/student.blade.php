@extends('layouts.app')
@section("style")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
    <link href="{{url("/panel/asset/css/jquery-confirm.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jspanel3/3.11.0/jquery.jspanel.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jspanel3/3.11.0/jquery.jspanel.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.12.0/b-2.2.3/sl-1.4.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="Editor-2.0.8/css/editor.dataTables.css">

@endsection
@section('content')

    <div class="container mt-5">
        <h2 class="mb-4 text-center">جدول دانش آموزان</h2>
        <nav class="mt-5">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">مدیریت
                </button>
                <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">افزودن
                </button>
                <button class="nav-link " id="nav-edit-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">ویرایش
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container mt-5 ">
                    <form id="AddStutentForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text"
                                       class="form-control"
                                       name="username" value="{{ old('username') }}" required autocomplete="username"
                                       autofocus>


                                <span class="invalid-feedback" role="alert">
                                </span>
                            </div>
                        </div>
                        {{--<div class="row mb-3">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control "
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email">


                                <span class="invalid-feedback" role="alert">

                            </span>

                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control"
                                       name="password" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required
                                       autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>--}}
                    </form>
                </div>
                {{--                @include('student.StudentAdd')--}}
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-edit-tab">
                <div class="container mt-5 ">
                    <form id="AddStutentForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text"
                                       class="form-control"
                                       name="username" value="{{ old('username') }}" required autocomplete="username"
                                       autofocus>

                            </div>
                        </div>

                        {{--<div class="row mb-3">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control "
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email">
                                <span class="invalid-feedback" role="alert">

                            </span>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control"
                                       name="password" required autocomplete="new-password">


                                <span class="invalid-feedback" role="alert">

                            </span>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required
                                       autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>--}}
                    </form>
                </div>
                {{--                @include('student.StudentEdit')--}}
            </div>
        </div>
        {{--        <button  data-original-title="Detail" class="btn btn-primary mr-1 btn-sm saveArticle">ثبت مقاله<span class="fas fa-eye"></span></button>--}}

    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> confirm </h5>
                </div>
                <div class="modal-body">
                    are you want to remove this data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="ok_button" name="ok_button" class="btn btn-danger">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.0/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.0/datatables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <!-- extra js https://www.ukincomeinvestor.co.uk/Editor-PHP-1.8.1/examples/extensions/exportButtons.html -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>

    <!-- HIGHCHARTS -->
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/no-data-to-display.js"></script>

    <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.12.0/b-2.2.3/sl-1.4.0/datatables.min.js"></script>
    <script type="text/javascript" src="/panel/asset/js/dataTables.editor.js"></script>

    {{--    <script src="/panel/asset/js/datatabel_student.js"></script>--}}
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jspanel3/3.11.0/jquery.jspanel-compiled.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jspanel3/3.11.0/jquery.jspanel-compiled.min.js"></script>
    <script type="text/javascript">

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
            // $('.yajra-datatable').on('click', 'tbody td:not(:first-child)', function (e) {
            //     editor.inline(this, {
            //         submit: 'allIfChanged'
            //     });
            // });
        });

        /*       function editClick(obj) {
                   var rowID = $(obj).attr('id');
                   var employeeID = $(obj).closest('tr').find('td:first').html();
                   console.log(employeeID)
               }*/

        $(document).ready(function () {
            $('.savearticle').click(function () {
                $.jsPanel({
                    paneltype: 'modal',
                    headerTitle: 'ثبت مقاله',
                    theme: 'success',
                    show: 'animated fadeInDownBig',
                    contentOverflow: 'scroll',
                    contentAjax: '{{route('articles.create')}}',
                    position: 'center -100 -100',
                    autoresize: true,
                    contentSize: {width: '95.0em', height: '38.0em'},
                    footerToolbar: [
                        '<button type="submit" class="btn btn-primary">{{ __('ثبت نام') }}</button>',
                        // '<span class="jsPanel-ftr-btn bus"><i class="fad fa-bus"></i></span>',
                        // '<span class="jsPanel-ftr-btn train"><i class="fad fa-train"></i></span>',
                        // '<span class="jsPanel-ftr-btn car"><i class="fad fa-car"></i></span>',
                    ],
                    callback: function (panel) {
                        $("input:first", this).focus();
                        $("button", this.content).click(function () {
                            panel.close()
                        });
                    }
                });
            });
        });
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
        var user_id;
        $(document).on('click', '.delete', function () {
            // var rowID = $(obj).attr('id');
            user_id = $(this).attr('id');
            // console.log(user_id)
            $('#confirmModel').modal('show');
        });
        $('#ok_button').click(function () {
            $.ajax({
                url: 'students/delete/' + user_id,
                beforeSend: function () {
                    $('#ok_button').text('Deleting...')

                },
                success: function (data) {
                    console.log("data");
                    setTimeout(function () {
                        console.log(data);
                        $('#confirmModel').modal('toggle');
                        $('#user_table').DataTable().ajax.reload();

                        // $('#confirmModel').close();
                    }, 200);
                }
            })
        });
        $('.edit').click(function () {
            $('#nav-edit-tab').addClass('active')

        })
        // $('.edit').on('click', function () {
        //     $('.nav-tabs').removeClass('.disabled');
        // })
    </script>
@endsection
