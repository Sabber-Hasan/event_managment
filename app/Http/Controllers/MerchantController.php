<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserRole;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

use function PHPUnit\Framework\returnSelf;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchants = Merchant::with('category');
        return view('admin.merchants.index', compact('merchants'));
        // return view('admin.merchants.index', ['merchants' => $merchants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->middleware(CheckUserRole::class)->only('create');
        // $users = User::find();
        return view('user.merchant.create')
            // ->with('users', $users)
        ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $merchant = Merchant::create($request->all());
        if ($merchant) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $loc = $file->store('public/merchants');
                $merchant->logo = str_replace('public/', '', $loc);
                $merchant->save();
                //image intervention start(imag resize)
                $manager = new ImageManager(new Driver());
                $image = $manager->read(Storage::path($loc));
                $image = $image->scaleDown(width: 300)->save(Storage::path($loc));
            } else {
                return redirect()->route('merchants.create')->with('error', 'Image not available.');
            }

            return redirect()->route('user')->with('success', 'Merchant Rgistration successfully. User ID  ' . $merchant->id . 'will be merchant within 24 hour');
        } else {
            return redirect()->route('merchants.create')->with('error', 'Merchant add failed.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
