<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        Gate::allowIf(Gate::any(['viewAny', 'viewOwned'], [Contact::class, $customer]));
        return $customer->contacts->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request, Customer $customer)
    {
        Gate::authorize('create', [Contact::class, $customer]);
        return $customer->contacts()->create($request->validated())->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, Contact $contact)
    {
        Gate::authorize('view', $contact);
        return $contact->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Customer $customer, Contact $contact)
    {
        Gate::authorize('update', $contact);
        $contact->update($request->validated());
        return $contact->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, Contact $contact)
    {
        Gate::authorize('delete', $contact);
        return response()->json($contact->delete());
    }
}
