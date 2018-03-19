<?php

namespace Mcc\Laravelcms\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Mcc\Laravelcms\Models\Page;

class PageSaveRequest extends FormRequest
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
        $page = request()->route('page');
        // dd($page->id);
        return [
          'title'       => 'required|max:255',
          'uri'         => "unique:pages".( $page ? ',uri,'.$page->id : ''),
          'description' => 'required',
          'layout_id'   => 'required',
        ];
    }
}
