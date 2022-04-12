<?php

namespace App\Http\Requests\Thrift\Group;

use App\Enums\ThriftSchedule;
use Illuminate\Foundation\Http\FormRequest;

class ThriftGroupFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'thrifters' => 'required|integer',
            'amount' => 'required|numeric',
            'details' => 'nullable|json',
            'is_open' => 'required|boolean',
            'start_date' => 'required|date',
            'schedule' => 'required|in:' . implode(',', ThriftSchedule::getAll()),
        ];
    }
}
