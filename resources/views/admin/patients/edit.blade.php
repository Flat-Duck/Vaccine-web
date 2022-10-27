@extends('admin.layouts.app', ['page' => 'patients'])

@section('title', 'تعديل حالة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل حالة</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.patients.update', ['patient' => $patient->id]) }}">
                @csrf
                @method('PUT')
            
                <div class="box-body">
                    <div class="form-group">
                        <label for="passport">رقم الجواز</label>
                        <input type="text"
                            class="form-control"
                            name="passport"
                            required
                            placeholder="رقم الجواز"
                            value="{{ old('passport',$patient->passport) }}"
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
                            value="{{ old('phone',$patient->phone) }}"
                            id="phone"
                        >
                    </div>
                    <!-- <div class="form-group">
                        <label for="username">إسم المستخدم</label>
                        <input type="text"
                            class="form-control"
                            name="username"
                            required
                            placeholder="إسم المستخدم"
                            value="{{ old('username',$patient->username) }}"
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
                    </div> -->
                    <div class="form-group">
                        <label for="date_birth">تاريخ الميلاد</label>
                        <input type="date"
                            class="form-control"
                            name="date_birth"
                            required
                            placeholder=""
                            value="{{ old('date_birth',$patient->date_birth) }}"
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
                            value="{{ old('blood',$patient->blood) }}"
                            id="blood"
                        >
                    </div>
                    <div class="form-group">
                        <label for="gender">الجنس</label>
                        <select  id="gender" name="gender" class="form-control">
                            <option  value="ذكر"  {{ 'ذكر' == old('gender',$patient->gender) ? ' selected="selected"' : '' }} }}>
                                ذكر</option>
                            
                            <option value="أنثى"  {{ 'أنثى' == old('gender',$patient->gender) ? ' selected="selected"' : '' }} }}>
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
                            value="{{ old('wieght',$patient->wieght) }}"
                            id="wieght"
                        >
                    </div>

                    <div class="form-group">
                        <label for="status">الحالة</label>
                        <select  id="status" name="status" class="form-control">
                            @foreach($status as $k=> $st)
                                <option value="{{ $st }}" {{ $st == old('status',$patient->status) ? ' selected="selected"' : '' }} }}>{{ $st}}</option>
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
                            value="{{ old('address',$patient->address) }}"
                            id="address"
                        >
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.patients.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
