<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->paginate(5);
        return view('back-office.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $categories = Category::create(
            ['name' => $data['name']]
        );
        $categories->save();
        if ($categories) {
            return back()->with('seccess', 'add with seccess');
        } else {

            return back()->with('error', 'category not add');
        }
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => "please write category name",
            'name.min' => "category must be at least 3 character"
        ]);
        $update = Category::whereId($id)->update($data);
        if ($update) {
            return back()->with('seccess', 'update with seccess');
        } else {
            return back()->withInput()->with("That bai bro!");
        }
    }
    public function destroy($id)
    {
        // dd($id);
        $delete_category = Category::findOrFail($id);
        $delete_category->delete();
        if ($delete_category) {
            return back()->with("success", "Delete Successfully");
        } else {
            return back()->withInput()->with("That bai bro!");
        }
    }
}
