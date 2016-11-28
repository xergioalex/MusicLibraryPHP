<?php
	/**
	 * Extend SQLite3 class changing the __construct
	 */
	class ProjectDB extends SQLite3 {
	    function __construct($pathToDatabase) {
	        $this->open($pathToDatabase);
	    }
	}
?>