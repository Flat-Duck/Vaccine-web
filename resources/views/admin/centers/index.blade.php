@extends('admin.layouts.app', ['page' => 'centers'])

@section('title', 'مراكز التطعيم')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">مراكز التطعيم</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.centers.create') }}">
                    إضافة مركز جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>اسم المركز</th>
                        <th>العنوان</th>
                        <th>القدرة الاستعابية</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($centers as $k=> $center)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $center->name }}</td>
                            <td>{{ $center->address }}</td>
                            <td>{{ $center->capacity }}</td>
                            <td>
                                <a href="{{ route('admin.centers.edit', ['center' => $center->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.centers.destroy', ['center' => $center->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('هل انت متأكد من حدف المركز?')) { this.parentNode.submit() }">
                                       <span class="btn btn-danger">    <i class="fa fa-trash-o"></i></span>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">لا توجد سجلات</td>
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
