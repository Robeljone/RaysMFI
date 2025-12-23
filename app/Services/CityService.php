<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CityService
{
    private string $sessionKey = 'city';

    public function all(): array
    {
        return Session::get($this->sessionKey, []);
    }

    public function find(string $id): ?array
    {
        return collect($this->all())->firstWhere('id', $id);
    }

    public function create(array $data): void
    {
        $cities = $this->all();

        $cities[] = [
            'id' => Str::uuid()->toString(),
            'name' => $data['name'],
            'price' => $data['price'],
        ];

        Session::put($this->sessionKey, $cities);
    }

    public function update(string $id, array $data): void
    {
        $cities = collect($this->all())->map(function ($city) use ($id, $data) {
            if ($city['id'] === $id) {
                $city['name'] = $data['name'];
                $city['price'] = $data['price'];
            }
            return $city;
        })->values()->all();

        Session::put($this->sessionKey, $cities);
    }

    public function delete(string $id): void
    {
        $cities = collect($this->all())
            ->reject(fn ($city) => $city['id'] === $id)
            ->values()
            ->all();

        Session::put($this->sessionKey, $cities);
    }
}
