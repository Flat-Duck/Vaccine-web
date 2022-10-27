@extends('admin.layouts.app', ['page' => 'posts'])

@section('title', 'تعديل منشور')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل منشور</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.posts.update', ['post' => $post->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">العنوان</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="العنوان"
                            value="{{ old('title', $post->title) }}"
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
                            value="{{ old('body', $post->body) }}"
                            id="body"
                        >
                    </div>                    

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">تعديل</button>

                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default">
                        إالغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
