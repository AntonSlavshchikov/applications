<?php

namespace App\Models\Enums\Request;

enum StatusEnum: string
{
    case active = 'Active';

    case resolved = 'Resolved';
}
