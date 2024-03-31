<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LaravelPulse\LockLink\Contrib\Traits\LockLink;

class ServiceRequest extends FormRequest
{
    use LockLink;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // unlock encryption and pass into ignore
        $id = $this->Unlock(request()->id);

        $putMethod = request()->getMethod() === 'PUT';
        return [
            'title' => $putMethod ? ['required', Rule::unique('services')->ignore($id)]
                : ['required', 'string', 'max:255', 'unique:services,title'],
            'description' => ['nullable', 'string', 'max:255'],
            'image' => $putMethod ? ['nullable', 'image', 'max:2048', 'mimes:jpe?g,png,gif,svg']
                : ['required', 'image', 'max:2048', 'mimes:jpe?g,png,gif,svg'],
        ];
    }
}
