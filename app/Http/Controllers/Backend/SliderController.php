<?php

namespace App\Http\Controllers\Backend;

use App\Helper;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class SliderController extends Controller
{
    //

    public function silder_all()
    {
        $sliders= Slider::all();
        return view('slider.index', compact('sliders'));

    }

    public function silder_edit($id)
    {
        $slider= Slider::find($id);
        return view('slider.edit', compact('slider'));

    }
    public function silder_update(Request $request,$id)
    {
        $slider= Slider::findOrFail($id);

        Helper::UpdateImge($request, 'image', 'imge', $slider->id, 'slider');
        Alert::success(trans('backend.updateFash'))->persistent("Close");
        return redirect()->route('silder_all');

    }
}
