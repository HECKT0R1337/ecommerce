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
                            <div class="card-title text-primary"> <h3> Edit Sub Category</h3></div>
                        </div>
                        <form action="{{ route('sub_category.update', $cat->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="mb-3"> <label for="inputname" class="form-label">Sub Category name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='name' value="{{ $cat->name }}" class="form-control"
                                        placeholder="Category name" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('name') }}</div>
                                </div>


                                <div class="form-group">
                                    <label for="status">pick category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $cat->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3"> <label for="inputname" class="form-label">Sub Category Slug<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='slug' value="{{ $cat->slug }}" class="form-control"
                                        placeholder="slug" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:rgb(114, 85, 85)">{{ $errors->first('slug') }}</div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">Sub meta_title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='meta_title' value="{{ $cat->meta_title }}"
                                        class="form-control" placeholder="meta_title" id="inputname"
                                        aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('meta_title') }}</div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">meta_description<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='meta_description' value="{{ $cat->meta_description }}"
                                        class="form-control" placeholder="meta_description" id="inputname"
                                        aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('meta_description') }}</div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">meta_keywords<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='meta_keywords' value="{{ $cat->meta_keywords }}"
                                        class="form-control" placeholder="meta_keywords" id="inputname"
                                        aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('meta_keywords') }}</div>
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ $cat->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $cat->status == 0 ? 'selected' : '' }}>Inactive
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
