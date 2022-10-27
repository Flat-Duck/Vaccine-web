@extends('admin.layouts.app', ['page' => 'centers'])

@section('title', 'تعديل مركز')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل مركز</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.centers.update', ['center' => $center->id]) }}">
                @csrf
                @method('PUT')
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">اسم المركز</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="اسم المركز"
                            value="{{ old('name', $center->name) }}"
                            id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="address">موقع المركز</label>
                        <input type="text"
                            class="form-control"
                            name="address"
                            required
                            placeholder="موقع المركز"
                            value="{{ old('address', $center->address) }}"
                            id="address"
                        >
                    </div>
                    <div class="form-group">
                        <label for="capacity">القدرة الاستعابية</label>
                        <input type="text"
                            class="form-control"
                            name="capacity"
                            required
                            placeholder="القدرة الاستعابية"
                            value="{{ old('capacity', $center->capacity) }}"
                            id="capacity"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.centers.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
