<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class AdminSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = Skill::all();
        return view('admin.skill.index', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dimasukkan
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Simpan data ke database
        Skill::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        // Redirect ke halaman skill index dengan pesan sukses
        return redirect()->route('skill.index')->with('success', 'Skill successfully added!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('skill.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit', compact('skill'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $skill = Skill::findOrFail($id);
        $skill->update($request->all());
    
        return redirect()->route('skill.index')->with('success', 'Skill updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
    
        return redirect()->route('skill.index')->with('success', 'Skill deleted successfully');
    }
    
}
