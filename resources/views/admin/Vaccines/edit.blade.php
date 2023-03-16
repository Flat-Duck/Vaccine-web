@extends('admin.layouts.app', ['page' => 'vaccines'])

@section('title', 'تعديل منشور')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل منشور</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.vaccines.update', ['vaccine' => $vaccine->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    
                        <div class="form-group">
                            <label for="name">اسم اللقاح</label>
                            <input type="text"
                                class="form-control"
                                name="name"
                                required
                                placeholder="اسم اللقاح"
                                value="{{ old('name', $vaccine->name) }}"
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
                                value="{{ old('code', $vaccine->code) }}"
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
                                value="{{ old('date', $vaccine->date) }}"
                                id="date"
                            >
                        </div>
                    </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.vaccines.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
