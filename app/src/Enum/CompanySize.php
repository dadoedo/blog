<?php

namespace App\Enum;

enum CompanySize: string
{
    case SMALL = 'small';
    case LARGE = 'large';
    case CORPORATION = 'corporation';
}