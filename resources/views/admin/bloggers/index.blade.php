@extends('admin.layouts.app')

@section('page_title', 'Bloggers')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Bloggers</h3>
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
                @forelse($bloggers as $blogger)
                    <tr>
{{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $bloggers->perPage()) + $loop->iteration }}</td>
                        <td>{{ $blogger->name }}</td>
                        <td>

                            <button type="submit" class="btn btn-danger btn-sm delete-item"
                            data-route="{{ route('admin.bloggers.destroy', $blogger->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No bloggers found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $bloggers->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
