<?php
	// multi domain
	$dns = $_SERVER['HTTP_HOST'];

	$config['script'] = "music";	
	$config['language'] = "english";
	$config['install_dir'] = "";
//	$config['domain'] = "topworshipsongs.com";
	$config['domain'] = $dns;
	
//	$config['url'] = "http://www.topworshipsongs.com";
	$config['url'] = "http://".$dns;
	$config['noreply']  = "noreply@topworshipsongs.com";
	
	$config['path'] = "C:/xampp/htdocs/Dropbox/musicdb";
	
	$config['page']['song'] = 30; // show songs per page
	$config['cronjob.embed'] = true; // set true if you want cronjob run when website have visitors. Set false, you must setup your website/cronjob run every 3 mins.
	// config database
	
	$config['mysql']['hostname'] = "localhost";
	$config['mysql']['username'] = "root";
	$config['mysql']['password'] = "rootadmin";
	$config['mysql']['port']     = "3306";
	$config['mysql']['database'] = "musicdb";
	$config['mysql']['tab']		 = "msc";
	$config['mysql']['charset']	 = "utf8";
	$config['system']['admin']   = "khoaofgod@yahoo.com";
	
	$config['plugins.security'] = "453156845312156456" ; // the string use for cronjob plugins
	$config['ajax.allowed'] = "10christiansongs.com,10christiansong.com,topworshipsongs.com,topworshipsong.com,khoaofgod.dyndns.org,localhost"; // security risk, remove localhost / add localhost when u want testing only
	
	$config['API']['Bing'] = "659F26E64454B2411C58BE06E0D3FCFD93466113";
	
	
	$config['cookie'] = 3600*24;
	$config['session'] = true;
	$config['session.expire'] = 120; // 120 mins
	$config['themes'] = "default";
	
	
	$config['seo'] = "ascii"; // or 'ascii', 'utf8' or watever
	
	$config['mb_string']  = "UTF-8"; // UTF-8 as MB_STRING of PHP
	$config['htmlentities'] = "UTF-8"; // for htmlentities safe quotes
	
	
	
	
	
	// custom config
		
	$config['admin'][1]['username'] = "admin";
	$config['admin'][1]['password'] = "123456";
	$config['admin'][1]['email'] = "khoaofgod@yahoo.com";
	
	$config['admin'][2]['username'] = "root";
	$config['admin'][2]['password'] = "rootadmin";
	$config['admin'][2]['email'] = "khoaofgod@yahoo.com";
	
		
	// do not change if you don't know
	

?>