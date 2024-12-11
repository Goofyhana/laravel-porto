<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('pages.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Page::create($request->all());

        return redirect()->route('pages.index')
                         ->with('success', 'Page created successfully.');
    }

    // Display the specified resource
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    // Show the form for editing the specified resource
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->update($request->all());

        return redirect()->route('pages.index')
                         ->with('success', 'Page updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')
                         ->with('success', 'Page deleted successfully.');
    }
}
