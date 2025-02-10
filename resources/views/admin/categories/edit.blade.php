@extends('admin.layouts.app')

@section('page_title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           value="{{ $category->name }}"
                    >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
