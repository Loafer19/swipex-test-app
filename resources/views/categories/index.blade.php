@extends('layouts.master')

@section('page', 'Categories')

@section('content')
@include('categories.modals._create')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Categories Table</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">Create</button>
            </div>
        </div>

        <div class="box-body">
            @if ($categories->count())
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form class="form-delete" action="{{ route('categories.destroy', $item->id) }}" method="post" style="display: inline;">
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
                <h2>No categories</h2>
            @endif
        </div>

        <div class="box-footer clearfix">
            {{ $categories->links() }}
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
