<?php

namespace App\Http\Controllers\Backend\testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use DB;
// use DataTables;
use App\Models\Testimonial;
use Faker\Core\File as CoreFile;
use File;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function view()
    {
        return view('Backend.dasboard.testimonial.testimonial');
    }
    public function insert(Request $request)
    {
        $id = $request->id;
        $data['status'] = 0;
        $data['massage'] = "record not submit";

        if ($request->file('file')) {
            $file = $request->file('file');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('testimonial/Image'), $filename);
            if ($id) {
                $image_path =public_path('testimonial/Image/'.$request->img_name);
                @unlink($image_path);
            }
        }else{
            $filename = $request->img_name;
        }

            $datainsert['client_name'] = $request->client_name;
            $datainsert['company_name'] = $request->company_name;
            $datainsert['description'] = $request->description;
            $datainsert['status'] = $request->status;
            $datainsert['img'] = $filename;

            if ($id) {
                $save = DB::table('testimonial')->where('id', $id)->update($datainsert);
                $data['status'] = 1;
                $data['massage'] = "Edit successfully";
            }else{
                $save =  DB::table('testimonial')->insert($datainsert);
                $data['status'] = 1;
                $data['massage'] = "Record successfully";
            }

            return json_encode($data);
    }
    public function userlist()
    {

        $data = Testimonial::select('*');
        return Datatables::of($data)->addIndexColumn()
            ->addColumn('img', function ($data) {
                return asset("testimonial/Image/$data->img");
            })

            ->addColumn('action', function ($data) {
                $btn = '<button id="testimonial_edit" data-id="' . $data->id . '" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button>';
                $btn .= '<button id="testimonial_delete" data-id="' . $data->id . '" class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function testimonialDelete(Request $request)
    {

        $id = $request->id;
        $data['status'] = 0;
        $data['massage'] = "record not delete";
        if ($id) {
        $news = testimonial::findOrFail($id);
        $image_path = public_path('testimonial/Image/'.$news->img);

        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $news->delete();

            $data['status'] = 1;
            $data['massage'] = "record delete successfully";
        }
        return json_encode($data);
    }
    public function testimonial_edit(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $data = DB::table('testimonial')->where('id', $id)->first();
            return json_encode($data);
        }
    }
}
