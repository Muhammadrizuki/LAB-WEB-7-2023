<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        $new_cases = Data::pluck('kasus_baru', 'bulan');
        $recovered = Data::pluck('recovered', 'bulan');

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $months[$i - 1];
        }

        for ($count = 0; $count < count($labels); $count++) {
            if (isset($new_cases[$count + 1])) {
                $cases[] = (count($new_cases) == 0) ? '0' : $new_cases[$count + 1];
            } else {
                $cases[] = '0';
            }
            if (isset($recovered[$count + 1])) {
                $recover[] = (count($recovered) == 0) ? '0' : $recovered[$count + 1]*-1;
            } else {
                $recover[] = '0';
            }
        }
        return view('index', compact('labels', 'cases', 'recover'));
    }

    public function data()
    {
        $data = Data::all();
        return view('dataCovid', compact('data'));
    }

    public function inputData(Request $request): RedirectResponse
    {
        Data::updateOrCreate(
            [
                'bulan'  => $request->input('bulan'),
            ],
            [
                'bulan'  => $request->input('bulan'),
                'kasus_baru'  => $request->input('kasus_baru'),
                'recovered' => $request->input('recovered'),
            ],
        );
        return redirect()->route('data');
    }

    public function editData(Request $request, $id): RedirectResponse
    {
        Data::updateOrCreate(
            [
                'id'  => $id
            ],
            [
                'kasus_baru'  => $request->input('kasus_baru1'),
                'recovered' => $request->input('recovered1'),
            ],
        );
        return redirect()->route('data');
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Data::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('data');
    }
}
