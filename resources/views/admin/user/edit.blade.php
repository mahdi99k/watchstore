@extends('admin.layouts.master')
@section('title' , 'ویرایش کاربر')

@section('content')
    <main class="main-content">

        @include('admin.layouts.errors')  {{-- show eerors --}}

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش کاربر</h6>
                    <form method="POST" action="{{ route('users.update' , $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div>
                            @if (\Illuminate\Support\Facades\Session::has('message'))  {{-- flash = سشن یک بار مصرف --}}
                            <div class="alert alert-success">
                                <div>{{ Session('message') }}</div>
                            </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">موبایل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="mobile" value="{{ $user->phone }}">
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label class="col-sm-2 col-form-label">پسورد</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="password">
                            </div>
                        </div>--}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input class="col-sm-10" type="file" class="form-control-file" id="file" name="file" value="{{ $user->photo }}">
                        </div>

                        <div class="form-group row">
                            <button name="submit" type="submit" class="btn btn-info btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ویرایش
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection
