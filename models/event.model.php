<?php

class Event extends Database{
	
	const ALL_FIELDS = "id, type, server, description, details, created, status, updated ";

	public function getAll($orderBy = false){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM events
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql);
		return  $this->processResults($results);
	}

	public function getCount(){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM events
		";
		$results = $this->query($sql);
		return  count($results);
	}

	public function getById($id, $orderBy = false){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM events
				 WHERE id = ?
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql, array($id));
		return  $this->processResults($results);
	}

	public function getAllStatus($status, $orderBy = false){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE status = ?
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql, array($status));
		return  $this->processResults($results);
	}

	public function getAllType($type, $orderBy = false){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE type = ?
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql, array($type));
		return  $this->processResults($results);
	}

	public function getCountStatus($status){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE status = ?
		";
		$results = $this->query($sql, array($status));
		return count($results);
	}

	public function getCountType($type){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE type = ?
		";
		$results = $this->query($sql, array($type));
		return  count($results);
	}

	public function getAllTypeByStatus($type, $status, $orderBy = false){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE type = ?
			 AND status = ?
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql, array($type, $status));
		return  $this->processResults($results);
	}

	public function getCountTypeByStatus($type, $status){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE type = ?
			 AND status = ?
		";
		$results = $this->query($sql, array($type, $status));
		return count($results);
	}

	public function getAllByLocation($location, $orderBy = false){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE server = ?
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql, array($location));
		return $results;
	}

	public function getCountByLocation($location){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE server = ?
		";
		$results = $this->query($sql, array($location));
		return count($results);
	}

	public function getAllTypeByLocation($type, $location, $orderBy = false){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE type = ?
			 AND server = ?
		";
		if ($orderBy){
			$sql .= " ORDER BY $orderBy";
		}
		$results = $this->query($sql, array($type, $location));
		return  $this->processResults($results);
	}

	public function getCountTypeByLocation($type, $location){
		$sql = "
			SELECT 
				".$this::ALL_FIELDS."
			 FROM events
			 WHERE type = ?
			 AND sever = ?
		";
		$results = $this->query($sql, array($type, $location));
		return  count($results);
	}



	public function saveEvent($server, $type, $description, $details){
		$time = time();
		$sql = "
			INSERT INTO events
			(server, type, description, details, created, updated) 
			VALUES (?, ?, ?, ?, ?, ?);
		";
		$results = $this->execute($sql, array($server, $type, $description, $details, $time, $time));
		return $results;
	}

	public function updateEventStatus($id, $status){
		$sql = "
			UPDATE events
			SET status = ?, updated = ?
			WHERE id = ?
		";
		$results = $this->update($sql,array($status, time(), $id));
		return $results;
	}

	public function customQuery($sql){
		$this->query($sql);
	}
}

?>