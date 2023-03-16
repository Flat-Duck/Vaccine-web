@extends('admin.layouts.app', ['page' => 'tests'])

@section('title', 'تعديل نتيجة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل نتيجة</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.tests.update', ['test' => $test->id]) }}">
                @csrf
                @method('PUT')
                    <div class="box-body">
                    <div class="form-group">
                        <label for="number">رقم التحليل</label>
                        <input type="text"
                            class="form-control"
                            name="number"
                            required
                            placeholder="رقم التحليل"
                            value="{{ old('number',$test->number) }}"
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
                            value="{{ old('passport',$test->passport) }}"
                            id="passport"
                        >
                    </div>
                    <div class="form-group">
                        <label for="taken_at">تاريخ إجراء التحليل</label>
                        <input type="date"
                            class="form-control"
                            name="taken_at"
                            required
                            placeholder="تاريخ إجراء التحليل"
                            value="{{ old('taken_at',$test->taken_at) }}"
                            id="taken_at"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.tests.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
