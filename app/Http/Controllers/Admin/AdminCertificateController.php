<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class AdminCertificateController extends Controller
{
    public function index()
    {
        $certificate = Certificate::all();
        return view('admin.certificate.index', compact('certificate'));
    }

    public function create()    
    {
        return view('admin.certificate.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:225',
        'issued_by' => 'required|string|max:225',
        'issued_at' => 'required|date',
        'description' => 'nullable|string',
        'file' => 'required|file|mimes:pdf|max:1024',
    ]);

    $filepath = $request->file('file')->store('files', 'public');

    Certificate::create([
        'name' => $request->input('name'),
        'issued_by' => $request->input('issued_by'),
        'issued_at' => $request->input('issued_at'),
        'description' => $request->input('description'),
        'file' => $filepath,
    ]);

    return redirect()->route('certificate.index')->with('success', 'Certificate successfully added!');
}

    public function show(string $id)
    {
        $certificate = Certificate::findOrFail($id); // singular
        return view('admin.certificate.show', compact('certificate')); // singular
    }

    public function edit(string $id)
    {
        // Cari certificate berdasarkan ID
        $certificate = Certificate::findOrFail($id); // singular
        // Kirim data ke view
        return view('admin.certificate.edit', compact('certificate')); // singular
    }


        public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:225',
            'issued_by' => 'required|string|max:225',
            'issued_at' => 'required|date',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Cari Certificate berdasarkan ID
        $certificate = Certificate::findOrFail($id);

        // Jika ada file baru yang diunggah
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($certificate->file) {
                Storage::delete('public/' . $certificate->file);
            }

            // Simpan file baru dan perbarui path-nya
            $filePath = $request->file('file')->store('files', 'public');
            $certificate->file = $filePath;
        }

        // Update data lainnya
        $certificate->update([
            'name' => $request->input('name'),
            'issued_by' => $request->input('issued_by'),
            'issued_at' => $request->input('issued_at'),
            'description' => $request->input('description'),
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('certificate.index')
            ->with('success', 'Certificate updated successfully.');
    }


    public function destroy(string $id)
    {
        $certificate = Certificate::findOrFail($id);

        if ($certificate->file) {
            Storage::delete('public/' . $certificate->file);
        }

        $certificate->delete();

        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully');
    }
}
