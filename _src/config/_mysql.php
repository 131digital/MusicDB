<?php
class mysql {
	
	var $hostname="";
	var $username="";
	var $password="";	
	var $port="";
	var $link="";
	var $result="";
	var $tab="";
	var $database="";
	var $tmp = array();
	var $query="";
	var $where="";
	var $table="";
	var $total="";
	
	function connect() {
		global $config;
		if($this->hostname=="") {			
			$this->hostname	= $config['mysql']['hostname'];
			$this->port 	= $config['mysql']['port'];
			$this->username	= $config['mysql']['username'];
			$this->password = $config['mysql']['password'];
			
			if($config['mysql']['tab']!="") {
				$this->tab  = $config['mysql']['tab'];
			}
		}
		$this->link = mysql_connect($this->hostname.":".$this->port,$this->username,$this->password);				
	}
	
	function set_db() {
		global $config;	
		if($this->database=="") {
			$this->database = $config['mysql']['database'];
		}
		
		mysql_select_db($this->database,$this->link);
		mysql_query("SET NAMES '".$config['mysql']['charset']."';");
		mysql_set_charset($config['mysql']['charset'],$this->link);
		
	}
	
	function close() {
		mysql_close($this->link);
	}
	
	// ADD TABLE INTO TABLE
	public function make_tab_table($table) {		
		if(strpos($table,'.') === false ) {
			$table = $this->tab."_".$table;	
		} else {
			$table = str_replace('.',$this->tab."_",$table);
		}
		return $table;
	}
	
	function get_total($table,$key,$where="") {
		if(strpos($table,'|') === false ) {					
			$query = "SELECT COUNT(".$key.") AS Total FROM ".$this->make_tab_table($table);	
		} else {
			$ex = explode("|",$table);	
			$table = $this->make_tab_table($ex[0]);					
			$query = "SELECT COUNT(".$key.") AS Total FROM ".$table." AS T1 ";
			
			for($i=1;$i<=count($ex);$i++) {
				$j=$i+1;
				if(isset($ex[$i])) {
					$t = explode(":",$ex[$i]);
					if(count($t) == 2 ) {
						$join = " LEFT JOIN ";
						$table = $this->make_tab_table($t[0])." AS T".$j." ";
						$on = " ON ".$t[1];
					} else {
						$join = " ".$t[0]." ";
						$table = $this->make_tab_table($t[1])." AS T".$j." ";
						$on = " ON ".$t[2];					
					}
					$query .= $join." ".$table." ".$on." ";				
				}
			}			
		}
				
		
		if($where!="") {
			$query .= " WHERE ".$where;
		}
		$sql = $this->execute($query);
		$ht = $this->fetch($sql);
		return $ht['Total'];
	}
	

	// use for query, "|" for JOIN LIKE :LEFT JOIN:TABLE:T1.WWW = T2.WWW
	function get($table,$select="*", $where = "", $limit = "", $order = "") {
		$this->table = $table;
		if(strpos($table,'|') === false ) {
			$table =  $this->make_tab_table($table);		
			$query = "SELECT ".$select." FROM ".$table;			
		} else {
			$ex = explode("|",$table);	
			$table = $this->make_tab_table($ex[0]);					
			$query = "SELECT ".$select." FROM ".$table." AS T1 ";
			
			for($i=1;$i<=count($ex);$i++) {
				$j=$i+1;
				if(isset($ex[$i])) {
					$t = explode(":",$ex[$i]);
					if(count($t) == 2 ) {
						$join = " LEFT JOIN ";
						$table = $this->make_tab_table($t[0])." AS T".$j." ";
						$on = " ON ".$t[1];
					} else {
						$join = " ".$t[0]." ";
						$table = $this->make_tab_table($t[1])." AS T".$j." ";
						$on = " ON ".$t[2];					
					}
					$query .= $join." ".$table." ".$on." ";				
				}
			}			
		}
		
		if($where != "") {
			$query .= " WHERE ".$where;
			$this->where = $where;
		}
		if($order !="") {
			$query .= " ORDER BY ".$order;
		}		
		if($limit !="") {
			$query .= " LIMIT ".$limit;			
		}		
		return $this->execute($query);				
	}				
	
			
	
	// use for fast select EDIT Data
	function fast_get($table,$where = "",$order="",$select="*") {
		$this->table = $table;
		$sql = $this->get($table,$select,$where,1,$order);
		$ht = $this->fetch($sql);
		if(count($ht)>1) {
			return $ht;							
		} else {
			return false;
		}

	}
	

	
	
	function execute($sql,$die = false) {
		$this->query = $sql;
		$this->result = "";
		if($die==false) {
			$this->result =  mysql_query($sql,$this->link) or debug("SQL ERROR",$sql." -- ".mysql_error());
		} else {
			$this->result =  mysql_query($sql,$this->link) or die($sql." -- ".mysql_error());
		}
		
		if($this->result=="") {
			debug("SQL ERROR", $sql." -- ".mysql_error());			
		}
		// $this->total = mysql_num_rows($this->result);
		return $this->result;

	}
	
	function fetch($sql = "") {
		if($sql=="") {
			return mysql_fetch_array($this->result);
		} else {
			return mysql_fetch_array($sql);		
		}
	}
	
	function insert($table,$data = array(), $die=false) {
		$table = $this->tab."_".$table;		
		$cols = "";
		$vals = "";
		foreach($data as $col=>$value) {
			$value = safe_quotes($value);
			$cols .= ", `".$col."` ";
			if(substr($value,0,2) == "__") {
				$vals .= ", ".substr($value,2)." ";				
			} else {
				$vals .= ", '".$value."' ";
			}
		}
		
		$query = "INSERT INTO ".$table." ( ".substr($cols,1)." ) VALUES ( ".substr($vals,1)." ) ";			
		return $this->execute($query, $die);		
				
	}
	
	function update($table, $data = array(), $where = "", $limit = "", $die=false) {
		$table = $this->tab."_".$table;		
		$set = "";
		foreach($data as $col=>$value) {			
			if(substr($value,0,2) == "__") {
				$set .= ", `".$col."`=".substr($value,2)." ";			
			} else {
				$value = safe_quotes($value);
				$set .= ", `".$col."`='".$value."' ";
			}
						
			
		}
		if($where != "" ){
			$where = " WHERE ".$where;
		}
		if($limit != "") {
			$limit = " LIMIT ".$limit;
		}
		$query = "UPDATE ".$table." SET ".substr($set,1)." ".$where." ".$limit;	
	//	debug("Query:",$query);	
		return $this->execute($query, $die);				
	}
	
	function delete($table, $where, $limit = "all", $die=false) {
		$table = $this->tab."_".$table;	
		
		if($where!="") {
			$where = " WHERE ".$where." ";
		}
		
		$query = "DELETE FROM ".$table." ".$where;
		if(($limit != "all" )&&($limit != "" )) {
			$query .= " LIMIT ".$limit;
		}
		return $this->execute($query, $die);		
	}
	
	function fast_increase($table,$data,$where="",$limit="") {
		$ex = explode("|",$data);		
		$set = '';		
		foreach($ex as $col) {
			$set.=', `'.$col.'` = `'.$col.'` + 1';
		}
		$set=substr($set,1);
		
		$sql = "UPDATE ".$this->make_tab_table($table)." SET ".$set;
		if($where!="") {
			$sql .= " WHERE ".$where;
		}
		if($limit!="") {
			$sql .= " LIMIT ".$limit;
		}
		
		// debug($sql);
		$sql = $this->execute($sql);
		
	}
	
	function query($sql,$total="") {
		$sql = str_replace("TAB_",$this->tab."_",$sql);
//		echo $sql;
		$this->execute($sql);
		if($total!="") {
			$p = strpos(strtolower($sql),"limit ");
			if($p === false) {
					// skip
			} else {
				$sql = substr($sql,0,$p);
				$sql = "SELECT COUNT(".$total.") AS Total FROM (".$sql.") AS T1";
				
				$sql = mysql_query($sql);
				$tmp = mysql_fetch_array($sql);
				$this->total = $tmp['Total'];
				
			}
		}
	}
	
	
}
?>