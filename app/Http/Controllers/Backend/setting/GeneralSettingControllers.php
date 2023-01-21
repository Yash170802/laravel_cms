<?php

namespace App\Http\Controllers\Backend\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GeneralSettingControllers extends Controller
{
    public function view()
    {
        $img_name = DB::table('setting')->select('*')->get();
        echo '<pre>';
        print_r($img_name);
        die;
        // $favicon_name = DB::table('setting')->where('name', 'favicon_img')->first();
        return view('Backend.dasboard.generalsetting.generalsetting', ['logo' => $img_name->value]);
    }
    public function logoinsert(Request $request)
    {
        // $post = $request->post();

        $data['status'] = 0;
        $data['massage'] = "General Setting record not save";

        $img_name = DB::table('setting')->where('name', 'logo_img')->first();

        // $old_img = get_option('logo_img');
        $old_img = public_path("logo/Image/{$img_name->value}");

        if (File::exists($old_img)) {
            File::delete($old_img);
        }
        $file = $request->file('logo_img');
        $filename =  $file->getClientOriginalName();
        $file->move(public_path('logo/Image'), $filename);
        update_option('logo_img ', $filename);
        $data['status'] = 1;
        $data['massage'] = "Logo Upload Successful";

        return json_encode($data);
    }
    public function faviconinsert(Request $request)
    {

        $data['status'] = 0;
        $data['massage'] = "General Setting record not save";

        $favicon_name = DB::table('setting')->where('name', 'favicon_img')->first();

        // $old_img = get_option('logo_img');
        $old_img = public_path("favicon/Image/{$favicon_name->value}");

        if (File::exists($old_img)) {
            File::delete($old_img);
        }
        $file = $request->file('favicon_img');
        $filename =  $file->getClientOriginalName();
        $file->move(public_path('logo/Image'), $filename);
        update_option('favicon_img ', $filename);
        $data['status'] = 1;
        $data['massage'] = "Logo Upload Successful";

        return json_encode($data);
    }
}
