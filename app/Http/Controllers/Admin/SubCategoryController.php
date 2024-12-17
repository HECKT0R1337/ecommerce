<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{


    public function list()
    {
        $data['header_title'] = 'SubCategory';
        $catgs = SubCategory::get();


        return view('admin.subcategory.list', ['catgs' => $catgs], $data);
    }


    public function add()
    {
        $data['header_title'] = 'Add SubCategory';
        $categories = CategoryModel::get();

        return view('admin.subcategory.add', $data, ['categories' => $categories]);
    }

    public function create(CreateSubCategoryRequest $request)
    {
        $data['header_title'] = 'Create SubCategory';
        $subcategory = [
            'slug' => trim($request->slug),
            'name' => trim($request->name),
            'category_id' => trim($request->category_id),
            'status' => trim($request->status),
            'meta_title' => trim($request->meta_title),
            'meta_description' => trim($request->meta_description),
            'meta_keywords' => trim($request->meta_keywords),
            'meta_keywords' => trim($request->category_id),
            'created_by' => auth()->user()->id
        ];

        $added = SubCategory::create($subcategory);
        if ($added) {
            return redirect()->route('sub_category.list')->with('success', 'New SubCategory has been added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something wrong has just happened!');
        }
    }

    public function edit($id)
    {
        $data['header_title'] = 'Add SubCategory';
        $cat = SubCategory::where('id', $id)->firstOrFail();
        $categories = CategoryModel::get();
        return view('admin.subcategory.edit', $data, ['cat' => $cat, 'categories' => $categories]);
    }


    public function update(UpdateSubCategoryRequest $request, $id)
    {
        $data['header_title'] = 'Create SubCategory';
        try {
            DB::beginTransaction();
            $subcategory = [
                'name' => trim($request->name),
                    'category_id' => trim($request->category_id),
                    'slug' => trim($request->slug),
                    'meta_title' => trim($request->meta_title),
                    'meta_description' => trim($request->meta_description),
                    'meta_keywords' => trim($request->meta_keywords),
                    'status' => trim($request->status),
                    'created_by' => auth()->user()->id,
            ];

            $updated = SubCategory::where('id', $id)->update($subcategory);
            if ($updated) {
                DB::commit();
                return redirect()->route('sub_category.list')->with('success', 'SubCategory has been updated Successfully!');
            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'No changes were made.')->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('SubCategory Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something unexpected happend at catch block!')->withInput();
        }
    }


    public function delete($id)
    {
        $deleted = SubCategory::getSingleSubCategory($id)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'SubCategory has been deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something wrong has just happened!');
        }
    }
}
