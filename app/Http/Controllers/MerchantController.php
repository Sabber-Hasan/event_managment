<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
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
    {
       return view('user.merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the request data
         $validatedData = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'company_name' => 'required|string|max:80',
            'phone' => 'required|string|max:15',
            'trade_license' => 'required|string|max:20',
            'account_type' => 'required|string',
            'account_num' => 'required|string',
            'address' => 'required|string|max:900',
            'city' => 'required|string|max:180',
            'site_url' => 'nullable|url|max:180',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|boolean', // Allow nullable for status, will default to 0
         ]);
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
