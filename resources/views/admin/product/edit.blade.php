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
                        <form action="{{ route('product.update', $product->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="inputname" class="form-label">Product Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='title' value="{{ $product->title }}"
                                            class="form-control" placeholder="Category name" id="inputname"
                                            aria-describedby="nameHelp">
                                        <div class="form-text" style="color:red">{{ $errors->first('title') }}</div>
                                    </div>

                                    <div class="mb-3 col-md-6"> <label for="inputname" class="form-label">SKU<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='sku' value="{{ $product->sku }}"
                                            class="form-control" placeholder="sku" id="inputname"
                                            aria-describedby="nameHelp">
                                        <div class="form-text" style="color:red">{{ $errors->first('sku') }}</div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="category" class="form-label">Product
                                            category<span class="text-danger">*</span></label>
                                        <select name="category_id" id="changeCategory" class="form-control" id="">
                                            @foreach ($getCategory as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6"> <label for="sub_category"
                                            class="form-label">sub_category<span class="text-danger">*</span></label>
                                        <select name="sub_category_id" id="getSubCategory" class="form-control"
                                            id="">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6"> <label for="brand_id" class="form-label">Brand Name<span
                                                class="text-danger">*</span></label>

                                        <select name="brand_id" class="form-control" id="">
                                            <option value="">Select</option>
                                            @foreach ($getBrand as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-text" style="color:red">{{ $errors->first('brand_id') }}</div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">

                                            <label>Colors<span class="text-danger">*</span></label>
                                        </div>
                                        @foreach ($getColor as $color)
                                            <div>
                                                <label><input type="checkbox" name='color_id[]'
                                                        value="{{ $color->id }}"> {{ $color->name }}</label>
                                            </div>
                                        @endforeach
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
                                                    <tbody id="addHere">
                                                        <tr>
                                                            <td><input type="text" name='size[]' class="form-control"
                                                                    placeholder="size"></td>
                                                            <td><input type="text" name='price[]' class="form-control"
                                                                    placeholder="price"></td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm addLine">Add</button>
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
                                        <input type="text" name='price' value="{{ $product->price }}"
                                            class="form-control" placeholder="Category name" id="price"
                                            aria-describedby="price">
                                        <div class="form-text" style="color:red">{{ $errors->first('title') }}</div>
                                    </div>

                                    <div class="mb-3 col-md-6"> <label for="old_price" class="form-label">SKU<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name='old_price' value="{{ $product->sku }}"
                                            class="form-control" placeholder="sku" id="old_price"
                                            aria-describedby="old_price">
                                        <div class="form-text" style="color:red">{{ $errors->first('old_price') }}</div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="short_description" class="form-label">Short
                                            description<span class="text-danger">*</span></label>
                                        <textarea id="summernote" name='short_description' value="{{ $product->short_description }}" class="form-control"
                                            placeholder="short description" id="short_description" aria-describedby="short_description">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('short_description') }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="description"
                                            class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea id="summernote1" name='description' value="{{ $product->description }}" class="form-control" placeholder="Category name"
                                            id="short_description" aria-describedby="description">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('description') }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="additional_information"
                                            class="form-label">Additional information<span
                                                class="text-danger">*</span></label>
                                        <textarea id="summernote2" name='additional_information' value="{{ $product->additional_information }}" class="form-control"
                                            placeholder="Category name" id="additional_information" aria-describedby="additional_information">
                                        </textarea>
                                        <div class="form-text" style="color:red">
                                            {{ $errors->first('additional_information') }}</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12"> <label for="shipping_returns"
                                            class="form-label">Shipping returns<span class="text-danger">*</span></label>
                                        <textarea id="summernote3" name='shipping_returns' value="{{ $product->shipping_returns }}" class="form-control"
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
                                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Enabled
                                            </option>
                                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Disabled
                                            </option>


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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>

<script>
    $('#summernote1').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>


<script>
    $('#summernote2').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>


<script>
    $('#summernote3').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('body').delegate('#changeCategory', 'change', function(e) {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/get_sub_category') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },

                dataType: "json",
                success: function(sub) {
                    $('#getSubCategory').html(sub.htmlRenderHeckt0r);

                },
                error: function(sub) {}
            });
        });




        $(document).ready(function() {
            // When "Add" button is clicked
            $('body').on('click', '.addLine', function() {
                // Define the new row HTML structure
                var newRow = `
            <tr>
                <td>
                    <input type="text" name='size[]' class="form-control" placeholder="size">
                </td>
                <td>
                    <input type="text" name='price[]' class="form-control" placeholder="price">
                </td>
                <td>
                    <button type="button" class="btn btn-success btn-sm addLine">Add</button>
                    <button type="button" class="btn btn-danger btn-sm removeLine">Remove</button>
                </td>
            </tr>
        `;

                // Append the new row to the table's <tbody>
                $('#addHere').append(newRow);
            });

            // When "Remove" button is clicked
            $('body').on('click', '.removeLine', function() {
                // Remove the closest <tr> (the current row)
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
