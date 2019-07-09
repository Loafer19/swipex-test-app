@extends('layouts.master')

@section('page', 'Tasks')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Task info</h3>
            <div class="box-tools">
                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-default">Back to all</a>
            </div>
        </div>

        <div class="box-body">
            <h2>Title - {{ $task->title }}</h2>
            <p>Category - {{ $task->category->title }}</p>
            <p>Complete - {!! $task->complete ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>' !!}</p>
            <p>Description - {{ $task->description }}</p>
        </div>
        <div class="box-footer">
            @if (!$task->complete)
                <form class="form-delete" action="{{ route('tasks.done', $task->id) }}" method="post" style="display: inline;">
                    @method('PATCH')
                    @csrf

                    <button type="submit" class="btn btn-sm btn-info" onclick="return confirm('Are you sure?')">Complete</button>
                </form>
            @endif

            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form class="form-delete" action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: inline;">
                @method('DELETE')
                @csrf
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
