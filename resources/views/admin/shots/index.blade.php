@extends('admin.layouts.app', ['page' => 'shots'])

@section('title', 'التطعيمات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">التطعيمات</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.shots.create') }}">
                    إضافة تطعيمة جديدة
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>التطعيمة</th>
                        <th>رقم الطعم</th>
                        <th>رقم جواز السفر</th>
                        <th>تاريخ اخد الطعم</th>
                    </tr>

                    @forelse ($shots as $k=> $shot)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $shot->type }}</td>
                            <td>{{ $shot->number }}</td>
                            <td>{{ $shot->passport }}</td>
                            <td>{{ $shot->taken_at }}</td>
                            <td>
                                <a href="{{ route('admin.shots.edit', ['shot' => $shot->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.shots.destroy', ['shot' => $shot->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('هل انت متأكد من حدف هذه التطعيمة?')) { this.parentNode.submit() }">
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
                {{ $shots->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
