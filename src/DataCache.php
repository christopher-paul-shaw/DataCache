<?php
namespace CPS;

class DataCache {

	public function __construct ($name = 'default', $path = '', $timeout=180) {
		$this->file = "{$path}/DataCache-{$name}.dat";
		$this->cache_time = time() - $timeout;
	}

	public function read () {
		$content = file_get_contents($this->file);
		$modified = filemtime($this->file);
		if ($modified <= $this->cache_time) {
			unlink($this->file);
			return false;
			
		}
		return $content;
	}

	public function write ($data=false) {
		return file_put_contents($this->file, $data);
	}
}
