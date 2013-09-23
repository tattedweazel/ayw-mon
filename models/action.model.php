<?php

class Action extends Database{
	
	const ALL_FIELDS = "id, event_id, actor, description, created ";

	public function getAll(){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM actions
				 ORDER BY created DESC
		";
		$results = $this->query($sql);
		return  $this->processResults($results);
	}

	public function getById($id){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM actions
				 WHERE id = ?
		";
		$results = $this->query($sql, array($id));
		return  $this->processResults($results);
	}

	public function getAllByEvent($eventId){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM actions
				 WHERE event_id = ?
				 ORDER BY created DESC
		";
		$results = $this->query($sql, array($eventId));
		return  $this->processResults($results);
	}

	public function getCountByEvent($eventId){
		$sql = "
			SELECT
				id
			 FROM actions
			 WHERE event_id = ?
		";
		$results = $this->query($sql, array($eventId));
		return count($results);
	}

	public function saveAction($eventId, $actor, $description){
		$sql = "
			INSERT INTO actions
			(event_id, actor, description, created) 
			VALUES (?, ?, ?, ?);
		";
		$results = $this->execute($sql, array($eventId, $actor, $description, time()));
		return $results;
	}


}

?>