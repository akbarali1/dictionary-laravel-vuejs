<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\DictionaryCat;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index()
    {
        return view('dictionary.index');
    }

    public function getUz(Request $request)
    {
        $data = Dictionary::where('uz', 'LIKE', '%' . $request->keyword . '%')->get();
        $response = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $response;
    }

    public function getEng(Request $request)
    {
        $data = Dictionary::where('eng', 'LIKE', '%' . $request->keyword . '%')->get();
        $response = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $response;
    }

    public function getRu(Request $request)
    {
        $data = Dictionary::where('ru', 'LIKE', '%' . $request->keyword . '%')->get();
        $response = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $response;
    }

    public function categoryStore(Request $request)
    {
        DictionaryCat::insert(
            [
                'eng' => $request['eng'],
                'uz' => $request['uz'],
                'ru' => $request['ru'],
            ]
        );
        $response = json_encode(['save' => "Malumotlar saqlandi"], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return response($response, 200)->header('Content-Type', 'application/json');
    }

    public function dictonaryStore(Request $request)
    {
        Dictionary::insert(
            [
                'eng' => $request['eng'],
                'uz' => $request['uz'],
                'ru' => $request['ru'],
            ]
        );
        $response = json_encode(['save' => "Malumotlar saqlandi"], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return response($response, 200)->header('Content-Type', 'application/json');
    }

    public function create()
    {
        return view('dictionary.create');
    }

    public function category()
    {
        return view('dictionary.category');
    }
}
