<?php

trait GetHash {
	private $hashmethod = 'gost';

	public function hashFunc ($unhashed) {
		$hashed = hash($this->hashmethod, hash($this->hashmethod, $unhashed));
		return ($hashed);
	}
}

?>