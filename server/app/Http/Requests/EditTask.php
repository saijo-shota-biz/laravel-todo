<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
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
        $rule = parent::rules();

        return $rule + [
            "status" => [
                "required",
                Rule::in(array_keys(Task::STATUS)),
            ],
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $status_labels = join("、", array_values(Task::STATUS));

        return $messages + [
            "status.in" => ":attributeには{$status_labels}のいずれかを指定してください。"
        ];
    }
}
