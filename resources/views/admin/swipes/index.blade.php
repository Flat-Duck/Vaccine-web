@extends('admin.layouts.app', ['page' => 'tests'])

@section('title', 'النتائج')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">النتائج</h3>

                <a class="pull-right btn btn-sm btn-success" href="{{ route('admin.tests.create') }}">
                    إضافة نتيجة جديدة
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>النتيجة</th>
                        <th>رقم التحليل</th>
                        <th>رقم جواز السفر</th>
                        <th>تاريخ اجراء التحليل</th>
                    </tr>

                    @forelse ($tests as $k=> $test)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $test->result }}</td>
                            <td>{{ $test->number }}</td>
                            <td>{{ $test->passport }}</td>
                            <td>{{ $test->taken_at }}</td>
                            <td>
                                <a href="{{ route('admin.tests.edit', ['test' => $test->id]) }}">
                                   <span class="btn btn-warning">   <i class="fa fa-pencil-square-o"></i></span>
                                </a>

                                <form action="{{ route('admin.tests.destroy', ['test' => $test->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('هل انت متأكد من حدف هذه النتيجة?')) { this.parentNode.submit() }">
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
                {{ $tests->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
