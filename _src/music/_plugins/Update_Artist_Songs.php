<?php
/* Update Total Songs For Artist
*/

class PLUGINS_Update_Artist_Songs extends controllers {
	var $mute = false;
	function index() {
		global $db,$helper;				
		
		$db->connect();
		$db->set_db();
		
		update_cron_time("Update_Artist_Songs");
		
		$sql = $db->execute("UPDATE ".$db->make_tab_table("artist")." AS A, 
			(SELECT REPLACE(REPLACE(REPLACE(song_artist,'[',''),']',''),',','') as name, count(song_artist) AS Total FROM msc_songs
      	  GROUP BY song_artist
			) AS B SET A.art_total_song = B.Total
		 WHERE A.art_name = B.name");
		 
		 if($this->mute==true) {
			 echo " DONE UPDATED ! ";
		 }
			
	}
}

?>