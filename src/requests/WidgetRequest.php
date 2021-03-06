<?php

namespace Mcc\Laravelcms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WidgetRequest extends FormRequest
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
        'widget.name' => 'required|max:255',
        'widget.layout' => 'required',        
        // 'widget.tests' => 'required|max:255',
      ];
    }
}
