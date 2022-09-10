<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ret['data'] = Category::leftJoin('site', 'site.id', 'category.site_id')
            ->get();

        $ret['site'] = Site::all();
        // dd($ret);

        return view('category.index', $ret);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'category_name' => 'required|max:255',
                'site_id' => 'required'
            ]);

            Category::create([
                'category_name' => $request->category_name,
                'site_id' => $request->site_id
            ]);

            return redirect('category')->with(['success' => 'Berhasil menambahkan data kategori']);
        } catch (Exception $e) {
            return redirect('category')->with(['error' => $e->getMessage()]);
        }
    }
}
