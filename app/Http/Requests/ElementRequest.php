<?php namespace FashionDifferent\Http\Requests;

use FashionDifferent\Http\Requests\Request;

class ElementRequest extends Request {

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
			'name'		=> 'required',
			'type'		=> 'required',
			'image'		=> 'required|mimes:jpeg,png'
		];
	}

}
