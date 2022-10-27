@extends('admin.layouts.app', ['page' => 'employees'])

@section('title', 'تعديل موظف')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل موظف</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.employees.update', ['employee' => $employee->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الاسم"
                            value="{{ old('name', $employee->name) }}"
                            id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="رقم الهاتف"
                            value="{{ old('phone', $employee->phone) }}"
                            id="phone"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="text"
                            class="form-control"
                            name="email"
                            required
                            placeholder="البريد الالكتروني"
                            value="{{ old('email', $employee->email) }}"
                            id="email"
                        >
                    </div>
                    <div class="form-group">
                        <label for="username">اسم المستخدم</label>
                        <input type="text"
                            class="form-control"
                            name="username"
                            required
                            placeholder="اسم المستخدم"
                            value="{{ old('username', $employee->username) }}"
                            id="username"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.employees.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
