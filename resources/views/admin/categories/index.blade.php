@extends('admin.layouts.app')

@section('page_title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Categories</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.layouts.partials.flash_messages')
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
{{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $categories->perPage()) + $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-success btn-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                            data-route="{{ route('admin.categories.destroy', $category->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No categories found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $categories->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
