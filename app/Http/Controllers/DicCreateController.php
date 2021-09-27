<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dictionary;


class DicCreateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dictonaryStore(Request $request)
    {
        $user_id = Auth::id();
        $status = ($user_id == 1) ? 1 : 0;
        if ($status === 0) {
            file_get_contents('https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage?chat_id=414229140&text=Yangi Soz qoshildi tekshiring&parse_mode=html');
        }
        foreach ($request->lauanges as $item) {
            $lauanges[] = [
                'user_id' => $user_id,
                'status' => $status,
                'eng' => $item['inglizcha'],
                'uz' => $item['uzbekcha'],
                'ru' => $item['ruscha'],
            ];
        }
        Dictionary::insert($lauanges);
        $response = json_encode(
            [
                'save' => "Malumotlar saqlandi"
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return response($response, 200)->header('Content-Type', 'application/json');
    }
}
