<?php

use Illuminate\Support\Str;

/**
 * Genrate Random Strings (token)
 * * @return String
 */
if (!function_exists('generate_token')) {
    function generate_token()
    {
        return Str::random(10) . ':' .  Str::random(10) . ':' . Str::random(10);
    }
}
