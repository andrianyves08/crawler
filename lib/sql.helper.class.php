<?php
class SQLHelper extends db{

	function cget_row($table_name="", $where="")
	{		
		if ( $where != "" ) {
			$where = ' WHERE ' . $where ;
		}else{
			$where = '';
		}
		$sql = "SELECT * FROM $table_name " . $where;
		$row = $this->get_row($sql) ;
		return $row;
	}	

	function insert_id($sql)
	{
		mysqli_query($this->dbh,$sql) or die(mysqli_error($this->dbh));
		$id = mysqli_insert_id($this->dbh);
		return $id;
	}

	function insert_all($tablename="",$values=array())
	{
		$fields			= "";
		$data_values	= "";
		$ctr			= 0;
		foreach($values as $key=> $value)
		{
			if( $ctr == 0 )
			{
				if($value == "now")
				{
					$fields			.= "`$key`";
					$data_values	.= "NOW()";
				}
				else
				{
					$fields			.= "`$key`";
					$data_values	.= "'$value'";
				}
			}
			else
			{
				if($value == "now")
				{
					$fields			.= ",`$key`";
					$data_values	.= ", NOW()";
				}
				else
				{
					$fields			.= ",`$key`";
					$data_values	.= ",'$value'";	
				}
			}
			$ctr++;
		}
		$sql	= "INSERT INTO `$tablename` ( $fields ) VALUES ($data_values)";
		//echo $sql."<br><br>"; //exit();
		return $this->insert_id($sql);
	}
	
	function update_all($tablename="", $id="", $id_value,$values=array())
	{		
		$data_values	= "";
		$ctr			= 0;
		foreach($values as $key=> $value)
		{
			if( $ctr == 0 )
			{
				if($value == "now")
					$data_values	.= "`$key` = NOW() ";
					else
					$data_values	.= "`$key` = '$value' ";
			}
			else
			{
				if($value == "now")
					$data_values	.= ",`$key` = NOW() ";
				else
					$data_values	.= ",`$key` = '$value' ";
			}
			$ctr++;
		}
		$sql	= "UPDATE `$tablename` SET $data_values  WHERE `$id` = $id_value ";

	//echo $sql; exit();
		$this->query($sql);
		return mysqli_affected_rows($this->dbh);		
	}
	
	function delete($tablename="",$id="",$id_value)
	{
		$sql	= "DELETE FROM `$tablename` WHERE `$id` = $id_value ";
		$this->query($sql);
		return mysqli_affected_rows($this->dbh);		
	}
	
	
	function where_like($fields=array(), $value="")
	{
		$where = " WHERE (";
		$ctr = 0;
		foreach($fields as $field) 
		{
			$where .= " $field LIKE '%$value%'";
			$ctr++;
			if ( $ctr < count($fields) ) {
				$where .= " OR";
			}
			
		}
		return $where . ") ";
	}
	
	function sql_count($sql)
	{
		$result = 0;
		$rs     = mysql_query($sql);

		if( mysql_num_rows($rs) > 0 )
		{
			$result = mysql_fetch_array($rs);
			$result = $result[0];
		}

		return $result;
	}
}

?>