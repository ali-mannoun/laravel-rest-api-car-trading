<?php

namespace App\Http\Controllers\Car;

use App\Car;
use App\CarImage;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CarImageController extends ApiController
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //TEMP --used for testing if the image stored correctly.
    public function store(Request $request, Car $car)
    {
        $rules = [
            'image' => 'required|image',
        ];

        $this->validate($request, $rules);
        //store() first param is the path but it is assigned in the filesystem in config folder,
        //and the second param is the driver used to store the image .
        $image_name = $request->image->store('', 'images');

        $car_image = CarImage::create([
            'image_url' => url("img\\" . $image_name),
            'car_id' => $request->car_id,
        ]);

        return $this->showOne($car_image);
        //return new ResourcesCarImage($car_image);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
