<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class wargaController extends Controller
{
    public function index(){
        $warga = Warga::all();
        return view('warga.index',compact(['warga']));
    }
    public function create() {
        return view('warga.create');
    }
    public function store(Request $request) {
        // dd( $request);
        // dd($request->except(['_token','submit']));
        Warga::create($request->except(['_token','submit']));
        return redirect('/warga');
    }
    public function edit($id) {
        // dd($id);
        $warga = Warga::find($id);
        // dd($warga);
        // return view('edit');
        return view('warga.edit',compact(['warga']));
    }
    public function update($id, Request $request) {
        $warga = Warga::find($id);
        $warga->update($request->except(['_token', 'submit']));
        return redirect('/warga');
    }
    public function delete($id) {
        $warga = Warga::find($id);
        $warga->delete();
        return redirect('/warga');
    }
    public function search(Request $request)
    {
        $warga = $request->input('alamat');
        $alamat = Warga::where('alamat', $warga)->get();
        if ($alamat-> isempty()){
            $pesan="tidak ada data";
            echo "<script>alert('$pesan')</script>";
        }
        return view('warga.alamat', ['alamat' => $alamat]);

        
        
    }    
    
}
