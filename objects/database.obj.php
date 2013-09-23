<?php

class Database {
	public $connection;
	public $queries;
	public $lastQuery;

	const DB_HOST = MYSQL_HOST;
	const DB_USER = MYSQL_USER;
	const DB_PASS = MYSQL_PASS;
	const DB_BASE = MYSQL_DB;
	public $functions;

	public function __construct(){
		global $red;
		$this->functions = $red->showFunctions($this);
	}

	/**
	* connects to database... obviously. Nothing special really...
	* Sets Database->connection on success
	*/
	public function connect(){
		$db = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_BASE.';charset=utf8', self::DB_USER, self::DB_PASS);
		$this->connection = $db;
	}

	/**
	* Used for queries. Surprise.
	* @param $sql <string> the actual sql statement. May include markers (?)
	* @param $params <array> params to fill in markers... keep'm in order of your ? or you're a dum
	*/
	public function query($sql, $params = array()){
        $this->connect();
        $stmt = $this->connection->prepare($sql);
		$stmt->execute($params);
		$this->lastQuery = $sql;
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		$resultSet = new ResultSet($sql, $params, count($result));
		$this->queries[] = $resultSet;
        return  $result;
	}

	/** 
	* Used to insert or update. Returns the id of the last insert
	* @param $sql <string> the actual sql statement. May include markers (?)
	* @param $params <array> params to fill in markers
	*/
	public function execute($sql, $params = array()){
		$this->connect();
        $stmt = $this->connection->prepare($sql);
		$stmt->execute($params);
		$effectedId = $this->connection->lastInsertId();
		$resultSet = new ResultSet($sql, $params, $effectedId);
		$this->queries[] = $resultSet;
        return  $effectedId;
	}

	public function update($sql, $params = array()){
		$this->connect();
        $stmt = $this->connection->prepare($sql);
		$success = $stmt->execute($params);
		$resultSet = new ResultSet($sql, $params, $success);
		$this->queries[] = $resultSet;
        return  $success;
	}

	/**
	* Takes passed in results array and returns it in a Data object
	*/
	public function processResults($results){
		$ret = new Data();
		foreach ($results as $resultRow){
			$ret->addProp($resultRow->id, new Data());
			foreach($resultRow as $key => $value){
				if ($key == 'created' || $key == 'updated'){
					$value = date('D M jS  Y - H:i:s', $value);
				}
				if ($key == 'details'){
					$value = unserialize(str_replace('\\', '', $value));
				}
				$ret->{$resultRow->id}->addProp($key, $value);
			}
		}
		return $ret;
	}

}

class ResultSet {
	public $sql;
	public $params;
	public $rows;

	public function __construct($sql, $params, $result){
		$this->sql = $sql;
		$this->params = $params;
		$this->rows = $result;
	}
}
?>
