@extends('admin.layouts.app', ['page' => 'vaccines'])

@section('title', 'اللقاحات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">اللقاحات</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.vaccines.create') }}">
                    إضافة لقاح جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>اسم اللقاح</th>
                        <th>رمز</th>
                        <th>تاريخ الصلاحية</th>
                    </tr>

                    @forelse ($vaccines as $k=> $vaccine)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $vaccine->name }}</td>
                            <td>{{ $vaccine->code }}</td>
                            <td>{{ $vaccine->date }}</td>
                            
                            <td>
                                <a href="{{ route('admin.vaccines.edit', ['vaccine' => $vaccine->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.vaccines.destroy', ['vaccine' => $vaccine->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('هل انت متأكد من حدف اللقاح?')) { this.parentNode.submit() }">
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
                {{ $vaccines->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
