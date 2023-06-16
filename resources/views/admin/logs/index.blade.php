@extends('admin.layouts.master')
@section('title' , 'لیست لاگ ها')

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

                <iframe style="border-width: 0;width: 100%;height: 1000px"
                        src="{{ route('log-viewer::dashboard') }}" frameborder="0"></iframe>
            </div>
        </div>
    </main>
    <!-- end::main content -->

@endsection

