<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $query = Employee::latest();
        if (request('search')) {
            $query->where('nama', 'like'. '%' . request('search') . '%')
                ->orWhere('nip', 'like', '%' . request('search') . '%');
        }
        $employees = $query->paginate(6)->withQueryString();
        return view('homepage', compact('employees'));
    }

    public function detail($id)
    {
        $employee = Employee::find($id);
        return view('detail', compact('employee'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        //validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('employees', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'nip' => 'required|integer',
            'ttl' => 'required|string',
            'jabatan' => 'required|string',
            'pendidikan' => 'required|string',
            'prestasi' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //jika validasi gagal, kembali ke hal input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('employees/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        //simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        //simpan data ke table employees
        Employee::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'nip' => $request->nip,
            'ttl' => $request->ttl,
            'jabatan' => $request->jabatan,
            'pendidikan' => $request->pendidikan,
            'prestasi' => $request->prestasi,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $employees = Employee::latest()->paginate(10);
        return view('data-employees', compact('employees'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $categories = Category::all();
        return view('form-edit', compact('employee', 'categories'));
    }

    public function update(Request $request, $id)
    {
        //validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('employees', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'nip' => 'required|integer',
            'ttl' => 'required|string',
            'jabatan' => 'required|string',
            'pendidikan' => 'required|string',
            'prestasi' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/employees/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        //ampil data employee yang akan diupdate
        $employee = Employee::findOrFail($id);

        //jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $employee->foto_sampul))) {
                File::delete(public_path('images/' . $employee->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $employee->update([
                'nama' => $request->nama,
                'category_id' => $request->category_id,
                'nip' => $request->nip,
                'ttl' => $request->ttl,
                'jabatan' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'prestasi' => $request->prestasi,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $employee->update([
                'nama' => $request->nama,
                'category_id' => $request->category_id,
                'nip' => $request->nip,
                'ttl' => $request->ttl,
                'jabatan' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'prestasi' => $request->prestasi,
            ]);
        }

        return redirect('employees/data')->with('success', 'Data berhasil diperbaharui');
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);

        // Hapus foto employee jika ada
        if (File::exists(public_path('images/' . $employee->foto_sampul))) {
            if ($employee->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $employee->foto_sampul));
            }
        }

        // Hapus catatan employees dari database
        $employee->delete();

        return redirect('/employees/data')->with('success', 'Data berhasil dihapus');
    }

}
