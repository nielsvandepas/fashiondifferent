<?php namespace FashionDifferent\Http\Requests;

use FashionDifferent\Element;
use FashionDifferent\Http\Requests\Request;

use Auth;

class UpdateElementRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$elementId = $this->route('element');

		if (Auth::check())
		{
			if (Auth::user() == Element::find($elementId)->user)
				return true;
			else
				return false;
		}
		else
			return false;
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
