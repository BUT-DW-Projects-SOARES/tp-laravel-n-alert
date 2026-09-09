<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
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

    public function store(CustomerRequest $request)
    {
        $data = $request->validated();

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

    public function edit(Customer $customer)
    {
        $contact = $customer->contacts->first();
        return view('customer.edit', ['customer' => $customer, 'contact' => $contact]);
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        $customer->fill(['label' => $data['label']]);
        $contact = $customer->contacts->first();
        if (!$contact) {
            $contact = new Contact();
            $contact->customer_id = $customer->id;
        }

        $contact->fill([
            'firstname' => $data['prenom'],
            'lastname' => $data['nom'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
        ]);
        $contact->save();
        $customer->save();

        return redirect()->route('customer.show', ['customer' => $customer]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
