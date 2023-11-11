<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $active_welcome = "";
        $active_projects = "";
        $active_courses = "active";

        $customers = Customer::all();

        return view('customer', compact('active_welcome', 'active_projects', 'active_courses', 'customers'));
    }

    public function create()
    {
        return view('createCustomer');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'idCard' => 'required',
         ]);

        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'idCard' => $request->idCard
        ]);
        return redirect(route('customers.index'));
    }

    public function show($id){
        $customers = Customer::where('id', $id)->first();
        return view('showCustomer', compact('customers'));
    }

    public function edit($id)
    {
        $customers = Customer::findOrFail($id);
        return view('editCustomer', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->update([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'idCard' => $request->idCard
        ]);
        return redirect(route('customers.index'));
    }

    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect(route('customers.index'));
    }
}
