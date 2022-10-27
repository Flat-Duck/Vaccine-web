@extends('admin.layouts.app', ['page' => 'posts'])

@section('title', 'المنشورات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">المنشورات</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.posts.create') }}">
                    إضافة منشور جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>المحتوى</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($posts as $k=> $post)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $post->title }}</td>
                            <td>@php echo substr($post->body, 0, 50);  @endphp ....</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('هل انت متأكد من حدف المنشور?')) { this.parentNode.submit() }">
                                       <span class="btn btn-danger">    <i class="fa fa-trash-o"></i></span>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">لا توجد سجلات</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $posts->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
