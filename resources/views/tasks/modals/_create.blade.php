<div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Task</h4>
            </div>

            <form action="{{ route('tasks.store') }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="Enter Task Title" name="title" value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <textarea class="form-control" placeholder="Enter Task Description" name="description" rows="5">{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                        <select class="form-control" name="category_id">
                            <option selected hidden disabled>Select category</option>

                            <option value="">Without category</option>

                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : null}}>{{ $item->title }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('category_id'))
                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
