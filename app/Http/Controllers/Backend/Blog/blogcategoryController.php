<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\blogcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class blogcategoryController extends Controller
{
        //
        public function view()
        {
            return view('Backend.dasboard.blog.category.category');
        }

        public function category_insert(Request $request)
        {
            $id = $request->id;
            $data['status'] = 0;
            $data['massage'] = "! Oops Something Wrong Record Not Insert";

            $datainsert['category_name'] = $request->category_name;
            $datainsert['status'] = $request->status;
            if ($id) {
                $save = DB::table('blogcategory')->where('id', $id)->update($datainsert);
                $data['status'] = 1;
                $data['massage'] = "Update Record successfully";
            } else {
                $save = DB::table('blogcategory')->insert($datainsert);
                $data['status'] = 1;
                $data['massage'] = "Record Insert successfully";
            }

            return json_encode($data);
        }
        public function categorylist()
        {

            $data = blogcategory::select('*');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<button id="category_edit" data-id="' . $data->id . '" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button>';
                    $btn .= '<button id="category_delete" data-id="' . $data->id . '" class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        public function categoryDelete(Request $request)
        {
            $id = $request->id;
            $data['status'] = 0;
            $data['massage'] = "record not delete";
            if ($id) {
                $news = blogcategory::findOrFail($id);
                $news->delete();
                $data['status'] = 1;
                $data['massage'] = "record delete successfully";
            }
            return json_encode($data);
        }
        public function category_edit(Request $request)
        {
            $id = $request->id;
            if ($id) {
                $data = DB::table('blogcategory')->where('id', $id)->first();
                return json_encode($data);
            }
        }
    }

