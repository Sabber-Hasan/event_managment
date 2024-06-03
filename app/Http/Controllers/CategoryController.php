<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Gif\Exceptions\NotReadableException as ExceptionsNotReadableException;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Exception\NotReadableException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in the database.
     */
  
     public function store(Request $request){
        $category = Category::create($request->all());
        if ($category) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $loc = $file->store('public/categories');
                $category->image = str_replace('public/', '', $loc);
                $category->save();
                $manager = new ImageManager(new Driver());
                $image = $manager->read(Storage::path($loc));
                $image = $image->scaleDown(width: 800)->save(Storage::path($loc));
            } else {
                return redirect()->route('categories.create')->with('error', 'Image not available.');
            }
    
            return redirect()->route('categories.index')->with('success', 'Category saved successfully. ID is ' . $category->id);
        } else {
            return redirect()->route('categories.create')->with('error', 'Category add failed.');
        }
    }
    
    // private function isImage($file)
    // {
    //     $mime = $file->getMimeType();
    //     return in_array($mime, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/svg+xml']);
    // }
    /**
     * Display the specified category.
     */
    public function show($id)
{
    $category = Category::find($id);
    if ($category) {
        return view('admin.categories.show', compact('category'));
    } else {
        return redirect()->route('categories.index')->with('error', 'Category not found.');
    }
}

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories',
            'slug' => 'required|max:255|unique:categories',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from the database.
     */
    public function destroy($id)
    {
        // Find the category by its ID
    $category = Category::find($id);

    // Check if the category exists
    if ($category) {
        // Delete the category
        Category::destroy($id);

        // Redirect to the categories index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    } else {
        // If the category was not found, redirect with an error message
        return redirect()->route('categories.index')->with('error', 'Category not found.');
    }
    }
}
