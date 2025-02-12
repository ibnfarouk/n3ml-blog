@extends('website.layouts.app')
@include('website.layouts.partials.main_header')
@section('content')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <h3>Create post</h3>
                <form action="{{ route('website.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ old('title') }}"/>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" name="published_at" value="{{ old('published_at') }}"/>
                        @error('published_at')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10">{{ old('content') }}</textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                            <option value="">Select Tags</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" />
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
            </div>
        </div>
    </div>
@endsection
