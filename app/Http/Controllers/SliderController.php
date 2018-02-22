<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use File;
use App\Slider;
use App\Traits\UploadTrait;
use App\Traits\StringTrait;
use Carbon\Carbon;

class SliderController extends Controller
{

    use UploadTrait;
    use StringTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_slider');
    }

    public function create()
    {
        return view('master.form.slider-form');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        
        $data = Slider::where('sliders.deleted_at', null)->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->editColumn('gambar', function ($item) {
               if (!empty($item->gambar)) {
                   return
                   '<img height="100px" src="'.$item->gambar.'" onError="this.onerror=null;this.src='."'{{ asset('image/missing.png') }}'".';">';
               }
               return"No Image Found";
            })
            ->addColumn('action', function ($item) {
               return
               "<a href='".url('slider/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                <a href='".url('slider/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
            })
            ->rawColumns(['action','gambar'])
            ->make(true);

    }


    public function add(Request $request)
    {
        
        $this->validate($request, [
            'judul' => 'required|string|min:3|max:255',
            'deskripsi' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // return response()->json($request->all());
        // Upload file process
        ($request->image != null) ? 
            $image_url = $this->getUploadPathName($request->image, "slider/".$this->getRandomPath(), 'SLIDER') : $image_url = "";
        
        if($request->image != null) $request['gambar'] = $image_url;

        // return response()->json($request->all());
        $add = Slider::create([
           'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
            'gambar' => $request['gambar'], 
        ]);

        if($request->image != null){

            /* Upload updated image */
            $imagePath = explode('/', $add->gambar);
            $count = count($imagePath);
            $imageFolder = "slider/" . $imagePath[$count - 2];
            $imageName = $imagePath[$count - 1];

            $this->upload($request->image, $imageFolder, $imageName);

        }

        return redirect('/slider');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::where('sliders.id', $id)
            ->first();

        // return response()->json($data);

        return view('master.form.slider-form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|min:3|max:255',
            'deskripsi' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = Slider::find($id);
        
        /* IMAGE HANDLER PATH */
        $oldImage = "";
        if($slider->gambar != null) {
            /* Save old Image path */
            $oldImage = $slider->gambar;
            $request['gambar'] = $oldImage;
        }
        // Upload file process
        ($request->image != null) ? 
            $image_url = $this->getUploadPathName($request->image, "slider/".$this->getRandomPath(), 'SLIDER') : $image_url = "";
        
        if($request->image != null) $request['image'] = $image_url;

        if($request->image != null){
            $request['gambar'] = $image_url;
        }
        /* END IMAGE HANDLER PATH */

        // return $request->all();

        $slider->update([
           'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
            'gambar' => $request['gambar'], 
        ]);

        /* IMAGE HANDLER MOVE */
        if($slider->gambar != null && $request->image != null && $oldImage != "") {
            /* Delete Image */
            $imagePath = explode('/', $oldImage);
            $count = count($imagePath);
            $folderpath = $imagePath[$count - 2];
            File::deleteDirectory(public_path() . "/img/slider/" . $folderpath);

        }

        if($slider->gambar != null && $request->image != null){
            /* Upload updated image */
            $imagePath = explode('/', $slider->gambar);
            $count = count($imagePath);
            $imageFolder = "slider/" . $imagePath[$count - 2];
            $imageName = $imagePath[$count - 1];

            $this->upload($request->image, $imageFolder, $imageName);
        }
        /* END IMAGE HANDLER MOVE */

        return redirect('/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $slider = Slider::find($id);
        if (count($slider) > 0) {
            $slider->delete();
        }

        if($slider->gambar != "") {
            /* Delete Image */
            $imagePath = explode('/', $slider->gambar);
            $count = count($imagePath);
            $folderpath = $imagePath[$count - 2];
            File::deleteDirectory(public_path() . "/img/slider/" . $folderpath);
        }

        return redirect('/slider');

    }    

}
