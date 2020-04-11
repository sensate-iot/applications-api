<?php

namespace App\Repositories;

interface IApplicationInterface
{
    function all(): array;
    function findByRole(string $role): array;
}
