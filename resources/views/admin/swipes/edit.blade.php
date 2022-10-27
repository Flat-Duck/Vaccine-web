@extends('admin.layouts.app', ['page' => 'swipes'])

@section('title', 'تعديل نتيجة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل نتيجة</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.swipes.update', ['swipe' => $swipe->id]) }}">
                @csrf
                @method('PUT')
                    <div class="box-body">
                    <div class="form-group">
                        <label for="number">رقم المسحة</label>
                        <input type="text"
                            class="form-control"
                            name="number"
                            required
                            placeholder="رقم المسحة"
                            value="{{ old('number',$swipe->number) }}"
                            id="number"
                        >
                    </div>
                    <div class="form-group">
                        <label for="passport">رقم جواز السفر</label>
                        <input type="textarea"
                            class="form-control"
                            name="passport"
                            required
                            placeholder="رقم جواز السفر"
                            value="{{ old('passport',$swipe->passport) }}"
                            id="passport"
                        >
                    </div>
                    <div class="form-group">
                        <label for="taken_at">تاريخ إجراء المسحة</label>
                        <input type="date"
                            class="form-control"
                            name="taken_at"
                            required
                            placeholder="تاريخ إجراء المسحة"
                            value="{{ old('taken_at',$swipe->taken_at) }}"
                            id="taken_at"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.swipes.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
