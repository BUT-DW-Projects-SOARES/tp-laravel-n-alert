<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        return view('contact.create', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
        ]);
        $contact = new Contact();
        $contact->fill($data);
        $contact->customer()->associate($customer);
        $contact->save();
        return redirect()->route('customer.show', ['customer' => $customer]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer, Contact $contact)
    {
        return view('contact.edit', [
            'customer' => $customer,
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer, Contact $contact)
    {
        $data = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
        ]);
        $contact->fill($data);
        $contact->save();
        return redirect()->route('customer.show', ['customer' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, Contact $contact)
    {
        $contact->delete();
        return redirect()->route('customer.show', ['customer' => $customer]);
    }
}
