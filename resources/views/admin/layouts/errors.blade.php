@if ($errors->any())  {{-- هر نوع خطایی --}}
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)  {{-- all error تمامی خطا ها بگیر --}}
        <li class="text-center">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
