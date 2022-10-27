@extends('admin.layouts.app', ['page' => 'posts'])

@section('title', 'إضافة منشور جديد')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة منشور جديد</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="العنوان"
                            value="{{ old('title') }}"
                            id="title"
                        >
                    </div>
                    <div class="form-group">
                        <label for="body">المحتوى</label>
                        <input type="textarea"
                            class="form-control"
                            name="body"
                            required
                            placeholder="المحتوى"
                            value="{{ old('body') }}"
                            id="body"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>

                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
