<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentManagementController extends Controller
{
    public function index()
    {
        // Mendapatkan data yang ingin Anda kirim ke view
        $data = [
            $contents = Content::all(),
        ];

        return view('backend.contentManagement.index', compact('contents'));
    }

    public function create()
    {
        return view('backend.contentManagement.create');
    }
}
