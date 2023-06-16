@extends('admin.layouts.master')
@section('title' , 'لیست نقش ها')

@section('content')
    <main class="main-content">

        <div>
            @if (\Illuminate\Support\Facades\Session::has('message'))  {{-- flash = سشن یک بار مصرف --}}
            <div class="alert alert-success">
                <div>{{ Session('message') }}</div>
            </div>
            @endif
        </div>


        <div class="card">
            <div class="card-body">
                <livewire:admin.roles/>  {{-- include livewire --}}
            </div>
        </div>

    </main>
@endsection
