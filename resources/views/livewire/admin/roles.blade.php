<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl"
                   wire:model="search"> {{-- وایر مادل یعنی فانکشنی که درون کنترلر لایووایر بنویسیم --}}
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">نام نقش</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>


        @foreach ($roles as $index => $role)  {{-- key => value --}}  {{-- name databse (not input) --}}
        <tr>
            {{-- firstItem = شمارش ردیف + دونه دونه اضافه بشه ایندکس یا کی --}}
            <td class="text-center align-middle">{{ $roles->firstItem() + $index }}</td>
            <td class="text-center align-middle">{{ $role->name }}</td>
            <td class="text-center align-middle">
                <a class="btn btn-outline-info" href="{{ route('roles.edit' , $role->id) }}">ویرایش</a> {{-- edit + id(parameters) --}}
            </td>
            <td class="text-center align-middle">
                {{ \Hekmatinasser\Verta\Verta::instance($role->created_at)->format('%d %B، %Y') }}
            </td> {{-- output دی 7، 1395 --}}
        </tr>
        @endforeach


    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{--  {{ $roles->links() }}  --}}
        {{ $roles->appends(\Illuminate\Support\Facades\Request::except('page'))->links() }}
        {{-- در صفحه 5 باشیم رفرش بشه دیگه همون صفحه میمونه برنمیگرده صفحه اول و خطا نمیده --}}
    </div>
</div>
