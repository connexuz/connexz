<?php

namespace App\Http\Requests\Backend\Invite;

use Illuminate\Foundation\Http\FormRequest;

class StoreInviteRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return $this->user()->isAdmin();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$rules = [];
		$rules['name'] = 'required';
		$rules['status'] = 'required';

		return $rules;
	}
}