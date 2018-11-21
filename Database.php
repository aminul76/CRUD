<?php
Class Database{
	public $host=BD_HOST;
	public $user= BD_USER;
	public $pass= BD_PASS;
	public $dbname= BD_NAME;

	public $link;
	public $error;
	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->link=new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link)
		{
			$this->error="Connection fail".$this->link->connect_error;
			return false;
		}
	
		}
		//select or read data 
	public function select($query){
		$result=$this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows>0){
			return $result;
		}else{
			return false;
		}
	}

	public function insert($query){
		$insert_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			header("location:index.php?msg=".urldecode('Data Inserted successfully'));
			exit();
		}else{
			die("Error:(".$this->link->error.")".$this->link->erro);
		}
	}
	//Update data
	public function update($query){
		$update_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			header("location:index.php?msg=".urldecode('Data Inserted successfully'));
			exit();
		}else{
			die("Error:(".$this->link->error.")".$this->link->erro);
		}
	  }
	public function delete($query){
		$delete_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			header("location:index.php?msg=".urldecode('Data Inserted successfully'));
			exit();
		}else{
			die("Error:(".$this->link->error.")".$this->link->erro);
		}
	  }
	}