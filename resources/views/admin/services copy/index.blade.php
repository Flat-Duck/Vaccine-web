@extends('admin.layouts.app', ['page' => 'service'])

@section('title', 'centers')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">centers</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.centers.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($centers as $k=> $service)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $service->name }}</td>
                            <td>
                                <a href="{{ route('admin.centers.edit', ['service' => $service->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.centers.destroy', ['service' => $service->id]) }}"
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
                            <td colspan="3">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $centers->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
