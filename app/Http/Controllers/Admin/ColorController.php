<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{

    public function list()
    {
        $catgs = Color::get();
        return view('admin.color.list', ['catgs' => $catgs]);
    }

    public function add()
    {
        return view('admin.color.add');
    }

    public function create(CreateColorRequest $request)
    {

        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status;
        $color->is_delete = 0;
        $color->created_by = auth()->user()->id;
        $color->save();
        return redirect()->route('color.list')->with('success', 'New Brand has been added Successfully!');
    }

    public function edit($id)
    {
        $cat = Color::getSingleColor($id);
        return view('admin.color.edit', ['cat' => $cat]);
    }

    public function update(UpdateColorRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $color = Color::getSingleColor($id);
            $color->name = $request->name;
            $color->code = $request->code;
            $color->status = $request->status;
            $color->is_delete = 0;
            $color->created_by = auth()->user()->id;
            $color->save();
            DB::commit();
            return redirect()->route('color.list')->with('success', 'Brand has been deleted Successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("message: " . $e->getMessage());
            return redirect()->back()->with('error', 'smth went wrong');
        }
    }

    public function delete($id)
    {
        Color::getSingleColor($id)->delete();
        return redirect()->route('color.list')->with('success', 'Brand has been deleted Successfully!');
    }
}
