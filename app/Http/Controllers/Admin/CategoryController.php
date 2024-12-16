<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'category';
        $catgs = CategoryModel::get();

        return view('admin.category.list', ['catgs' => $catgs], $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add category';
        return view('admin.category.add', $data);
    }

    public function create(CreateCategoryRequest $request)
    {
        $data['header_title'] = 'Create category';

        $category = [
            'slug' => $request->slug,
            'name' => $request->name,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords
        ];

        $added = CategoryModel::create($category);
        if ($added) {
            return redirect()->route('category.list')->with('success', 'New Category has been added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something wrong has just happened!');
        }
    }

    public function edit($id)
    {
        $data['header_title'] = 'Add category';
        $cat = CategoryModel::where('id', $id)->firstOrFail();
        // dd($cat);
        return view('admin.category.edit', $data, ['cat' => $cat]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $data['header_title'] = 'Create category';

        try {
            DB::beginTransaction();
            $category = [
                'slug' => $request->slug,
                'name' => $request->name,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'status' => $request->status
            ];

            $updated = CategoryModel::where('id', $id)->update($category);
            if ($updated) {
                DB::commit();
                return redirect()->route('category.list')->with('success', 'Category has been updated Successfully!');
            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'No changes were made.')->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Category Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something unexpected happend at catch block!')->withInput();
        }
    }


    public function delete($id)
    {
        $deleted = CategoryModel::where('id', $id)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Category has been deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something wrong has just happened!');
        }
    }
}
