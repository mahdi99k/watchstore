@extends('admin.layouts.master')
@section('title' , 'ایجاد نقش')

@section('content')

    <!-- begin::main content -->
    <main class="main-content">
        <div class="row">
            @if(Session::has('message'))
                <div class="alert alert-info">
                    <div>{{session('message')}}</div>
                </div>
            @endif
        </div>
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد نقش کاربر</h6>
                    <form role="form" method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <div class="list-group" id="list-tab" role="tablist">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">نام نقش</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control text-left" dir="rtl" name="name">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- end::main content -->

@endsection






