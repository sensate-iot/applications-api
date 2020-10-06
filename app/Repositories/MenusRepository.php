<?php


namespace App\Repositories;

use App\Models\MenuEntry;

class MenusRepository
{
    public function all(): array
    {
        $data = MenuEntry::query()->orderBy('ranking')->get();

        foreach ($data as $entry) {
            $entry->app = $entry->application()->first();
        }

        return $data->all();
    }
}
