<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreToolsRequest extends FormRequest
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
          'name' => 'min:3|max:191|required',
          'projects' => 'required',
          'projects.*' => 'exists:projects,id',
          'publication_date' => 'required|date_format:'.config('app.date_format'),
          'type_of_data_available' => 'min:3|max:191|required',
          'description' => 'required',
          'keywords' => 'required',
          'link' => 'min:3|max:191',
        ];
    }
}
