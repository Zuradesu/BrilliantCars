<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'item_id'=> 'required|integer|exists:item_id',
            // 'user_id' => 'required|integer|exists:user_id',
            // 'star_date' => 'required|date',
            // 'end_date' => 'required|date',
            // 'total' => 'required|numeric',
            // 'status' => 'required|string|in:PENDING, SUCCESS, CANCEL',
        ];
    }
}
