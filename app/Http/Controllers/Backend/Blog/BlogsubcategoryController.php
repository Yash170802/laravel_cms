<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\blogcategory;
use App\Models\blogsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class blogsubcategoryController extends Controller
{
    //
    public function view()
    {
        $categories = blogcategory::all();
        return view('Backend.dasboard.blog.subcategory.subcategory')->with('category_id', $categories);
    }


    public function subcategory_insert(Request $request)
    {
        $id = $request->id;

        $data['status'] = 0;
        $data['massage'] = "! Oops Something Wrong Record Not Insert";

        $datainsert['category_id'] = $request->category_name;
        $datainsert['subcategory_name'] = $request->subcategory_name;
        $datainsert['status'] = $request->status;
        if ($id) {
            $save = DB::table('blogsubcategory')->where('id', $id)->update($datainsert);
            $data['status'] = 1;
            $data['massage'] = "Update Record successfully";
        } else {
            $save = DB::table('blogsubcategory')->insert($datainsert);
            $data['status'] = 1;
            $data['massage'] = "Record Insert successfully";
        }

        return json_encode($data);
    }

    public function subcategorylist()
    {

        $data = DB::table('blogsubcategory')
            ->join('blogcategory', 'blogcategory.id', 'blogsubcategory.category_id')
            ->select('blogsubcategory.*', 'blogcategory.category_name')
            ->get();
        return Datatables::of($data)
            ->editColumn('categoryname', function ($data) {
                return $data->category_name;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $btn = '<button id="subcategory_edit" data-id="' . $data->id . '" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button>';
                $btn .= '<button id="subcategory_delete" data-id="' . $data->id . '" class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function subcategoryDelete(Request $request)
    {
        $id = $request->id;
        $data['status'] = 0;
        $data['massage'] = "record not delete";
        if ($id) {
            $news = blogsubcategory::findOrFail($id);
            $news->delete();
            $data['status'] = 1;
            $data['massage'] = "record delete successfully";
        }
        return json_encode($data);
    }
    public function subcategory_edit(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $data = DB::table('blogsubcategory')->where('id', $id)->first();
            // echo '<pre>';
            // print_r($data);
            // die;
            return json_encode($data);
        }
    }
}
