<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{

    public function list()
    {
        $catgs = Brand::get();
        return view('admin.brand.list', ['catgs' => $catgs]);
    }

    public function add()
    {
        return view('admin.brand.add');
    }

    public function create(CreateBrandRequest $request)
    {

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->status = $request->status;
        $brand->is_delete = 0;
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->meta_keywords = $request->meta_keywords;
        $brand->created_by = auth()->user()->id;
        $brand->save();
        return redirect()->route('brand.list')->with('success', 'New Brand has been added Successfully!');
    }

    public function edit($id)
    {
        $cat = Brand::getSingleBrand($id);
        return view('admin.brand.edit', ['cat' => $cat]);
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $brand = Brand::getSingleBrand($id);
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->is_delete = 0;
            $brand->meta_title = $request->meta_title;
            $brand->meta_description = $request->meta_description;
            $brand->meta_keywords = $request->meta_keywords;
            $brand->created_by = auth()->user()->id;
            $brand->save();
            DB::commit();
            return redirect()->route('brand.list')->with('success', 'Brand has been deleted Successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("message: " . $e->getMessage());
            return redirect()->back()->with('error', 'smth went wrong');
        }
    }

    public function delete($id)
    {
        Brand::getSingleBrand($id)->delete();
        return redirect()->route('brand.list')->with('success', 'Brand has been deleted Successfully!');
    }




    /*
    Route::get('admin/brand/list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('admin/brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::post('admin/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('admin/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('admin/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    */
}
