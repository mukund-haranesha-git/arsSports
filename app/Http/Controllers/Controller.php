<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $pagination=10;

    public function image($photo, $path)
    {
        $root = base_path() . '/public/resource/' . $path;
        $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
        if (!file_exists($root)) {
            mkdir($root, 0777, true);
        }
        $photo->move($root, $name);
        return $path = "resource/" . $path . "/" . $name;
    }

    public function Imagethumbnail_1920($image, $folder){
        $imagename = basename($image);
        $savepath = base_path() . '/public/resource/' . $folder;
        if (!file_exists($savepath)) {
            mkdir($savepath, 0777, true);
        }
        $path = base_path().'/public/resource/'.$folder.'/'.$imagename;
        Image::make($image)->resize(1920, 870, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        return 'resource/' . $folder . '/' . $imagename;
    }

    public function uniqueId(){
        $uId = 'FBK'.rand(10000, 99999);
        $booking = Bookings::where('unique_id',$uId)->first();
        if(empty($booking)){
            return $uId;
        }else{
            $this->uniqueId();
        }
    }
}
