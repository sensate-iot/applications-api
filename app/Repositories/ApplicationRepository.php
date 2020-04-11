<?php

namespace App\Repositories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class ApplicationRepository implements IApplicationInterface
{
    public function all(): array
    {
        $data = Application::all()->all();

        foreach($data as $entry) {
            $entry->roles = $entry->roles();
        }

        return $data;
    }

    public function findByName(string $name): array
    {
        $data = Application::query()->where('name', 'LIKE', $name)
            ->join('roles', 'id', '=', 'roles.id');
        return $data->get()->all();
    }

    public function findOne(string $name): Model
    {
        return Application::query()->where('name', '=', $name)->get()->first();
    }

    public function findByRole(string $role, string $name = ''): array
    {
        $data = Application::query()->whereHas('roles', function($query) use ($role) {
            $query->where('role', '=', $role);
        });

        if(!empty($name)) {
            $data = $data->where('name', 'LIKE', $name);
        }

        return $data->get()->all();
    }
}
