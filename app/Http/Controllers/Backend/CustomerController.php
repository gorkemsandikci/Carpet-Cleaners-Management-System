<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // todo should add paginate
        $customers = Customer::get();
        return view('backend.pages.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        $cities = Cities::get(['name', 'id']);
        return view('backend.pages.customer.edit', compact('customers', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            'special_notes' => $request->special_notes,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return back()->withSuccess('Müşteri oluşturuldu!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::where('id', $id)->first();
        $customers = Customer::get();
        $cities = Cities::get();
        $districts = Districts::get(['name', 'id', 'city_id']);
        return view('backend.pages.customer.edit', compact('customer', 'customers', 'cities', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $customer = Customer::where('id', $id)->firstOrFail();

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
            'status' => $request->status,
        ]);

        return back()->withSuccess('Müşteri güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $customer = Customer::where('id', $request->id)->firstOrFail();

        $customer->delete();

        return response(['error' => false, 'message' => 'Başarıyla Silindi.']);
    }

    public function statusUpdate(Request $request)
    {
        $update = $request->state;
        $update_check = $update == "false" ? '0' : '1';

        Customer::where('id', $request->id)->update(['status' => $update_check]);
        return response(['error' => false, 'status' => $update]);
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = Districts::where('city_id', $request->city_id)->get(['name', 'id']);

        return response()->json($data);
    }
}
