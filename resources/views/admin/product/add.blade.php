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
                            <div class="card-title">Add New Category</div>
                        </div>
                        <form action="{{ route('category.create') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3"> <label for="inputname" class="form-label">Category name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='name' value="{{ old('name') }}" class="form-control"
                                        placeholder="Category name" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                                <div class="mb-3"> <label for="inputname" class="form-label">Category Slug<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='slug' value="{{ old('slug') }}" class="form-control"
                                        placeholder="slug" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('slug') }}</div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">meta_title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='meta_title' value="{{ old('meta_title') }}"
                                        class="form-control" placeholder="meta_title" id="inputname"
                                        aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('meta_title') }}</div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">meta_description<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='meta_description' value="{{ old('meta_description') }}"
                                        class="form-control" placeholder="meta_description" id="inputname"
                                        aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('meta_description') }}</div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">meta_keywords<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='meta_keywords' value="{{ old('meta_keywords') }}"
                                        class="form-control" placeholder="meta_keywords" id="inputname"
                                        aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('meta_keywords') }}</div>
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
