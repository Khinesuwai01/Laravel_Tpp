<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class ObjectController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response = $client->get($this->baseUrl().'objects');

        $results = $response->getStatusCode() == 200 ? json_decode($response->getBody()->getContents()) : [];

        return view('object.index', compact('results'));
    }

    public function create()
    {
        return view('object.create');
    }

    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->put($this->baseUrl().'objects',
        [
            'headers' => [ 'Content-Type' => 'application/json' ],
            'body' => json_encode([
                'name' =>  $request->name,
                'data' => json_encode($request->data)
            ])
        ]
    );

    $message = $response->getStatusCode() == 200 ? 'craete successful' : 'failed ';

    return redirect()->route('objects.index')->with('message', $message);
    }

    public function update($id)
    {
        return view('object.edit');
    }



    private function baseUrl()
    {
        $url = 'https://api.restful-api.dev/';

        return $url;
    }
}
