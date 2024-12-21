<?php


namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{


    public function list()
    {
        $data['header_title'] = 'product';
        $getRecord = Product::getRecord();
        return view('admin.product.list', ['getRecord' => $getRecord], $data);
    }


    public function add()
    {
        $data['header_title'] = 'Add product';
        $products = Product::get();

        return view('admin.product.add', $data, ['products' => $products]);
    }

    // static function checkSlug($slug)
    // {
    //     return Product::where('slug', $slug)->count();
    // }
    public function create(Request $request)
    {
        $data['header_title'] = 'Create product';
        $title = trim($request->title);
        $slug = Str::slug($title, '-');

        $product = new Product();
        $product->title = trim($title);
        $product->category_id = 1;
        $product->sub_category_id = 1;
        $product->brand_id = 1;
        $product->old_price = 1;
        $product->price = 1;
        $product->slug = $slug;
        $product->created_by = 1;
        $product->save();
        // dd($product->id);
        if (Product::where('slug', $slug)->exists()) {
            $finalSlug = $slug . '-' . $product->id;
            $product->slug = $finalSlug;
            $product->save();
        }
        return redirect()->route('product.list')->with('success', 'New product has been added Successfully!');
    }



    public function edit($id)
    {
        $data['header_title'] = 'Add product';
        $product = Product::where('id', $id)->firstOrFail();
        $getCategory = CategoryModel::getSingleCategory();
        $getBrand = Brand::get();
        $getColor = Color::get();
        $productColor = ProductColor::where('product_id',$id)->get();

        $data['product'] = $product;
        $data['getCategory'] = $getCategory;
        $data['getBrand'] = $getBrand;
        $data['getColor'] = $getColor;
        $data['getProductColor'] = $productColor;

        return view('admin.product.edit', $data);
    }


    public function update(UpdateProductRequest $request, $id)
    {

        // dd($request->all());
        $data['header_title'] = 'Create product';

        $title = trim($request->title);
        $slug = Str::slug($title, '-');


        if (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $finalSlug = $slug . '-' . $id;
        } else {
            $finalSlug = $slug;
        }

        try {
            DB::beginTransaction();
            $product = Product::where('id', $id)->first();

            $product->title = $title;
            $product->sku = $request->sku;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->description = trim($request->description);
            $product->short_description = trim($request->short_description);
            $product->additional_information = trim($request->additional_information);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = $request->status;

            //color to be moved to other table(ProductColor)
            $product->old_price = $request->old_price;
            $product->price = $request->price;
            $product->slug = $finalSlug;
            $product->created_by = auth()->user()->id;
            $product->save();

            //always delete old product colors.
            ProductColor::where('product_id', $id)->delete();
            //add new product colors
            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color) {
                    $productColor = new ProductColor();
                    $productColor->product_id = $id;
                    $productColor->color_id = $color;
                    $productColor->save();
                }
            }


            DB::commit();
            return redirect()->route('product.list')->with('success', 'product has been updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('product Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something unexpected happend at catch block!')->withInput();
        }
    }


    public function delete($id)
    {
        $deleted = Product::getSingleProduct($id)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'product has been deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something wrong has just happened!');
        }
    }
}
