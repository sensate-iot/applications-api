<?php

namespace App\Repositories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class ApplicationRepository implements IApplicationInterface
{
    public function all(): array
    {
        return Application::query()->get()->toArray();
    }

    public function findByName(string $name): array
    {
        $data = Application::query()->where('name', 'LIKE', $name);

        if ($data === null) {
            return [];
        }

        return $data->get()->all();
    }

    public function findOne(string $name): ?Model
    {
        $data = Application::query()->where('name', '=', $name)->get()->first();

        if($data === null) {
            return null;
        }

        return $data;
    }
}
