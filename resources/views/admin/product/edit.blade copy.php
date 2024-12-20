@extends('admin.layouts.app')
@section('style')
@endsection


@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4 mt-5">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add New Category</div>
                        </div>
                        <form action="{{ route('product.update', $cat->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="inputname" class="form-label">Product Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='title' value="{{ $cat->title }}"
                                            class="form-control" placeholder="Category name" id="inputname"
                                            aria-describedby="nameHelp">
                                        <div class="form-text" style="color:red">{{ $errors->first('title') }}</div>
                                    </div>

                                    <div class="mb-3 col-md-6"> <label for="inputname" class="form-label">SKU<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='sku' value="{{ $cat->sku }}"
                                            class="form-control" placeholder="sku" id="inputname"
                                            aria-describedby="nameHelp">
                                        <div class="form-text" style="color:red">{{ $errors->first('sku') }}</div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="category" class="form-label">Product
                                            category<span class="text-danger">*</span></label>

                                        <select name="category_id" class="form-control" id="">
                                            <option value="">Select Category</option>
                                        </select>

                                    </div>

                                    <div class="mb-3 col-md-6"> <label for="sub_category"
                                            class="form-label">sub_category<span class="text-danger">*</span></label>
                                        <select name="sub_category_id" class="form-control" id="">
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="brand_id" class="form-label">brand_id<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='brand_id' value="{{ $cat->brand_id }}"
                                            class="form-control" placeholder="brand_id" id="brand"
                                            aria-describedby="nameHelp">
                                        <div class="form-text" style="color:red">{{ $errors->first('brand_id') }}</div>
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">

                                            <label>Colors<span class="text-danger">*</span></label>
                                        </div>
                                        <div>
                                            <label><input type="checkbox" name='color_id[]'> Red</label>
                                        </div>
                                        <div>
                                            <label><input type="checkbox" name='color_id[]'> Green</label>
                                        </div>
                                        <div>
                                            <label><input type="checkbox" name='color_id[]'> Blue</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price" class="form-label mt-3">Size<span
                                                    class="text-danger">*</span></label>
                                            <div>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" name='size[]' class="form-control"
                                                                    placeholder="size"></td>
                                                            <td><input type="text" name='price[]' class="form-control"
                                                                    placeholder="price"></td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm">Add</button>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm">Remove</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name='size[]' class="form-control"
                                                                    placeholder="size"></td>
                                                            <td><input type="text" name='price[]' class="form-control"
                                                                    placeholder="price"></td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm">Remove</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name='size[]' class="form-control"
                                                                    placeholder="size"></td>
                                                            <td><input type="text" name='price[]' class="form-control"
                                                                    placeholder="price"></td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm">Remove</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="price" class="form-label">Price<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='price' value="{{ $cat->price }}"
                                            class="form-control" placeholder="Category name" id="price"
                                            aria-describedby="price">
                                        <div class="form-text" style="color:red">{{ $errors->first('title') }}</div>
                                    </div>

                                    <div class="mb-3 col-md-6"> <label for="old_price" class="form-label">SKU<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='old_price' value="{{ $cat->sku }}"
                                            class="form-control" placeholder="sku" id="old_price"
                                            aria-describedby="old_price">
                                        <div class="form-text" style="color:red">{{ $errors->first('old_price') }}</div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="short_description" class="form-label">Short
                                            description<span class="text-danger">*</span></label>
                                        <textarea name='short_description' value="{{ $cat->short_description }}" class="form-control"
                                            placeholder="Category name" id="short_description" aria-describedby="short_description">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('short_description') }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea name='description' value="{{ $cat->description }}" class="form-control"
                                            placeholder="Category name" id="short_description" aria-describedby="description">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('description') }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="additional_information" class="form-label">Additional information<span class="text-danger">*</span></label>
                                        <textarea name='additional_information' value="{{ $cat->additional_information }}" class="form-control"
                                            placeholder="Category name" id="additional_information" aria-describedby="additional_information">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('additional_information') }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="shipping_returns" class="form-label">Shipping returns<span class="text-danger">*</span></label>
                                        <textarea name='shipping_returns' value="{{ $cat->shipping_returns }}" class="form-control"
                                            placeholder="Category name" id="shipping_returns" aria-describedby="shipping_returns">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('shipping_returns') }}</div>
                                    </div>
                                </div>


                                <div class="row">
                                <div class="form-group">
                                    <label for="status">pick category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="1" {{$cat->status==1?'selected':''}}>Enabled</option>
                                        <option value="0" {{$cat->status==0?'selected':''}}>Disabled</option>

                                      
                                    </select>
                                </div>
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
