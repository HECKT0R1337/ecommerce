@extends('admin.layouts.app')
@section('style')
@endsection


@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4 mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add New Brand</div>
                        </div>
                        <form action="{{ route('color.create') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3"> <label for="inputname" class="form-label">Color name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='name' value="{{ old('name') }}" class="form-control"
                                        placeholder="Category name" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                                <div class="mb-3"> <label for="inputname" class="form-label">Color code<span
                                            class="text-danger">*</span></label>
                                    <input type="color" name='code' value="{{ old('code') }}" class="form-control"
                                        placeholder="color code" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('code') }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer"> <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
