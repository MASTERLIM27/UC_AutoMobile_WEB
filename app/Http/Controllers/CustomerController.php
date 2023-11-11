<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $client = new Client();

        try {
            $response = $client->get('http://127.0.0.1:8000/api/customers/');
            $data = json_decode($response->getBody(), true);

            return view('admin', ['customers' => $data]);
        } catch (\Exception $e) {

            return view('api.error', ['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('createCustomer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'idCard' => 'required',
        ]);

        $client = new Client();

        try {
            $response = $client->post('http://127.0.0.1:8000/api/customers/', [
                'json' => [
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'phoneNumber' => $request->input('phoneNumber'),
                    'idCard' => $request->input('idCard'),
                ],
            ]);

            $apiResponse = json_decode($response->getBody(), true);

            return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('createCustomer')->with('error', 'Failed to create customer. ' . $e->getMessage());
        }
    }

    public function show($id){
        $client = new Client();
        try {
            $response = $client->get('http://127.0.0.1:8000/api/customers/'. $id);
            $data = json_decode($response->getBody(), true);

            return view('showCustomer', ['customer' => $data]);
        } catch (\Exception $e) {
            return redirect()->route('showCustomer')->with('error', 'Failed to show customer.'. $e->getMessage());
        }
    }

    public function edit($id)
    {
        $client = new Client();

        try {
            // Fetch customer data from the API
            $response = $client->get("http://127.0.0.1:8000/api/customers/{$id}");
            $customer = json_decode($response->getBody(), true);

            // Pass customer data to the edit view
            return view('editCustomer', compact('customer'));
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection errors, timeouts, etc.)
            return redirect()->route('customers.index')->with('error', 'Failed to fetch customer data. ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'idCard' => 'required',
        ]);

        $client = new Client();

        try {
            $response = $client->put("http://127.0.0.1:8000/api/customers/{$id}/edit", [
                'json' => [
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'phoneNumber' => $request->input('phoneNumber'),
                    'idCard' => $request->input('idCard'),
                ],
            ]);

            // Assuming the API returns a JSON response, you can decode it
            $apiResponse = json_decode($response->getBody(), true);

            // Redirect to the customer index page with a success message
            return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection errors, timeouts, etc.)
            return redirect()->route('customers.edit', $id)->with('error', 'Failed to update customer. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $client = new Client();

        try {
            // Send a DELETE request to the API endpoint
            $response = $client->delete("http://127.0.0.1:8000/api/customers/{$id}");

            // Assuming the API returns a JSON response, you can decode it
            $apiResponse = json_decode($response->getBody(), true);

            // Redirect to the customer index page with a success message
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection errors, timeouts, etc.)
            return redirect()->route('customers.show', $id)->with('error', 'Failed to delete customer. ' . $e->getMessage());
        }
    }
}
