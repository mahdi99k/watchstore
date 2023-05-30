<?php

namespace App\Enums;

enum UserStatus: string
{
    case Active = 'active';  //1)name  2)value
    case InActive = 'inactive';
}
