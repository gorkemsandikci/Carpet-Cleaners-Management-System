<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = auth()->user()->company_id;
        
        $customers = DB::table('customers AS c')
            ->select(['c.id', 'c.first_name', 'c.last_name', 'c.gender', 'c.address', 'c.special_notes', 'c.email', 'c.phone', 'ci.name AS city_name', 'di.name AS district_name'])
            ->where('c.company_id', $companyId)
            ->where('c.status', '1')
            ->leftJoin('cities AS ci', 'c.city_id', '=', 'ci.id')
            ->leftJoin('districts AS di', 'c.district_id', '=', 'di.id')
            ->get();

        return view('backend.pages.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('status', '1')->get();
        $cities = Cities::get(['name', 'id']);
        return view('backend.pages.customer.edit', compact('customers', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $companyId = auth()->user()->company_id;
        
        Customer::create([
            'company_id' => $companyId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            'special_notes' => $request->special_notes,
            'phone' => $request->phone,
            'email' => $request->email ?? null,
            'status' => '1',
        ]);

        return back()->withSuccess('Customer created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $companyId = auth()->user()->company_id;
        
        $customer = DB::table('customers AS c')
            ->select(['c.id', 'c.first_name', 'c.last_name', 'c.gender', 'c.address', 'c.special_notes', 'c.email', 'c.phone', 'ci.name AS city_name', 'di.name AS district_name'])
            ->where('c.company_id', $companyId)
            ->where('c.status', '1')
            ->where('c.id', $id)
            ->leftJoin('cities AS ci', 'c.city_id', '=', 'ci.id')
            ->leftJoin('districts AS di', 'c.district_id', '=', 'di.id')
            ->first();

        return response()->json([
            'address' => $customer->address,
            'city_name' => $customer->city_name,
            'district_name' => $customer->district_name,
            'email' => $customer->email,
            'gender' => $customer->gender,
            'id' => $customer->id,
            'name' => $customer->first_name . ' ' . $customer->last_name,
            'phone' => $customer->phone,
            'special_notes' => $customer->special_notes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companyId = auth()->user()->company_id;
        
        $customer = Customer::where('id', $id)->where('company_id', $companyId)->where('status', '1')->firstOrFail();
        $customers = Customer::where('company_id', $companyId)->get();
        $cities = Cities::get();
        $districts = Districts::get(['name', 'id', 'city_id']);
        return view('backend.pages.customer.edit', compact('customer', 'customers', 'cities', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $companyId = auth()->user()->company_id;
        
        $customer = Customer::where('id', $id)->where('company_id', $companyId)->where('status', '1')->firstOrFail();

        $customer->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            'special_notes' => $request->special_notes,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => '1',
        ]);

        return back()->withSuccess('Müşteri güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $companyId = auth()->user()->company_id;
        
        $customer = Customer::where('id', $request->id)->where('company_id', $companyId)->where('status', '1')->firstOrFail();

        $customer->update([
            'status' => '0',
        ]);

        return response(['error' => false, 'message' => 'Başarıyla Silindi.']);
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = Districts::where('city_id', $request->city_id)->get(['name', 'id']);

        return response()->json($data);
    }
}
