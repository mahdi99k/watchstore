@extends('admin.layouts.master')
@section('title' , 'ویرایش نقش')

@section('content')
    <main class="main-content">

        @include('admin.layouts.errors')  {{-- show eerors --}}

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش نقش</h6>
                    <form method="POST" action="{{ route('roles.update' , $role->id) }}">
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
                            <label class="col-sm-2 col-form-label">نام نقش</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="name" value="{{ $role->name }}">
                            </div>
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
