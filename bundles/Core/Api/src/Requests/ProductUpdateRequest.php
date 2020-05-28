<?php

namespace Core\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            "customer_id"=>'integer|exists:customers,id',
            "status"=>"in:new,pending,in review,approved,inactive,deleted",
            "issn"=>'string|max:255',
            "name"=>'string|max:255',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'status.in' => 'The selected status is invalid. Available statuses: new, pending, in review, approved, inactive, deleted',
        ];
    }
}
