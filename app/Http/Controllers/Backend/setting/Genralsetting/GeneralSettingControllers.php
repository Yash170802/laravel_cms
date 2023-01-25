<?php

namespace App\Http\Controllers\Backend\setting\Genralsetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GeneralSettingControllers extends Controller
{
    public function view()
    {

        // Get Value...................................................................................................
        $img_name = get_option('logo_img');
        $favicon_name = get_option('favicon_img');
        $email = get_option('email');
        $number = get_option('number');
        $favcolor = get_option('favcolor');
        $sendemail = get_option('send_email');
        $receiveemail = get_option('receive_email');

        // Store In Array..................................................................................................
        $data['logo'] = $img_name->value;
        $data['favicon'] = $favicon_name->value;
        $data['email'] = $email->value;
        $data['number'] = $number->value;
        $data['favcolor'] = $favcolor->value;
        $data['send_email'] = $sendemail->value;
        $data['receive_email'] = $receiveemail->value;

        // Return View................................................................................................
        return view('Backend.generalsetting.generalsetting', $data);
    }
    // Logo.....................................................................................................
    public function logoinsert(Request $request)
    {
        // $post = $request->post();

        $data['status'] = 0;
        $data['massage'] = "General Setting record not save";

        $img_name = DB::table('settings')->where('name', 'logo_img')->first();

        // $old_img = get_option('logo_img');
        $old_img = public_path(LOGO_IMAGE_PATH).'/' .$img_name->value;

        if (File::exists($old_img)) {
            File::delete($old_img);
        }
        $file = $request->file('logo_img');
        $filename =  $file->getClientOriginalName();
        $file->move(public_path(LOGO_IMAGE_PATH), $filename);
        update_option('logo_img ', $filename);
        $data['status'] = 1;
        $data['massage'] = "Logo Upload Successful";

        return json_encode($data);
    }
    // Favicon.....................................................................................................
    public function faviconinsert(Request $request)
    {
        $data['status'] = 0;
        $data['massage'] = "General Setting record not save";

        $favicon_name = DB::table('settings')->where('name', 'favicon_img')->first();

        $old_img = get_option('logo_img');
        $old_img = public_path(FAVICON_IMAGE_PATH.$favicon_name->value);

        if (File::exists($old_img)) {
            File::delete($old_img);
        }
        $file = $request->file('favicon_img');
        $filename =  $file->getClientOriginalName();
        $file->move(public_path(FAVICON_IMAGE_PATH), $filename);
        update_option('favicon_img ', $filename);
        $data['status'] = 1;
        $data['massage'] = "Logo Upload Successful";

        return json_encode($data);
    }
    // Top Bar.....................................................................................................
    public function topbarinsert(Request $request)
    {
        $data['status'] = 0;
        $data['massage'] = "SMTP record not save";
        $post = $request->post();
        if ($post) {
            foreach ($post as $name => $value) {
                update_option($name, $value);
            }
            $data['status'] = 1;
            $data['massage'] = "Top insert successful";
        }
        return json_encode($data);
    }
    // Email .....................................................................................................
    public function emailsendinsert(Request $request)
    {
        $data['status'] = 0;
        $data['massage'] = "Email record not save";
        $post = $request->post();
        if ($post) {
            foreach ($post as $name => $value) {
                update_option($name, $value);
            }
            $data['status'] = 1;
            $data['massage'] = "Email insert successful";
        }
        return json_encode($data);
    }
    // Color .....................................................................................................
    public function colorinsert(Request $request)
    {
        $data['status'] = 0;
        $data['massage'] = "Color record not save";
        $post = $request->post();
        if ($post) {
            foreach ($post as $name => $value) {
                update_option($name, $value);
            }
            $data['status'] = 1;
            $data['massage'] = "Color insert successful";
        }
        return json_encode($data);
    }
}
