<?php

use App\Enums\ThriftActivityType;
use App\Models\ThriftActivity;
use App\Models\ThriftGroup;
use App\Models\User;
use App\Models\UserThriftGroup;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

                create_activity($token, ThriftActivityType::MEMBER_JOINED);

                return true;
            }
        }

        return false;
    }
}

/**
 * ######### THRIFT ACTIVITIES ##########
 */
/**
 * Create thrift activities
 * @param string $group_token
 * @param string $type
 * @param string $user_name
 * * @return boolean
 */
if (!function_exists('create_activity')) {
    function create_activity(string $group_token, string $type, $user_name = '')
    {
        if (ThriftGroup::where('token', $group_token)->doesntExist()) {
            return false;
        }
        $group = ThriftGroup::where('token', $group_token)->first();
        $message = '';

        if ($type === ThriftActivityType::GROUP_OPEN) {
            $status = ($group->is_open) ? 'open' : 'closed';
            $message = $group->name . ' is ' . $status . ' for registration';
        } else if ($type === ThriftActivityType::MEMBER_JOINED) {
            $message = 'A new member just joined ' . $group->name . ' thrift group';
        } else if ($type === ThriftActivityType::MEMBER_LEFT) {
            $message = 'A member just left ' . $group->name . ' thrift group';
        } else if ($type === ThriftActivityType::PAYMENT_STATUS) {
            $message = $user_name . ' updated payment status in ' . $group->name . ' thrift group';
        } else if ($type === ThriftActivityType::DEPOSIT_STATUS) {
            $message = $user_name . ' made a deposit in ' . $group->name . ' thrift group';
        } else if ($type === ThriftActivityType::SLOT_STATUS) {
            $message = $user_name. ' updated slot status in ' . $group->name . ' thrift group';
        } else {
            $message = 'Slots were updated in ' . $group->name . ' thrift group';
        }


        ThriftActivity::create([
            'thrift_group_id' => $group->id,
            'type' => $type,
            'details' => [$message],
        ]);


        return true;
    }
}
