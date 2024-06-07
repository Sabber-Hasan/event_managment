<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $menus = Menu::with('Category')->get();

         return view('merchant.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchants = Merchant::all();
        $categories = Category::all();
       return view('merchant.menus.create', compact('merchants', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'category_id' => 'required|exists:categories,id',
            'item' => 'required|string|max:255',
            'image' => 'nullable|image',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'quantity' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
        ]);
        $menu = Menu::create($request->all());

        if ($menu) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $loc = $file->store('public/menus');
                $menu->image = str_replace('public/', '', $loc);
                $menu->save();
                //image intervention start(imag resize)
                $manager = new ImageManager(new Driver());
                $image = $manager->read(Storage::path($loc));
                $image = $image->scaleDown(width: 1000)->save(Storage::path($loc));
            } else {
                return redirect()->route('menus.create')->with('error', 'Image not available.');
            }

            return redirect()->route('menus.index')->with('success', 'menu saved successfully. ID is ' . $menu->id);
        } else {
            return redirect()->route('menus.create')->with('error', 'menu add failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menus)
    {
        // return view('menus.show', compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menus)
    {
        // $merchants = Merchant::all();
        // $categories = Category::all();
        // return view('menus.edit', compact('menus', 'merchants', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        // $request->validate([
        //     'merchant_id' => 'required|exists:merchants,id',
        //     'category_id' => 'required|exists:categories,id',
        //     'item' => 'required|string|max:255',
        //     'image' => 'nullable|image',
        //     'price' => 'required|numeric',
        //     'discount' => 'nullable|numeric',
        //     'quantity' => 'nullable|string|max:255',
        //     'status' => 'required|in:0,1',
        // ]);
        // $menu->fill($request->all());

        // if ($request->hasFile('image')) {
        //     $menu->image = $request->file('image')->store('images');
        // }

        // $menu->save();

        // return redirect()->route('menus.index')->with('success', 'Item updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // $menu->delete();
        // return redirect()->route('menus.index')->with('success', 'Item deleted successfully.');
    }
}
