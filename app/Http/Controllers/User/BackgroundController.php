<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Background;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BackgroundController extends Controller
{

    private $page_list = [
        'home' => 'Accueil',
        'user.backgrounds' => 'Fonds d\'écran',
        'user.dashboard' => 'Mes tableaux',
        'user.postit' => 'Postits',
        'user.profile' => 'Profil'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAll()
    {
        $backgrounds = Background::all();

        return view('user.backgrounds', [
            'backgrounds' => $backgrounds,
            'page_list' => $this->page_list
        ]);
    }
    public function addOne(Request $request)
    {
        $page = $request->post('page');
        $image = $request->image;
        $user = Auth::user();

        if ($image !== null) {
            $newBackground = [];
            if (($bgPath = $image->store('public/assets/uploads/backgrounds'))) {
                $bgPath = explode('/', $bgPath);
                $bgPath = array_pop($bgPath);
                $newBackground['bg_file'] = $bgPath;
            }
            $newBackground['page'] = $page;
            $newBackground['user_id'] = $user->id;

            Background::create($newBackground);
        }

        $backgrounds = Background::all();

        return view('user.backgrounds', [
            'backgrounds' => $backgrounds,
            'page_list' => $this->page_list
        ]);
    }

    public function deleteOne(Request $request)
    {
        $image_id = $request->post('id');

        Background::find($image_id)->delete();

        return redirect('/backgrounds');
    }
}
