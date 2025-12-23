<?php

namespace App\Http\Controllers;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityService $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index()
    {
        return view('city.index', [
            'products' => $this->cityService->all()
        ]);
    }

    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $this->cityService->create($request->all());

        return redirect()->route('city.index');
    }

    public function edit(string $id)
    {
        $city = $this->cityService->find($id);

        abort_if(!$city, 404);

        return view('city.edit', compact('city'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $this->cityService->update($id, $request->all());

        return redirect()->route('city.index');
    }

    public function destroy(string $id)
    {
        $this->cityService->delete($id);

        return redirect()->route('city.index');
    }

}
