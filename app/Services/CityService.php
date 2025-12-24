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
            'country' => $data['country'],
            'state' => $data['state'],
            'region' => $data['region'],
            'is_capital' => $data['is_capital']!== 0? true : false,
            'population' => $data['population'],
        ];

        Session::put($this->sessionKey, $cities);
    }

    public function update(string $id, array $data): void
    {
        $cities = collect($this->all())->map(function ($city) use ($id, $data) {
            if ($city['id'] === $id) {
                $city['name'] = $data['name'];
                $city['country'] = $data['country'];
                $city['state'] = $data['state'];
                $city['region'] = $data['region'];
                $city['is_capital'] = $data['is_capital'];
                $city['population'] = $data['population'];
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
