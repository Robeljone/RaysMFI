<?php

namespace App\Http\Controllers;
use App\Services\CityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
          'name'       => ['required', 'string', 'max:255'],
          'country'    => ['required', 'string', 'max:255'],
          'state'      => ['nullable', 'string', 'max:255'],
          'region'     => ['nullable', 'string', 'max:255'],
          'is_capital' => ['nullable'],
          'population' => ['required', 'integer', 'min:0'],
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
          'name'       => ['required', 'string', 'max:255'],
          'country'    => ['required', 'string', 'max:255'],
          'state'      => ['nullable', 'string', 'max:255'],
          'region'     => ['nullable', 'string', 'max:255'],
          'is_capital' => ['nullable'],
          'population' => ['required', 'integer', 'min:0'],
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
