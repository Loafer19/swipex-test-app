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
                            <th>Modify</th>
                        </tr>
                            @foreach ($tasks as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('tasks.show',$item->id) }}">{{ $item->title }}</a></td>
                                    <td>{{ $item->category ? $item->category->title : '-' }}</td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form class="form-delete" action="{{ route('tasks.destroy', $item->id) }}" method="post" style="display: inline;">
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
