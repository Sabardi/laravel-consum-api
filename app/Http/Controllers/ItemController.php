<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $apiUrl = 'http://127.0.0.1:8001/api/boats'; // Ganti dengan URL API Anda
    private $apiUrlshow = 'http://127.0.0.1:8001/api/show'; // Ganti dengan URL API Anda
    private $apiUrlupdate = 'http://127.0.0.1:8001/api/update'; // Ganti dengan URL API Anda
    private $apiUrldelet = 'http://127.0.0.1:8001/api/destroy'; // Ganti dengan URL API Anda
    public function index()
    {
        $response = Http::get($this->apiUrl);
        $items = $response->json()['data']; // Akses bagian data dari respons
        return view('index', compact('items'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, $request->all());
        return redirect()->route('items.index');
    }

    public function show($id)
    {
        $response = Http::get("{$this->apiUrlshow}/{$id}");
        $item = $response->json()['data']; // Akses bagian data dari respons
        return view('show', compact('item'));
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrlshow}/{$id}");
        $item = $response->json()['data']; // Akses bagian data dari respons
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrlupdate}/{$id}", $request->all());
        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrldelet}/{$id}");
        return redirect()->route('items.index');
    }
}
