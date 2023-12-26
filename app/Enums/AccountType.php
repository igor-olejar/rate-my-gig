<?php

namespace App\Enums;

enum AccountType: string
{
    case Artist = 'artist';
    case Promoter = 'promoter';
    case Venue = 'venue';
}
