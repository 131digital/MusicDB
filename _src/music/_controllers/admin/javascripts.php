<?php

class Cadmin_javascripts extends controllers {
	public function index() {
		global $output;
		$output->ini_javascripts();
	}
}