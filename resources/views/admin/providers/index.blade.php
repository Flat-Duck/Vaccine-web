@extends('admin.layouts.app', ['page' => 'provider'])

@section('title', 'posts')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">posts</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.posts.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>User Name</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($posts as $k=> $provider)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $provider->name }}</td>
                            <td>{{ $provider->phone }}</td>
                            <td>{{ $provider->user_name }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', ['provider' => $provider->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.posts.destroy', ['provider' => $provider->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                       <span class="btn btn-danger">    <i class="fa fa-trash-o"></i></span>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No records found</td>
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
