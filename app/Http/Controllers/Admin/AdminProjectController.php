<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class AdminProjectController extends Controller
{
    public function index()
    {
        // Mengambil semua data project
        $project = Project::all(); // Ubah dari $project menjadi $projects untuk konsistensi
        return view('admin.project.index', compact('project')); // Pastikan 'projects' sesuai dengan variabel yang digunakan
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'issued_at' => 'required|date',
            'link' => 'nullable|url', // Pastikan validasi link sesuai format URL jika ada
        ]);

        // Simpan data ke database
        Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'issued_at' => $request->input('issued_at'),
            'link' => $request->input('link'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('project.index')->with('success', 'Project successfully added!');
    }

    public function show(string $id)
    {
        // Cari project berdasarkan ID
        $project = Project::findOrFail($id); // Gunakan 'project' agar konsisten dengan nama variabel
        return view('admin.project.show', compact('project')); // Kirim variabel project ke view
    }

    public function edit(string $id)
    {
        // Cari project berdasarkan ID
        $project = Project::findOrFail($id); // Gunakan 'project' agar konsisten dengan nama variabel
        return view('admin.project.edit', compact('project')); // Kirim variabel project ke view
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string|max:225',
            'issued_at' => 'required|date',
            'link' => 'nullable|url', // Pastikan validasi link sesuai format URL jika ada
        ]);
    
        // Cari project berdasarkan ID
        $project = Project::findOrFail($id);

        // Update data project
        $project->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'issued_at' => $request->input('issued_at'),
            'link' => $request->input('link'), // Memperbarui link jika ada perubahan
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Certificate deleted successfully');
    }
}

