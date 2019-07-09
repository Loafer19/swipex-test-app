@extends('layouts.master')

@section('page', 'Tasks')

@section('content')
@include('tasks\modals\_create')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tasks Table</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">Create</button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if ($tasks->count())
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Completed</th>
                            <th>Modify</th>
                        </tr>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('tasks.show',$task->id) }}">{{ $task->title }}</a></td>
                                    <td>{{ $task->category ? $task->category->title : '-' }}</td>
                                    <td>{!! $task->complete ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>' !!}</td>

                                    <td>
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
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            @else
                <h2>No tasks</h2>
            @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        let error = "{{ $errors->any() }}";

        if (error === "1") {
            $('#createModal').modal();
        }
    </script>

@endsection
