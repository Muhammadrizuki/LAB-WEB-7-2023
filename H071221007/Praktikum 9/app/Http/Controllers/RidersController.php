<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riders; 

class RidersController extends Controller
{

    public function index()
    {
        $riders = Riders::all(); 
        return view('riders', ['riders' => $riders]);
    }

    public function edit() {
        $riders = Riders::all(); 
        return view('edit', ['riders' => $riders]);
    }

    public function update($number) {
        $riders = Riders::find($number);
        return view('update',['riders' => $riders]);
    }
    
    public function save($number, Request $request) {
        $riders = Riders::find($number);
        $riders->update($request->except(['_token', 'submit']));
        // $warga->update($request->except(['_token', 'submit']));

        return redirect('/edit')->with('success', 'Data pembalap berhasil diperbarui');
    }

    public function showRider($number) {
        $riders = Riders::where('number', $number)->first();
        
        if (!$riders) {
            return view('welcome');
        }

        return view('detailRider', ['riders' => $riders]);
    }
    

    public function delete($id) {
        $rider = Riders::find($id);
    
        if ($rider) {
            $rider->delete();
            return view('edit', ['riders' => Riders::all()]);
        } else {
            return view('welcome');
        }
    }
    

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $riders = $request->validate([
            'number' => 'required|numeric',
            'name' => 'required',
            'team' => 'required',
            'konstruktor' => 'required',
            'country' => 'required',
            'tLahir' => 'required|date',
            'description' => 'required',
        ]);

        Riders::create($riders);

        return redirect('/')->with('success', 'Data pembalap berhasil dibuat');
    }


}
