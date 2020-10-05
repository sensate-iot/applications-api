<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IApplicationInterface
{
    function all(): array;
    function findOne(string $name): ?Model;
    function findByName(string $name): array;
}
