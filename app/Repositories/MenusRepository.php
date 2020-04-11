<?php


namespace App\Repositories;

use App\Models\MenuEntry;

class MenusRepository
{
    public function all()
    {
        $data = MenuEntry::all()->sortBy('ranking');

        foreach ($data as $entry) {
            $entry->app = $entry->application()->first();
        }

        return $data->all();
    }
}
