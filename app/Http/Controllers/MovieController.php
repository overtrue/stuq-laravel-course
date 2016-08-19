<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MovieController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function detail($id)
    {
        $response = [
            'id' => $id,
            'name' => '敢死队3',
        ];

        if ($this->request->get('extend') == 1) {
            $response['cover'] = 'gansidui.jpg';
            $response['author'] = 'xxxx';
        }

        return $response;
    }
}
