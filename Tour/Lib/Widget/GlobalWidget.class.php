<?php

class GlobalWidget extends Action {
	public function render() {

		return $_SESSION['name'];
	}
}