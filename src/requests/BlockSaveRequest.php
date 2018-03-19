<?php

namespace Mcc\Laravelcms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockSaveRequest extends FormRequest
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
      // dd($_POST);
      return [
        'form.*.title'       => 'required|max:255',
        'form.*.layout_id'   => 'required',
        'form.*.active'      => 'required',
        // 'test'               => 'required',
      ];
    }
}
