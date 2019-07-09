@extends('layouts.master')

@section('page', 'Categories')

@section('content')
@include('categories\modals\_create')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Categories Table</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">Create</button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if ($categories)
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Modify</th>
                        </tr>
                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

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
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            {{ $categories->links() }}
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        let error = "{{ $errors->has('title') }}";

        if (error === "1") {
            $('#createModal').modal();
        }
    </script>

@endsection
