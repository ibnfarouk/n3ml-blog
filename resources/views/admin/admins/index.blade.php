@extends('admin.layouts.app')

@section('page_title', 'Admins')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Admins</h3>
            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary float-end">Add</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.layouts.partials.flash_messages')
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($admins as $admin)
                    <tr>
{{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $admins->perPage()) + $loop->iteration }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-success btn-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                            data-route="{{ route('admin.admins.destroy', $admin->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No admins found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $admins->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
