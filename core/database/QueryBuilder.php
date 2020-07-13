<?php

namespace Core\Database;
use PDO;

class QueryBuilder 
{
	protected $pdo;
	public function __construct($pdo)
	{	
		$this->pdo = $pdo;
	}

	public function selectAll($table) 
	{
		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();
		// Generally little careful about it, fetch
		return $statement->fetchAll(PDO::FETCH_CLASS);		
	}

	public function selectById($table, $id) 
	{
		$statement = $this->pdo->prepare("select * from {$table} WHERE id = {$id}");

		$statement->execute();
		// Generally little careful about it, fetch
		return $statement->fetch(PDO::FETCH_ASSOC);		
	}

	public function insert($table, $parameters)
	{
		$sql = sprintf(
			'insert into %s (%s) values (%s)',
			$table,
			implode(', ', array_keys($parameters)),
			':' . implode(', :', array_keys($parameters))
		);

		try {
			$statement = $this->pdo->prepare($sql);
			$statement->execute($parameters); // bindParam - named placeholder
		} catch(Exception $e) {
			die('Whoops, something went wrong.');
		}
		return true;
	}

	public function update($table,$id, $params)
	{
       // $sql =  array_keys($params).'=:' . array_keys($params);
 
        $str ='';
        foreach ($params as $key => $value) {
        	$str.= $key."=:".$key.",";
        	
        }
         $str = substr($str,0,-1);

         print_r($str);
			
         $statment = $this->pdo->prepare("update {$table} SET $str WHERE id ={$id}");
         $statment->execute($params);
         return true;
        
           
           
	}

	public function selectLastId($table)
	{
		$lastId = $this->pdo->prepare("select id from {$table} order by id desc limit 1");
		$lastId->execute();
		return $lastId->fetch(PDO::FETCH_ASSOC);
	}

	public function deleteById($table,$id)
	{
		$del = $this->pdo->prepare("DELETE  FROM {$table}  WHERE id ={$id}");
		$del->execute();
		return true;
	}
}