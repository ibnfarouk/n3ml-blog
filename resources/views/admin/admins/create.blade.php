@extends('admin.layouts.app')

@section('page_title', 'Admins')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Admin</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('admin.admins.store') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
{{--                    <label for="password-confirm" class="form-label">Confirm Password</label>--}}
{{--                    <input type="text" class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" name="password-confirm">--}}
{{--                    @error('password-confirm')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
