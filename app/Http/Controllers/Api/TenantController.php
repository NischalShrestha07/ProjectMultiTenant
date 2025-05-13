<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        return response()->json($tenants);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'domain_name' => 'required|string|max:255|unique:domains,domain',
            'password' => 'required|string|confirmed',
        ]);
        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Fails',
                'errors' => $validatedData->errors()
            ]);
        }
        $tenant = Tenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'domain_name' => $request->domain_name,
            'password' => $request->password,
        ]);
        $tenant->domains()->create([
            // 'domain' => $validatedData['domain_name'] .
            //     '.' . config('app.domain')
            'domain' => $request->input('domain_name') .
                '.' . config('app.domain')
        ]);


        return response()->json([
            'message' => 'Tenant Created Successfully',
            'tenant_details' => $tenant,
        ]);
    }
}
