@extends('admin.layouts.app', ['page' => 'patients'])

@section('title', 'الحالات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">الحالات</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.patients.create') }}">
                    إضافة حالة جديدة
                </a>
            </div>
            <div class="box-body">
            <table id="table"  class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>رقم الجواز</th>
                        <th>رقم الهاتف</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                    </tr>
</thead>
<tbody>
    
    @forelse ($patients as $k=> $patient)
    <tr>
        <td>{{ $k+1}}</td>
        <td>{{ $patient->passport }}</td>
        <td>{{ $patient->phone }}</td>
        <td>{{ $patient->status }}</td>
        <td>
            <a href="{{ route('admin.patients.show', ['patient' => $patient->id]) }}">
                <span class="btn btn-info"> <i class="fa fa-eye"></i></span>
            </a>
            <a href="{{ route('admin.patients.edit', ['patient' => $patient->id]) }}">
                <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
            </a>
            
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">لا توجد سجلات</td>
    </tr>
    @endforelse
</tbody>
</table>
            </div>

            <div class="box-footer clearfix">
                {{ $patients->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
