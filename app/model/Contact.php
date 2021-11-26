<?php
class Contact extends model {
	// Если нужно переназначить имя таблицы
	protected $table='contacts';
	
	public function list() {
		return $this->select('name','phone','email')->get();
	}

	public function create($props) {
		$name = $props['name'] ?? '';
		$phone = $props['phone'] ?? '';
		$email = $props['email'];
		
		$this->name = $name;
		$this->phone = $phone;
		$this->email = $email;
		return $this->save();
	}
}