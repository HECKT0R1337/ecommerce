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
        $catgs = Product::get();
        return view('admin.product.list', ['catgs' => $catgs], $data);
    }


    public function add()
    {
        $data['header_title'] = 'Add product';
        $products = Product::get();

        return view('admin.product.add', $data, ['products' => $products]);
    }

    static function checkSlug($slug){
        return Product::where('slug', $slug)->count();
    }
    public function create(Request $request)
    {
        $data['header_title'] = 'Create product';
        $title = trim($request->title);
        $slug = Str::slug($title, '-');
        $checkSlug = Product::checkSlug($slug);

        $product = [
            'title' => trim($title),
            'category_id' => 1,
            'sub_category_id' => 1,
            'brand_id' => 1,
            'old_price' => 1,
            'price' => 1,
            'slug' => $slug,
            'created_by' => auth()->user()->id
        ];

        $added = Product::create($product);
        
        // if (empty($checkSlug)) {
        //     $slug = Str::slug($title, '-');
        //     $added = Product::create($product);
        // } else {
        //     $slug = $slug . '-' . $added->id;
        //     $added = Product::create($product);
        // }


        if (Product::where('slug', $slug)->exists()) {
            $finalSlug = $slug . '-' . $added->id;
            $added->slug = $finalSlug;
            $added->save();
        }

        if ($added) {
            return redirect()->route('product.list')->with('success', 'New product has been added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something wrong has just happened!');
        }
    }

    public function edit($id)
    {
        $data['header_title'] = 'Add product';
        $cat = Product::where('id', $id)->firstOrFail();
        $products = Product::get();
        return view('admin.product.edit', $data, ['cat' => $cat, 'products' => $products]);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $data['header_title'] = 'Create product';
        try {
            DB::beginTransaction();
            $product = [
                'name' => trim($request->name),
                'category_id' => trim($request->category_id),
                'slug' => trim($request->slug),
                'meta_title' => trim($request->meta_title),
                'meta_description' => trim($request->meta_description),
                'meta_keywords' => trim($request->meta_keywords),
                'status' => trim($request->status),
                'created_by' => auth()->user()->id,
            ];

            $updated = Product::where('id', $id)->update($product);
            if ($updated) {
                DB::commit();
                return redirect()->route('product.list')->with('success', 'product has been updated Successfully!');
            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'No changes were made.')->withInput();
            }
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
