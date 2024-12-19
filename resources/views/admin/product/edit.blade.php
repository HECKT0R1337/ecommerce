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
                        <form action="{{ route('product.update', $cat->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="mb-3"> <label for="inputname" class="form-label">Product Title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name='title' value="{{ $cat->title }}" class="form-control"
                                        placeholder="Category name" id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('title') }}</div>
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
