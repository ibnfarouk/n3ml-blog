@extends('admin.layouts.app')

@section('page_title', 'Tags')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Tags</h3>
            <a href="{{ route('admin.tags.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tags as $tag)
                    <tr>
                        {{--                        (current page - 1 ) * per page + iteration --}}
                        <td>{{ ((request('page',1) - 1 ) * $tags->perPage()) + $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No tags found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $tags->links() }}
        </div>
    </div>
    <!-- /.card -->
@endsection
