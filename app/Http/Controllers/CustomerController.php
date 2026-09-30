<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Tag;
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
        $tags = Tag::all();
        return view('customer.create', ['tags' => $tags]);
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

        if (isset($data['tags'])) {
            $customer->tags()->attach($data['tags']);
        }

        return redirect()->route('customer.index');
    }

    public function edit(Customer $customer)
    {
        $contact = $customer->contacts->first();
        $tags = Tag::all();
        return view('customer.edit', ['customer' => $customer, 'contact' => $contact, 'tags' => $tags]);
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

        if (isset($data['tags'])) {
            $customer->tags()->sync($data['tags']);
        } else {
            $customer->tags()->sync([]);
        }

        return redirect()->route('customer.show', ['customer' => $customer]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
