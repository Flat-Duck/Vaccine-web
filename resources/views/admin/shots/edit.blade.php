@extends('admin.layouts.app', ['page' => 'shots'])

@section('title', 'تعديل تطعيمة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل تطعيمة</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.shots.update', ['shot' => $shot->id]) }}">
                @csrf
                @method('PUT')
                    <div class="box-body">
                    <div class="form-group">
                        <label for="number">رقم الطعم</label>
                        <input type="text"
                            class="form-control"
                            name="number"
                            required
                            placeholder="رقم الطعم"
                            value="{{ old('number',$shot->number) }}"
                            id="number"
                        >
                    </div>

                    <div class="form-group">
                        <label for="type">نوع الطعم</label>
                        <select  id="type" name="type" class="form-control">
                            <option value="الاولى"  {{ 'الاولى' == old('type',$shot->type) ? ' selected="selected"' : '' }}>الاولى</option>
                            <option value="الثانية" {{ 'الثانية' == old('type',$shot->type) ? ' selected="selected"' : '' }}>الثانية</option>
                            <option value="التعزيزية" {{ 'التعزيزية' == old('type',$shot->type) ? ' selected="selected"' : '' }}>التعزيزية</option>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="passport">رقم جواز السفر</label>
                        <input type="textarea"
                            class="form-control"
                            name="passport"
                            required
                            placeholder="رقم جواز السفر"
                            value="{{ old('passport',$shot->passport) }}"
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
                            value="{{ old('taken_at',$shot->taken_at) }}"
                            id="taken_at"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.shots.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
