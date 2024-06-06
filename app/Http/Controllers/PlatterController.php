<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Platter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PlatterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {$merchantId = auth()->user()->merchant_id; // Assuming you have the merchant ID stored in the authenticated user's session

        // Fetch the distinct category IDs from the menus table for the current merchant
        $categoryIds = Menu::where('merchant_id', $merchantId)->distinct()->pluck('category_id');
    
        // Fetch the category names for the retrieved IDs
        $categories = Category::whereIn('id', $categoryIds)->get();
    
        // Fetch the active menus for the current merchant
        $menus = Menu::where('merchant_id', $merchantId)->where('status', 1)->get();
        // $menus = Menu::where('merchant_id', $merchantId)
        //     ->where('status', 1)
        //     ->get();

       return view('merchant.platters.create',compact('menus','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $platter = Platter::create($request->validated());
    $platter->menus()->sync($request->input('menu_ids', []));
    
    if ($platter) {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $loc = $file->store('public/platter');
            $platter->image = str_replace('public/', '', $loc);
            $platter->save();
            //image intervention start(imag resize)
            $manager = new ImageManager(new Driver());
            $image = $manager->read(Storage::path($loc));
            $image = $image->scaleDown(width: 800)->save(Storage::path($loc));
        } else {
            return redirect()->route('menus.create')->with('error', 'Image not available.');
        }

        return redirect()->route('menus.index')->with('success', 'menu saved successfully. ID is ' . $platter->id);
    }
    return redirect()->route('platters.index')->with('success', 'Platter created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Platter $platter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platter $platter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platter $platter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platter $platter)
    {
        //
    }
}
