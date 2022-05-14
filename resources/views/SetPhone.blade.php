@extends('layouts.app')
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('SetPhone') }}</div>

                    <div class="card-body">
                        <form action="{{ route('SetPhone.save') }}" method="Post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">شماره تلفن</label>
                                <input type="phone" name="phone" class="form-control" id="Phone" aria-describedby="emailHelp" placeholder="شماره تلفن">
                                <small id="phone" class="form-text text-muted">شماره تماس خود را وارد کنید</small>
                            </div>
                            @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">تبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
