<?php

namespace App\Enums\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Customer = 'customer';
}
