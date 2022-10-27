@extends('admin.layouts.app', ['page' => 'employees'])

@section('title', 'الموظفين')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">الموظفين</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.employees.create') }}">
                    إضافة موظف جديد
                </a>
            </div>
            <div class="box-body">
                <table id="table" class="table table-bordered">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>البريد الالكتروني</th>
                        <th>اسم المستخدم</th>
                        <th>العمليات</th>
                    </tr>
                    
                </thead>   
                    <tbody>
                    @forelse ($employees as $k=> $employee)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->username }}</td>
                            <td>
                                <a href="{{ route('admin.employees.edit', ['employee' => $employee->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.employees.destroy', ['employee' => $employee->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('هل انت متأكد من حدف الموظف?')) { this.parentNode.submit() }">
                                       <span class="btn btn-danger">    <i class="fa fa-trash-o"></i></span>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">لا توجد سجلات</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $employees->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection