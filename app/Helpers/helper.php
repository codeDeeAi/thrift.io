<?php

use App\Models\ThriftGroup;
use App\Models\User;
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

/**
 * Add User to Thrift group
 * @param token 
 * @param user_id 
 * * @return boolean
 */
if (!function_exists('add_user_to_thrift_group')) {
    function add_user_to_thrift_group(string $token, int $user_id)
    {
        // Check if group exists
        if (ThriftGroup::where('token', $token)->where('is_open', true)->exists()) {

            // Check if user exists
            if (User::where('id', $user_id)->doesntExist()) {
                return false;
            }

            $group = ThriftGroup::where('token', $token)->where('is_open', true)->first('id');

            // Check if user isn't a current group member
            if (UserThriftGroup::where('user_id', $user_id)->where('thrift_group_id', $group->id)->doesntExist()) {

               UserThriftGroup::create([
                    'user_id' => $user_id,
                    'thrift_group_id' => $group->id
                ]);

                return true;
            }
        }

        return false;
    }
}
