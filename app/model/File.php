<?php
class File extends model {
	// Если нужно переназначить имя таблицы
	protected $table='files';
	
	public function create($props) {
		$cid = $props['cid'] ?? 0;
		$file = $props['file'] ?? '';
		$name = $props['name'] ?? '';

		$this->cid = $cid;
		$this->file = $file;
		$this->name = $name;
		return $this->save();
	}
}