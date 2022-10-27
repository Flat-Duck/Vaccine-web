@extends('admin.layouts.app', ['page' => 'patients'])

@section('title', 'إضافة حالة جديدة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة حالة جديدة</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.patients.store') }}">
                @csrf

                
                <div class="box-body">
                    <div class="form-group">
                        <label for="passport">رقم الجواز</label>
                        <input type="text"
                            class="form-control"
                            name="passport"
                            required
                            placeholder="رقم الجواز"
                            value="{{ old('passport') }}"
                            id="passport"
                        >
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="رقم الهاتف"
                            value="{{ old('phone') }}"
                            id="phone"
                        >
                    </div>
                    <div class="form-group">
                        <label for="username">إسم المستخدم</label>
                        <input type="text"
                            class="form-control"
                            name="username"
                            required
                            placeholder="إسم المستخدم"
                            value="{{ old('username') }}"
                            id="username"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="text"
                            class="form-control"
                            name="password"
                            required
                            placeholder="كلمة المرور"
                            value="{{ old('password') }}"
                            id="password"
                        >
                    </div>
                    <div class="form-group">
                        <label for="date_birth">تاريخ الميلاد</label>
                        <input type="date"
                            class="form-control"
                            name="date_birth"
                            required
                            placeholder=""
                            value="{{ old('date_birth') }}"
                            id="date_birth"
                        >
                    </div>
                    <div class="form-group">
                        <label for="blood">فصيلة الدم</label>
                        <input type="text"
                            class="form-control"
                            name="blood"
                            required
                            placeholder="فصيلة الدم"
                            value="{{ old('blood') }}"
                            id="blood"
                        >
                    </div>
                    <div class="form-group">
                        <label for="gender">الجنس</label>
                        <select  id="gender" name="gender" class="form-control">
                            <option  value="ذكر">
                                ذكر</option>
                            
                            <option value="أنثى">
                                أنثى</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="wieght">الوزن</label>
                        <input type="text"
                            class="form-control"
                            name="wieght"
                            required
                            placeholder="الوزن"
                            value="{{ old('wieght') }}"
                            id="wieght"
                        >
                    </div>

                    <div class="form-group">
                        <label for="status">الحالة</label>
                        <select  id="status" name="status" class="form-control">
                            @foreach($status as $k=> $st)
                                <option value="{{ $st}}">{{ $st}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text"
                            class="form-control"
                            name="address"
                            required
                            placeholder="العنوان"
                            value="{{ old('address') }}"
                            id="address"
                        >
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>

                    <a href="{{ route('admin.patients.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
