<?php

namespace App\Enums;

enum UserRoles: string
{
    case Admin = 'admin';
    case Common = 'common';
}