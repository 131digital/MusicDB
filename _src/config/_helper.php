<?php

class helper {
	var $error="";
	var $output;
	var $data;
	var $cookie;

	// function make error , add new error to $error
	public function make_error($error) {
		$this->error.="<br>&radic; ".$error;
	}
	// Reset Error to Blank
	public function reset_error() {
		$this->error="";
	}
	
	function helper() {
		$this->output = new templates();
		$this->data=$_SESSION;
	}
	
	// return fast data as post or get, make error when got problem;
	public function fast($text, $length = 0, $preg = "", $error = "" , $debug = false) {
		global $_POST,$_GET;
		$orgi = $text;
        if($preg == "array") {
            if(isset($_POST[$text])) {
                $text=$_POST[$text];
                return $text;
            } elseif(isset($_GET[$text])) {
                $text=$_GET[$text];
                return $text;
                
            } elseif($length>0) {
                $this->make_error($error);
                if($debug == true) {
                    debug("Hacking System", $text );
                    die("Hacking System");
                    exit;
                }
                return false;
            } elseif($length == 0 ) {
                $text = false;
                return $text;
            }
            return false;
        } else {
            if(isset($_POST[$text])) {
                $text=$_POST[$text];
            } elseif(isset($_GET[$text])) {
                $text=$_GET[$text];

            } elseif($length>0) {
                $this->make_error($error);
                if($debug == true) {
                    debug("Hacking System", $text );
                    die("Hacking System");
                    exit;
                }
                return false;
            } elseif($length == 0 ) {
                $text = "";
                return $text;
            }

            if($preg == "email") {
                $preg = "/[a-zA-Z0-9\_\+\.\-]+\@[a-zA-Z0-9\-\.]+\.[a-zA-Z0-9]+/";
            }elseif($preg == "url") {
                $preg = "/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i";

            }elseif($preg == "number") {
                $preg = "/[0-9]+/";
            }elseif($preg == "phone") {
                $preg = "/[0-9\s\+\-]+/";
            }elseif($preg == "azspace") {
                $preg = "/[a-zA-Z\s]+/";
            }

            if (( (strlen($text) < $length) && ($length > 0 ) ) || ((strlen($text) > 0) && ($preg!="")&&(!preg_match($preg,$text))) )  {
                $this->make_error($error);
            //	debug($orgi." -> ".$text." -> ".$length." -> ".strlen($text)." : ".$preg);
                if($debug == true) {
                    debug("Hacking System", $text );
                    die("Hacking System");
                    exit;
                }
                return false;
            }
        }
        


		
		
		return $text;
		
	}	
	
	// no return, will be stop if don't have or wrong varible
	public function risk($text,$length = 0, $preg = "") {
		if(isset($_POST[$text])) {
			$text=$_POST[$text];
		} else {
			$this->make_error("Risk Check Security");
			debug("Risk Check Security","LENGTH: ".$text);
			exit;			
		}
		
		if($preg == "email") {
			$preg = "/[a-zA-Z0-9\_\+\.\-]+\@[a-zA-Z0-9\-\.]+\.[a-zA-Z0-9]+/";			
		}elseif($preg == "url") {
			$preg = "/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i";			
		}elseif($preg == "number") {
			$preg = "/[0-9]+/";			
		}elseif($preg == "phone") {
			$preg = "/[0-9\s\+\-]+/";
		}elseif($preg == "azspace") {
			$preg = "/[a-zA-Z\s]+/";
		}
		
		if(strlen($text) < $length) {
			$this->make_error("Risk Check Security");			
			debug("Risk Check Security","LENGTH: ".$text);
			exit;
		}
		if(($preg!="")&&(!preg_match($preg,$text))) {
			$this->make_error("Risk Check Security");			
			debug("Risk Check Security","PREG: ". $preg." ".$text);
			exit;			
		}
		return $text;
				
	}
	
	// fast setup order box
	
	public function order_box($table, $col_key, $key,$col_order,$current_order   ) {
		$html = '
		<input type="text" value="'.$current_order.'" class="order-box input-ok tiptip-top" title="Enter New Order Number" name="'.$col_key.'_'.$key.'" key="'.$key.'" order="'.$col_order.'" onfocus="$(this).addClass(\'greenbox\');" onblur="$(this).removeClass(\'greenbox\');" 
				onchange="update_order_box(this,\''.$table.'\',\''.$col_key.'\',\''.$col_order.'\','.$key.');" >';
		return $html;	
	}
	
	
	
	// fast return edit value base on jQuery
	public function set_value($select, $value, $timeout=0, $re=false) {
        $value = un_quotes($value);
		$html = "<script language='javascript'>";
		$html.= '$(document).ready(function() {';
		if($timeout==0 ) {
			$html.= '$("'.$select.'").val("'.$value.'");';
		} else {
			$html.= 'setTimeout("$(\"'.$select.'\").val(\"'.$value.'\");",'.$timeout.');';			
		}
		$html.='});';
		$html.= "</script>";
		if($re ==true ) {
			return $html;
		} else {
			echo $html;
		}
	}





	
	// fast return edit value base on jQuery
	public function set_click($select, $timeout=0, $re=false) {
		$html = "\n<script language='javascript'>\n";
		$html.= '$(document).ready(function() {';
		if($timeout==0 ) {
			$html.= '$("'.$select.'").click();';
		} else {
			$html.= 'setTimeout("$(\"'.$select.'\").click();",'.$timeout.');';			
		}
		$html.='});';
		$html.= "\n</script>\n";
		if($re ==true ) {
			return $html;
		} else {
			echo $html;
		}
	}	
	
	
	
	// return false when NO DUPLICATED
	public function is_duplicated($table,$data = array()) {
		global $db;	
		$where='';	
		$select="";
		foreach($data as $cols=>$value) {
			
			$where.="AND `".$cols."`='".safe_quotes($value)."' ";
			$select .= ",`".$cols."`";
		}
		$where=substr($where,4);
		$select=substr($select,1);
		$sql = $db->get($table,$select,$where,1);
		
		$ht = $db->fetch($sql);
		
		if(count($ht)>1) {
			return true;
		} else {
			return false;
		}
		
	}

    // Set All value of Checkbox by Column in Table
	public function set_checkbox_value($name,$table,$check_key,$where,$re = false) {
		global $db;
		$sql = $db->get($table,"*",$where);		
		$js = '<script language=Javascript >$(document).ready(function() {';
		while($ht = $db->fetch($sql)) {
			$js .= '$("input[type=checkbox][name='.$name.'][value='.$ht[$check_key].']").click();';
		}
		$js .='		
		}); </script>';		
		if($re == false ) {
			echo $js;		
		} else {
			return $js;
		}
		
	}


    // Create + Get Current Page
	function get_current_page($limit="") {
		global $db,$helper,$_SERVER;
		$url = $_SERVER['REQUEST_URI'];
		$page = "";
		preg_match("/page\=([0-9]+)/",$url, $page);
		if(isset($page[0])) {
			$page = str_replace("page=","",$page[0]);	
		} else {
			$page = 1;
		}		
		if($limit !="") {
			$page = round(($page - 1)*$limit,0);
			return $page.", ".$limit;
		}
		return $page;
		
	}

    // Create Nav Page
	function get_page_nav($table="",$key="",$where="",$limit,$url="",$default_total="") {
		global $db,$helper,$_SERVER;
		
		if($url == "") {
			$url = $_SERVER['REQUEST_URI'];
		}
		
		if(strpos($url,"page=") === false ) {			
			$page = 1;
			if(strpos($url,"?") === false) {
				$url =$url."/page=";			
			} else {
				$url = $url."&page=";
			}
		} else {
			preg_match("/page\=([0-9]+)/",$url,$page);
			if(isset($page[0])) {
				$page = str_replace("page=","",$page[0]);
			} else {
				$page = 1;
			}
			$url = preg_replace("/page\=[0-9]+/","page=",$url);
		}
		
		$p = $page-1;	
		$n = $page+1;
	
		$purl = str_replace("page=","page=".$p, $url);
		$nurl = str_replace("page=","page=".$n, $url);;

		if($default_total=="") {
			$total = $db->get_total($table,$key,$where);
		} else {
			$total = $default_total;
		}
		
		$cpage = $page;
		
		if(($total == "")||($total==0)) {
			$total = 1;
		}
		
		
		$html = '';
		if($total > $limit) {
			$all_page = round($total / $limit,0);
            if(is_float($total / $limit) && !is_int($total / $limit)) {
                $all_page++;
            }

		} else {
			$all_page = 1;
		}
						
		if($all_page>1) {		
			
			$html='<ul class="pagination tcenter">';
			if($p>=1) {
				$html.='<li><a href="'.$purl.'" class="page radius">Previous</a></li>';
			}
			
			if($all_page<=10) {
				for($i=1;$i<=$all_page;$i++) {	
					if($i==$cpage) {
						$html .= ' <li><span class="page-active radius">'.$i.'</span></li>';
					} else {
						$html.='<li><a href="'.str_replace("page=","page=".$i, $url).'" class="page radius">'.$i.'</a></li>';
					}							
				}
			} else {
				
				$min=$page-5;
				$max=$page+5;
				if($min<=0) {
						$min=1;
						$max=10;
				}
				if($max>$all_page) {
						$max=$all_page;
				}
				if($min>5) {
					$html.='<li><a href="'.str_replace("page=","page=1", $url).'" class="page radius">First</a></li>';
				}
				
				for($i=$min;$i<=$max;$i++) {						
					if($i==$cpage) {
						$html .= ' <li><span class="page-active radius">'.$i.'</span></li>';
					} else {
						$html.='<li><a href="'.str_replace("page=","page=".$i, $url).'" class="page radius">'.$i.'</a></li>';
					}							
				}	
			
				
			}
			if($n <= $all_page) {
				$html.='<li><a href="'.$nurl.'" class="page radius">Next</a></li>';
			}

			if(isset($max)) {
				if ($max<$all_page)
					$html.='<li><a href="'.str_replace("page=","page=".$all_page, $url).'" class="page radius">Last</a></li>';
			}	
		
			$html .= '<li><span class="page-inactive radius">Page '.$cpage.' of '.$all_page.'</span></li>
		   </ul>';	
		}
	   
	   return $html;	
	}
	
	
	
	
	
	public function check_ref() {
		global $config,$_SERVER,$db;
		if((strpos($config['ajax.allowed'],"localhost") === false )&&(!isset($_SERVER['HTTP_REFERER']))) {
			debug("Hacking System","NO HTTP REFERER ON AJAX");
			exit;
		} 
		
		if(isset($_SERVER['HTTP_REFERER'])) {
			$ref = $_SERVER['HTTP_REFERER'];
		} else {
			$ref = "http://localhost";
		}
		
		$ex = explode("/",$ref);
		$domain = str_replace("www.","",strtolower($ex[2]));
		if(isset($config['ajax.allowed'])) {
			if((strpos($config['ajax.allowed'],"localhost") === false )&&(strpos($config['ajax.allowed'],$domain) === false)) {
					debug("Risk Security Ajax Allowed Domain",$domain." : ".$_SERVER['HTTP_REFERER']);
					exit;
			}			
		}
	}
	
	function list_countries() {
		$html=' <option value=us>United States</option>
				<option value=vn>Vietnam</option>
				<option value=cn>China</option>
				<option value=kr>South Korea</option>
				<option value=> ------------- </option>
				<option value=af>Afghanistan</option>
				<option value=ax>Aland Islands</option>
				<option value=al>Albania</option>
				<option value=dz>Algeria</option>
				<option value=as>American Samoa</option>
				<option value=ad>Andorra</option>
				<option value=ao>Angola</option>
				<option value=ai>Anguilla</option>
				<option value=aq>Antarctica</option>
				<option value=ag>Antigua and Barbuda</option>
				<option value=ar>Argentina</option>
				<option value=am>Armenia</option>
				<option value=aw>Aruba</option>
				<option value=au>Australia</option>
				<option value=at>Austria</option>
				<option value=az>Azerbaijan</option>
				<option value=bs>Bahamas</option>
				<option value=bh>Bahrain</option>
				<option value=bd>Bangladesh</option>
				<option value=bb>Barbados</option>
				<option value=by>Belarus</option>
				<option value=be>Belgium</option>
				<option value=bz>Belize</option>
				<option value=bj>Benin</option>
				<option value=bm>Bermuda</option>
				<option value=bt>Bhutan</option>
				<option value=bo>Bolivia</option>
				<option value=ba>Bosnia and Herzegovina</option>
				<option value=bw>Botswana</option>
				<option value=bv>Bouvet Island</option>
				<option value=br>Brazil</option>
				<option value=io>British Indian Ocean Territory</option>
				<option value=vg>British Virgin Islands</option>
				<option value=bn>Brunei</option>
				<option value=bg>Bulgaria</option>
				<option value=bf>Burkina Faso</option>
				<option value=bi>Burundi</option>
				<option value=kh>Cambodia</option>
				<option value=cm>Cameroon</option>
				<option value=ca>Canada</option>
				<option value=cv>Cape Verde</option>
				<option value=ky>Cayman Islands</option>
				<option value=cf>Central African Republic</option>
				<option value=td>Chad</option>
				<option value=cl>Chile</option>
				<option value=cn>China</option>
				<option value=cx>Christmas Island</option>
				<option value=cc>Cocos (Keeling) Islands</option>
				<option value=co>Colombia</option>
				<option value=km>Comoros</option>
				<option value=cg>Congo</option>
				<option value=ck>Cook Islands</option>
				<option value=cr>Costa Rica</option>
				<option value=hr>Croatia</option>
				<option value=cu>Cuba</option>
				<option value=cy>Cyprus</option>
				<option value=cz>Czech Republic</option>
				<option value=cd>Democratic Republic of Congo</option>
				<option value=dk>Denmark</option>
				<option value=xx>Disputed Territory</option>
				<option value=dj>Djibouti</option>
				<option value=dm>Dominica</option>
				<option value=do>Dominican Republic</option>
				<option value=tl>East Timor</option>
				<option value=ec>Ecuador</option>
				<option value=eg>Egypt</option>
				<option value=sv>El Salvador</option>
				<option value=gq>Equatorial Guinea</option>
				<option value=er>Eritrea</option>
				<option value=ee>Estonia</option>
				<option value=et>Ethiopia</option>
				<option value=fk>Falkland Islands</option>
				<option value=fo>Faroe Islands</option>
				<option value=fm>Federated States of Micronesia</option>
				<option value=fj>Fiji</option>
				<option value=fi>Finland</option>
				<option value=fr>France</option>
				<option value=gf>French Guyana</option>
				<option value=pf>French Polynesia</option>
				<option value=tf>French Southern Territories</option>
				<option value=ga>Gabon</option>
				<option value=gm>Gambia</option>
				<option value=ge>Georgia</option>
				<option value=de>Germany</option>
				<option value=gh>Ghana</option>
				<option value=gi>Gibraltar</option>
				<option value=gr>Greece</option>
				<option value=gl>Greenland</option>
				<option value=gd>Grenada</option>
				<option value=gp>Guadeloupe</option>
				<option value=gu>Guam</option>
				<option value=gt>Guatemala</option>
				<option value=gn>Guinea</option>
				<option value=gw>Guinea-Bissau</option>
				<option value=gy>Guyana</option>
				<option value=ht>Haiti</option>
				<option value=hm>Heard Island and Mcdonald Islands</option>
				<option value=hn>Honduras</option>
				<option value=hk>Hong Kong</option>
				<option value=hu>Hungary</option>
				<option value=is>Iceland</option>
				<option value=in>India</option>
				<option value=id>Indonesia</option>
				<option value=ir>Iran</option>
				<option value=iq>Iraq</option>
				<option value=xe>Iraq-Saudi Arabia Neutral Zone</option>
				<option value=ie>Ireland</option>
				<option value=il>Israel</option>
				<option value=it>Italy</option>
				<option value=ci>Ivory Coast</option>
				<option value=jm>Jamaica</option>
				<option value=jp>Japan</option>
				<option value=jo>Jordan</option>
				<option value=kz>Kazakhstan</option>
				<option value=ke>Kenya</option>
				<option value=ki>Kiribati</option>
				<option value=kw>Kuwait</option>
				<option value=kg>Kyrgyzstan</option>
				<option value=la>Laos</option>
				<option value=lv>Latvia</option>
				<option value=lb>Lebanon</option>
				<option value=ls>Lesotho</option>
				<option value=lr>Liberia</option>
				<option value=ly>Libya</option>
				<option value=li>Liechtenstein</option>
				<option value=lt>Lithuania</option>
				<option value=lu>Luxembourg</option>
				<option value=mo>Macau</option>
				<option value=mk>Macedonia</option>
				<option value=mg>Madagascar</option>
				<option value=mw>Malawi</option>
				<option value=my>Malaysia</option>
				<option value=mv>Maldives</option>
				<option value=ml>Mali</option>
				<option value=mt>Malta</option>
				<option value=mh>Marshall Islands</option>
				<option value=mq>Martinique</option>
				<option value=mr>Mauritania</option>
				<option value=mu>Mauritius</option>
				<option value=yt>Mayotte</option>
				<option value=mx>Mexico</option>
				<option value=md>Moldova</option>
				<option value=mc>Monaco</option>
				<option value=mn>Mongolia</option>
				<option value=me>Montenegro</option>
				<option value=ms>Montserrat</option>
				<option value=ma>Morocco</option>
				<option value=mz>Mozambique</option>
				<option value=mm>Myanmar</option>
				<option value=na>Namibia</option>
				<option value=nr>Nauru</option>
				<option value=np>Nepal</option>
				<option value=an>Netherlands Antilles</option>
				<option value=nl>Netherlands</option>
				<option value=nc>New Caledonia</option>
				<option value=nz>New Zealand</option>
				<option value=ni>Nicaragua</option>
				<option value=ne>Niger</option>
				<option value=ng>Nigeria</option>
				<option value=nu>Niue</option>
				<option value=nf>Norfolk Island</option>
				<option value=kp>North Korea</option>
				<option value=mp>Northern Mariana Islands</option>
				<option value=no>Norway</option>
				<option value=om>Oman</option>
				<option value=pk>Pakistan</option>
				<option value=pw>Palau</option>
				<option value=ps>Palestinian Territories</option>
				<option value=pa>Panama</option>
				<option value=pg>Papua New Guinea</option>
				<option value=py>Paraguay</option>
				<option value=pe>Peru</option>
				<option value=ph>Philippines</option>
				<option value=pn>Pitcairn Islands</option>
				<option value=pl>Poland</option>
				<option value=pt>Portugal</option>
				<option value=pr>Puerto Rico</option>
				<option value=qa>Qatar</option>
				<option value=re>Reunion</option>
				<option value=ro>Romania</option>
				<option value=ru>Russia</option>
				<option value=rw>Rwanda</option>
				<option value=sh>Saint Helena and Dependencies</option>
				<option value=kn>Saint Kitts and Nevis</option>
				<option value=lc>Saint Lucia</option>
				<option value=pm>Saint Pierre and Miquelon</option>
				<option value=vc>Saint Vincent and the Grenadines</option>
				<option value=ws>Samoa</option>
				<option value=sm>San Marino</option>
				<option value=st>Sao Tome and Principe</option>
				<option value=sa>Saudi Arabia</option>
				<option value=sn>Senegal</option>
				<option value=rs>Serbia</option>
				<option value=sc>Seychelles</option>
				<option value=sl>Sierra Leone</option>
				<option value=sg>Singapore</option>
				<option value=sk>Slovakia</option>
				<option value=si>Slovenia</option>
				<option value=sb>Solomon Islands</option>
				<option value=so>Somalia</option>
				<option value=za>South Africa</option>
				<option value=gs>South Georgia and South Sandwich Islands</option>
				<option value=kr>South Korea</option>
				<option value=es>Spain</option>
				<option value=pi>Spratly Islands</option>
				<option value=lk>Sri Lanka</option>
				<option value=sd>Sudan</option>
				<option value=sr>Suriname</option>
				<option value=sj>Svalbard and Jan Mayen</option>
				<option value=sz>Swaziland</option>
				<option value=se>Sweden</option>
				<option value=ch>Switzerland</option>
				<option value=sy>Syria</option>
				<option value=tw>Taiwan</option>
				<option value=tj>Tajikistan</option>
				<option value=tz>Tanzania</option>
				<option value=th>Thailand</option>
				<option value=tg>Togo</option>
				<option value=tk>Tokelau</option>
				<option value=to>Tonga</option>
				<option value=tt>Trinidad and Tobago</option>
				<option value=tn>Tunisia</option>
				<option value=tr>Turkey</option>
				<option value=tm>Turkmenistan</option>
				<option value=tc>Turks And Caicos Islands</option>
				<option value=tv>Tuvalu</option>
				<option value=vi>US Virgin Islands</option>
				<option value=ug>Uganda</option>
				<option value=ua>Ukraine</option>
				<option value=ae>United Arab Emirates</option>
				<option value=uk>United Kingdom</option>
				<option value=um>United States Minor Outlying Islands</option>
				<option value=us>United States</option>
				<option value=uy>Uruguay</option>
				<option value=uz>Uzbekistan</option>
				<option value=vu>Vanuatu</option>
				<option value=va>Vatican City</option>
				<option value=ve>Venezuela</option>
				<option value=vn>Vietnam</option>
				<option value=wf>Wallis and Futuna</option>
				<option value=eh>Western Sahara</option>
				<option value=ye>Yemen</option>
				<option value=zm>Zambia</option>
				<option value=zw>Zimbabwe</option>';
		return $html;
						
	}
	
	function mailbox ($title,$type,$email,$body,$status="pending") {
		global $db,$helper;
		$data['box_text'] = "From: $email \n--------------\n $body \n";
		$data['box_title'] = $title;
		$data['box_status'] = $status;
		$data['box_type'] = $type;
		
		$db->insert("mail_inbox",$data);
		
	}
	
	function send_mail($type="php",$email,$subject,$body,$from="",$name="",$bcc="") {
		global $config;
		if($name=="") {
			$name = $config['domain'];
		}
		if($from=="") {
			$from = $config['noreply'];
		}
		
		if($bcc=="") {
			$bcc=$config['system']['admin'];
		}
		
		$header = "From: ".$name."<".$from.">\n" .
		"MIME-Version: 1.0\n" .
		"Content-type: text/html; charset=UTF-8";	
			
		if($bcc!=false) {
			$header .= "Bcc: ".$bcc."\r\n";
		}
		if($type!="smtp") {
			if(@mail($email,$subject,$body,$header)) {
				// ok
			} else {
				debug("E-Mail Problem  ","To :".$email." Body: ".$body);
			}
		}
	}
	
}



?>