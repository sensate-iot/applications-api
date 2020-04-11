<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IApplicationInterface
{
    function all(): array;
    function findByRole(string $role): array;
    function findOne(string $name): Model;
    function findByName(string $name): array;
}
