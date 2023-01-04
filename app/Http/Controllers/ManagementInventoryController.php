<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Categorybarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ManagementInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('manajemen.index', [
            'title' => 'Manajemen Barang',
            'barangs' => Barang::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manajemen.create', [
            'title' => 'Manajemen Barang | Create',
            'categories' => Categorybarang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'categorybarang_id' => 'required',
            'qty' => 'required',
            'foto' => 'image|file|max:2054'
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto_barang');
        }
        $validatedData['slug'] = Str::slug($request->nama);

        Barang::create($validatedData);

        return redirect('/management/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
        return view('manajemen.detail', [
            'title' => 'Management Inventory | Detail',
            'barang' => $barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
        return view('manajemen.edit', [
            'title' => 'Manajemen Barang | Create',
            'categories' => Categorybarang::all(),
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'categorybarang_id' => 'required',
            'qty' => 'required',
            'foto' => 'image|file|max:2054'
        ]);

        if ($request->file('foto')) {
            Storage::delete($barang->foto);
            $validatedData['foto'] = $request->file('foto')->store('foto_barang');
        }
        $validatedData['slug'] = Str::slug($request->nama);

        Barang::where('id', $barang->id)->update($validatedData);
        return redirect('/management/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
        if ($barang->foto) {
            Storage::delete($barang->foto);
        }

        Barang::destroy($barang->id);
        return redirect('/management/barang');
    }
}
