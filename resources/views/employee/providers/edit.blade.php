@extends('admin.layouts.app', ['page' => 'provider'])

@section('title', 'Edit Provider')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Provider</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.providers.update', ['provider' => $provider->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name', $provider->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="Phone"
                            value="{{ old('phone', $provider->phone) }}"
                            id="phone"
                        >
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <textarea class="form-control"
                            name="location"
                            id="location"
                            required
                            placeholder="Location"
                        >{{ old('location', $provider->location) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text"
                            class="form-control"
                            name="user_name"
                            required
                            placeholder="User Name"
                            value="{{ old('user_name', $provider->user_name) }}"
                            id="user_name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                            class="form-control"
                            name="email"
                            required
                            placeholder="User Name"
                            value="{{ old('email', $provider->email) }}"
                            id="email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                            class="form-control"
                            name="password"
                            
                            placeholder="Password"
                            id="password"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                            class="form-control"
                            name="password_confirmation"
                            
                            placeholder="Password"
                            id="password-confirmation"
                        >
                    </div>

                    <div class="form-group">
                        <label for="services">Service</label>
                        <select class="form-control"
                            name="services[]"
                            multiple
                            id="services">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ in_array($service->id, old('services', $provider->services)) ? 'selected' : '' }}
                                >
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.providers.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
