<?php
	class Db{
		private $connection ;
		function __construct() {
			$this->open_connection() ;
		}

		private function open_connection() {
                        $this->connection = new PDO("mysql:host=localhost;dbname=elledirael", 'root', '');
                        $this->connection->query("set character set utf8");
		}

                public function getStatement($sql) {
                    return $this->connection->prepare($sql);
                }
                
		public function sql($query) {
                        $result = $this->connection->query($query);
			if(!$result) {
				die("Database query failed: ".mysql_error()) ;
			}
			return $result ;
		}
	}
        
?>
