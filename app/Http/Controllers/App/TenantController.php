<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'domain_name' => 'required|string|max:255|unique:domains,domain',
            'password' => 'required|string|confirmed',
        ]);
        // dd($request);
        $tenant = Tenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'domain_name' => $request->domain_name,
            'password' => $request->password,
        ]);
        $tenant->domains()->create([
            'domain' => $validatedData['domain_name'] .
                '.' . config('app.domain')
        ]);
        // return $tenant;

        return redirect()->route('tenants.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
