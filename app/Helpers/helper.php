<?php

use App\Models\UserThriftGroup;
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

/**
 * Get user thrift groups
 * * @return array
 */
if (!function_exists('get_user_thrift_groups')) {
    function get_user_thrift_groups()
    {
        return UserThriftGroup::where('user_id', auth()->id())->select('user_id', 'thrift_group_id')
            ->with('thrift_group', function ($query) {
                $query->select('id', 'user_id', 'token', 'name');
            })->get();
    }
}
