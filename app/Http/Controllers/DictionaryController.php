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
        $matn = $request['keywords'];
        $data = Dictionary::where('uz', 'like', "%{$matn}%")->orderBy('uz', 'DESC')->get();
        $response = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $response;
    }

    public function getEng(Request $request)
    {
        $matn = $request['keywords'];
        $data = Dictionary::where('eng', 'like', "%{$matn}%")->orderBy('eng', 'DESC')->get();
        $response = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $response;
    }

    public function getRu(Request $request)
    {
        $matn = $request['keywords'];
        $data = Dictionary::where('ru', 'like', "%{$matn}%")->orderBy('ru', 'DESC')->get();
        $response = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return $response;
    }

    public function getDictionary()
    {
        $data = Dictionary::orderBy('ru', 'DESC')->skip(0)->take(40)->get();
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
