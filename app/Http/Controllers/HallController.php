<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

use function Ramsey\Uuid\v1;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $halls=Hall::with('Merchant')->get();
        return view('merchant.halls.index',compact('halls'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $merchant=Merchant::all();
        // $vat=Hall::get('price');
        return view('merchant.halls.create');
        // return view('merchant.halls.create',with(['merchant' => $merchant]));
        // return view('merchant.halls.create',['merchant' => $merchant]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validation=[
        //     'name' => 'required',
        //     'capacity' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'discount' => 'required',
        //     'image' => 'required',
        //     'merchant_id' => 'required',
        // ];
        $hall = Hall::create($request->all());
        if ($hall) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $loc = $file->store('public/halls');
                $hall->image = str_replace('public/', '', $loc);
                $hall->save();
                //image intervention start(imag resize)
                $manager = new ImageManager(new Driver());
                $image = $manager->read(Storage::path($loc));
                $image = $image->scaleDown(width: 800)->save(Storage::path($loc));
            } else {
                return redirect()->route('halls.create')->with('error', 'Image not available.');
            }
        }
        return redirect()->route('halls.index')->with('success', 'Hall saved successfully. ID is ' . $hall->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hall $hall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        //
    }
}
