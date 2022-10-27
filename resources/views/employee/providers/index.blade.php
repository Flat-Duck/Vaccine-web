@extends('admin.layouts.app', ['page' => 'provider'])

@section('title', 'Providers')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Providers</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.providers.create') }}">
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

                    @forelse ($providers as $k=> $provider)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $provider->name }}</td>
                            <td>{{ $provider->phone }}</td>
                            <td>{{ $provider->user_name }}</td>
                            <td>
                                <a href="{{ route('admin.providers.edit', ['provider' => $provider->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.providers.destroy', ['provider' => $provider->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        <i class="fa fa-trash-o"></i>
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
                {{ $providers->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
