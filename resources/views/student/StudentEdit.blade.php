@extends('layouts.master')
@section("style")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <form action="{{route('students.update',$student->id)}}" method="POST" id="UpdateStutentForm">
            @csrf
<input hidden value="{{$student->id}}"name="id">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ $student->email }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('username') }}</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                           name="username" value="{{ $student->username }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                           name="phone" required value="{{$student->phone}}">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm"
                       class="col-md-4 col-form-label text-md-end">{{ __('dob') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm"value="{{$student->dob}}" type="dob" class="form-control" name="dob" required>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" id="submitEdit" class="btn btn-primary">
                        {{ __('ویرایش') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function($) {
            $('body').on('click', '#submitEdit', function () {
                $.ajaxSetup({
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $data = function () {

                    var name = $('#email').val('email');
                    var email = $('#email').val('email');
                    var phone = $('#phone').val('phone');
                    var username = $('#username').val('username');
                    var dob = $('#dob').val('dob');
                    $.ajax({
                        type: "POST",
                        url: "{{ route('students.update',$student->id) }}",
                        data: {
                            name: name,
                            email: email,
                            username: username,
                            phone: phone,
                            dob: dob,
                        },
                        dataType: 'json',
                        success: function (res) {
                            $('#ajaxBookModel').html("Edit Book");
                            $('#ajax-book-model').modal('show');
                            $('#id').val(res.id);
                            $('#title').val(res.title);
                            $('#code').val(res.code);
                            $('#author').val(res.author);
                        }
                    });
                }
            });
        });
    </script>
@endsection
