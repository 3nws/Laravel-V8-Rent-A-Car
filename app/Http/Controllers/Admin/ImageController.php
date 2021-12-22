<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($car_id)
    {
        $data = Car::find($car_id);
        $images = DB::select("SELECT * FROM images WHERE car_id=$car_id");
        return view('admin.image_add', ['data' => $data, 'images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $car_id)
    {
        $data = new Image;
        $data->car_id = $car_id;
        $data->title = $request->input('title');
        if ($request->file('image')){
            $data->image = Storage::putFile('images', $request->file('image')); // file upload
        }
        $data->save();

        return redirect()->route('admin_image_add', ['car_id' => $car_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, $id, $car_id)
    {
        $data = Image::find($id);
        $data->delete();

        return redirect()->route('admin_image_add', ['car_id' => $car_id]);
    }
}
