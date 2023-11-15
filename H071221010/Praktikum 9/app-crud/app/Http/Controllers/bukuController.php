<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = buku::where('idbuku', 'like', "%$katakunci%")
                ->orWhere('judul', 'like', "%$katakunci%")
                ->orWhere('penulis', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = buku::orderBy('idbuku', 'asc')->paginate($jumlahbaris);
        }
        return view('buku.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idbuku' => 'required|unique:buku,idbuku',
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal_terbit' => 'required',
            'kategori' => 'required',
        ], [
            'idbuku.required' => 'ID buku wajib diisi',
            'idbuku.unique' => 'ID buku yang diisikan sudah ada dalam database',
            'judul.required' => 'Judul buku wajib diisi',
            'penulis.required' => 'Nama penulis wajib diisi',
            'tanggal_terbit.required' => 'Tanggal terbit wajib diisi',
            'kategori.required' => 'kategori wajib diisi',
        ]);
        $data = [
            'idbuku' => $request->idbuku,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal_terbit' => $request->tanggal_terbit,
            'kategori' => $request->kategori,
        ];
        buku::create($data);
        return redirect()->to('buku')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idbuku)
    {
        $data = Buku::where('idbuku', $idbuku)->first();

        if (!$data) {
            return redirect()->route('buku.index')->with('error', 'Data Buku tidak ditemukan');
        }

        return view('buku.details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = buku::where('idbuku', $id)->first();
        return view('buku.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal_terbit' => 'required',
            'kategori' => 'required',
        ], [
            'judul.required' => 'Judul buku wajib diisi',
            'penulis.required' => 'Nama Penulis wajib diisi',
        ]);
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal_terbit' => $request->tanggal_terbit,
            'kategori' => $request->kategori,
        ];
        buku::where('idbuku', $id)->update($data);
        return redirect()->to('buku')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        buku::where('idbuku', $id)->delete();
        return redirect()->to('buku')->with('success', 'Berhasil melakukan delete data');
    }
}
