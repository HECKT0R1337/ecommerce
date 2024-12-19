<?php


namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

    static function checkSlug($slug)
    {
        return Product::where('slug', $slug)->count();
    }
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
        $product->created_by = auth()->user()->id;
        $product->save();
        // dd($product->id);
        if (Product::where('slug', $slug)->exists()) {
            $finalSlug = $slug . '-' . $product->id;
            $product->slug = $finalSlug;
            $product->save();
        }
        return redirect()->route('product.list')->with('success', 'New product has been added Successfully!');
    }

  // if ($added) {
        // } else {
        //     return redirect()->back()->with('error', 'Something wrong has just happened!');
        // }
      // if (empty($checkSlug)) {
        //     $slug = Str::slug($title, '-');
        //     $added = Product::create($product);
        // } else {
        //     $slug = $slug . '-' . $added->id;
        //     $added = Product::create($product);
        // }




    public function edit($id)
    {
        $data['header_title'] = 'Add product';
        $cat = Product::where('id', $id)->firstOrFail();
        $products = Product::get();
        return view('admin.product.edit', $data, ['cat' => $cat, 'products' => $products]);
    }


    public function update(Request $request, $id)
    {
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
            $product->category_id = 1;
            $product->sub_category_id = 1;
            $product->brand_id = 1;
            $product->old_price = 1;
            $product->price = 1;
            $product->slug = $finalSlug;
            $product->created_by = auth()->user()->id;
            $product->save();

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
