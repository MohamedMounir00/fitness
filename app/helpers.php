<?php
/**
 * Created by PhpStorm.
 * User: Shrkaty_10
 * Date: 20/11/2018
 * Time: 11:53 ص
 */

namespace App;
 use Intervention\Image\Facades\Image;

 class Helper {

     public static function UploadImge($request,$imge,$type_url,$item_id,$type_item)
     {
         if($request->hasFile($imge)) {

             $image       = $request->file($imge);
             $img_name = time() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('files/images/'), $img_name);
             $db_name = 'files/images/' . $img_name;
             File::create([
                 'url'=>$db_name,
                 'type_url'=>$type_url,
                 'item_id'=>$item_id,
                 'type_item'=>$type_item

             ]);

         }     }



     public static function UpdateImge($request,$imge,$type_url,$item_id,$type_item)
     {
         if($request->hasFile($imge)) {
             $image       = $request->file($imge);

             $f= File::where('item_id',$item_id)->where('type_url',$type_url)->where('type_item',$type_item)->first();

             if ($f){
                 if (File::exists(public_path($f->url))) { // unlink or remove previous image from folder
                     unlink(public_path($f->url));
                 }

             $img_name = time() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('files/images/'), $img_name);
             $db_name = 'files/images/' . $img_name;
             $f->update([
                 'url'=>$db_name,
                 'type_url'=>$type_url,
                 'item_id'=>$item_id,
                 'type_item'=>$type_item

             ]);
             }else
           self::UploadImge($request,$imge,$type_url,$item_id,$type_item);
         }     }

 }