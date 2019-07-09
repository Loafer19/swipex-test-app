@extends('layouts.master')

@section('page', 'Categories')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Category edit</h3>
            <div class="box-tools">
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">Back to all</a>
            </div>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @method('PATCH')
            @csrf

            <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label>Category Title</label>
                    <input type="text" class="form-control" placeholder="Enter Category Title" name="title" value="{{ old('title', $category->title) }}">

                    @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
