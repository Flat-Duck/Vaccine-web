@extends('admin.layouts.app', ['page' => ''])

@section('title', 'الملف الشخصي')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل الملف الشخصي </h3>
            </div>

            <form method="post">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            id="name"
                            placeholder="الاسم"
                            value="{{ old('name', $admin->name) }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            id="email"
                            placeholder="البريد الالكتروني"
                            value="{{ old('email', $admin->email) }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="username">اسم المستخدم</label>
                        <input type="text"
                            name="username"
                            class="form-control"
                            id="username"
                            placeholder="اسم المستخدم"
                            value="{{ old('username', $admin->username) }}"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تحديث البيانات الشخصية</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Password update --}}
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تغيير كلمة المرور</h3>
            </div>

            <form method="post" action="{{ route('admin.password_update') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="current-password">كلمة المرور الحالية</label>
                        <input type="password"
                            name="current_password"
                            class="form-control"
                            id="current-password"
                            placeholder="كلمة المرور الحالية"
                            pattern=".{6,}"
                            title="6 characters minimum"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور الجديدة</label>
                        <input type="password"
                            name="password"
                            class="form-control"
                            id="password"
                            placeholder="كلمة المرور الجديدة"
                            pattern=".{6,}"
                            title="6 characters minimum"
                        >
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">تأكيد كلمة المرور</label>
                        <input type="password"
                            name="password_confirmation"
                            class="form-control"
                            id="confirm-password"
                            placeholder="تأكيد كلمة المرور"
                            pattern=".{6,}"
                            title="6 characters minimum"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تحديث كلمة المرور</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection