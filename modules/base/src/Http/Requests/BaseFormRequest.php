<?php

namespace Lavakit\Base\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Lavakit\Base\Services\LavakitResponse;

/**
 * Class BaseFormRequest
 * @package Lavakit\Base\Http\Requests
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class BaseFormRequest extends FormRequest
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
    abstract public function rules();
    
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation1(Validator $validator)
    {
        $response = new JsonResponse([
            'success' => false,
            'message' => 'The given data is invalid',
            'errors' => $validator->errors()
        ], LavakitResponse::HTTP_UNPROCESSABLE_ENTITY);
        
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
