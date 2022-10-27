@extends('admin.layouts.app', ['page' => 'service'])

@section('title', 'Add New Service')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Service</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.services.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file"
                            class="form-control"
                            name="icon"
                            placeholder="icon"
                            value="{{ old('icon') }}"
                            id="icon"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.services.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
