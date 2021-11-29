<?php
class appService extends core {
	public function boot() {
		//
	}
	
	public function register() {
		if (request()->input('ajax'))
			exceptions::declare('validate',function($errors){
				return response()->json([
						'status'=>false,
						'errors'=>$errors
				],500);
			});
	}
}