@extends('admin.layouts.app', ['page' => 'shots'])

@section('title', 'إضافة تطعيمة جديدة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة تطعيمة جديدة</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.shots.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="number">رقم الطعم</label>
                        <input type="text"
                            class="form-control"
                            name="number"
                            required
                            placeholder="رقم الطعم"
                            value="{{ old('number') }}"
                            id="number"
                        >
                    </div>
                    <div class="form-group">
                        <label for="type">نوع الطعم</label>
                        <select  id="type" name="type" class="form-control">
                            <option value="الاولى">الاولى</option>                            
                            <option value="الثانية">الثانية</option>
                            <option value="التعزيزية">التعزيزية</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="passport">رقم جواز السفر</label>
                        <input type="textarea"
                            class="form-control"
                            name="passport"
                            required
                            placeholder="رقم جواز السفر"
                            value="{{request('passport') ?? old('passport')}}"
                            id="passport"
                        >
                    </div>
                    <div class="form-group">
                        <label for="taken_at">تاريخ اخد الطعم</label>
                        <input type="date"
                            class="form-control"
                            name="taken_at"
                            required
                            placeholder="تاريخ اخد الطعم"
                            value="{{ old('taken_at') }}"
                            id="taken_at"
                        >
                    </div>

                
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>

                    <a href="{{ route('admin.shots.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
