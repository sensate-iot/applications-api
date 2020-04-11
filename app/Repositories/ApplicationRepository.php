<?php

namespace App\Repositories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class ApplicationRepository implements IApplicationInterface
{
    public function all(): array
    {
        $data = Application::all()->sortBy('ranking');

        foreach($data as $entry) {
            $entry->roles = $entry->roles();
        }

        return $data;
    }

    public function findByName(string $name): array
    {
        $data = Application::query()->where('name', 'LIKE', $name);
        return $data->get()->all();
    }

    public function findOne(string $name): Model
    {
        return Application::query()->where('name', '=', $name)->get()->first();
    }
}
