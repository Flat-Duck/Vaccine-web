@extends('admin.layouts.app', ['page' => 'vaccines'])

@section('title', 'إضافة منشور جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة منشور جديد</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.vaccines.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">اسم اللقاح</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="اسم اللقاح"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="code">رمز اللقاح</label>
                        <input type="text"
                            class="form-control"
                            name="code"
                            required
                            placeholder="رمز اللقاح"
                            value="{{ old('code') }}"
                            id="code"
                        >
                    </div>
                    <div class="form-group">
                        <label for="date">تاريخ الصلاحية</label>
                        <input type="date"
                            class="form-control"
                            name="date"                            
                            required
                            placeholder="تاريخ الصلاحية"
                            value="{{ old('date') }}"
                            id="date"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>

                    <a href="{{ route('admin.vaccines.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
