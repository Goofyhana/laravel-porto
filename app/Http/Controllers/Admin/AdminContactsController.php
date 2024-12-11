<?php

namespace App\Http\Controllers\Admin;


use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contacts::all(); // Fetch all contacts from the database
        return view('admin.contact.index', compact('contacts')); // Pass data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create'); // Return the view for creating a new contact
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'gmail' => 'required|email',
            'whatsapp' => 'required|string|max:15',
            'link' => 'required|url',
        ]);

        // Create a new contact entry in the database
        Contacts::create([
            'name' => $request->name,
            'gmail' => $request->gmail,
            'whatsapp' => $request->whatsapp,
            'link' => $request->link,
        ]);

        // Redirect to the contact index with a success message
        return redirect()->route('contact.index')->with('success', 'Contact created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contacts::findOrFail($id); // Find the contact by ID
        return view('contact.show', compact('contact')); // Pass the contact data to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contacts::findOrFail($id); // Find the contact by ID
        return view('admin.contact.edit', compact('contact')); // Pass the contact data to the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'gmail' => 'required|email',
            'whatsapp' => 'required|string|max:15',
            'link' => 'required|url',
        ]);

        $contact = Contacts::findOrFail($id); // Find the contact by ID
        $contact->update([
            'name' => $request->name,
            'gmail' => $request->gmail,
            'whatsapp' => $request->whatsapp,
            'link' => $request->link,
        ]);

        // Redirect to the contact index with a success message
        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contacts::findOrFail($id); // Find the contact by ID
        $contact->delete(); // Delete the contact

        // Redirect to the contact index with a success message
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }
}
