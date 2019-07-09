@extends('layouts.master')

@section('page', 'Tasks')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Task edit</h3>
            <div class="box-tools">
                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-default">Back to all</a>
            </div>
        </div>

        <form action="{{ route('tasks.update', $task->id) }}" method="post">
            @method('PATCH')
            @csrf

            <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label>Task Title</label>
                    <input type="text" class="form-control" placeholder="Enter Task Title" name="title" value="{{ old('title', $task->title) }}">

                    @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label>Task Description</label>
                    <textarea class="form-control" placeholder="Enter Task Description" name="description" rows="5">{{ old('description', $task->description) }}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label>Task Category</label>
                    <select class="form-control" name="category_id">
                        <option selected hidden disabled>Select category</option>

                        <option value="">Without category</option>

                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('category_id', $task->category_id) == $item->id ? 'selected' : null}}>{{ $item->title }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('category_id'))
                        <span class="help-block">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
