<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
    }

    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
        ]);
        
        $customer = new Customer();
        $customer->fill(['label' => $data['label']]);
        $customer->save();

        $contact = new Contact();
        $contact->fill([
            'firstname' => $data['prenom'],
            'lastname' => $data['nom'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'customer_id' => $customer->id,
        ]);
        $contact->save();

        return redirect()->route('customer.index');
    }
}
