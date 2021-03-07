<?php

    session_start();

    error_reporting( 0 );

    if ( !( isset( $_SESSION['Name'] ) ) )
    {
       header( "Location: login.php" );
       exit;
    }
    
    function MakeFormChangePass() 
    {          
       $res = "<div align=\"center\">
                  <table border=\"0\" width=\"1200\" class=table cellspacing = \"0\" cellpadding=\"0\">
	              <tr>
		          <td>
                           &nbsp;<img src=\"images\ic_2.png\">&nbsp;Change login data:
                        </td>
	              </tr>
	
                     <tr>
		          <td>
                           <div align=\"center\">
                              <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">
      
                                 <table border=\"0\" width=\"570\" height=\"170\" class=table_lig cellspacing=\"0\" cellpadding=\"0\">

	                             <tr>
		                         <td>New login:</td>

		                         <td>
		                            <input name=\"newlogin\" class=task value=\"root\" style=\"float: left\">
                                       </td>
		            
                                       <td>
                                          * Please enter new login name.
                                       </td>
	                             </tr>
	      
	                             <tr>
		                         <td>New password:</td>

		                         <td>
		                            <input name=\"newpass\" type=password class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter new password.
                                       </td>
	                             </tr>

	                             <tr>
		                         <td>Observer login:</td>

		                         <td>
		                            <input name=\"obslogin\" class=task value=\"observer\" style=\"float: left\">
                                       </td>
		            
                                       <td>
                                          * Please enter observer login name.
                                       </td>
	                             </tr>

                                    <tr>
		                         <td>Observer password:</td>

		                         <td>
		                            <input name=\"obspass\" type=password class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter observer password.
                                       </td>
	                             </tr>

	                             <tr>
		                         <td>Current password:</td>

		                         <td>
		                            <input name=\"oldpass\" type=password class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter current CP password.
                                       </td>
	                             </tr>
	
                                    <tr>
		                         <td>&nbsp;</td>
		                         <td>&nbsp;</td>		              
                                       <td>&nbsp;</td>
	                             </tr>

                                  </table>

                                  <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	                              <tr>
		                          <td>
                                           <div align=\"center\">
                                              <input type=\"submit\" name=\"submit\" value=\"Save data\" class=\"button\">
                                           </div>
                                        </td>
	                              </tr>
                                  </table>

                               </form>
                           </div>
		          </td>
                     </tr>
                  </table>
               </div>";

       return $res;
    }       

    function MakeFormSQLsettings() 
    {          
       $res = "<div align=\"center\">
                  <table border=\"0\" width=\"1200\" class=table cellspacing = \"0\" cellpadding=\"0\">
	              <tr>
		          <td>
                           &nbsp;<img src=\"images\ic_2.png\">&nbsp;Change SQL base data:
                        </td>
	              </tr>
	
                     <tr>
		          <td>
                           <div align=\"center\">
                              <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">
      
                                 <table border=\"0\" width=\"570\" height=\"180\" class=table_lig cellspacing=\"0\" cellpadding=\"0\">

	                             <tr>
		                         <td>SQL Host:</td>

		                         <td>
		                            <input name=\"sqlhost\" class=task value=\"localhost\" style=\"float: left\">
                                       </td>
		            
                                       <td>
                                          * Please enter SQL server IP or domain name .
                                       </td>
	                             </tr>
	      
                                    <tr>
		                         <td>DataBase Name:</td>

		                         <td>
		                            <input name=\"sqlname\" class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter SQL base name.
                                       </td>
	                             </tr>

	                             <tr>
		                         <td>DataBase user:</td>

		                         <td>
		                            <input name=\"sqluser\" class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter SQL base user name.
                                       </td>
	                             </tr>

	                             <tr>
		                         <td>DataBase password:</td>

		                         <td>
		                            <input name=\"sqlpass\" type=password class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter SQL base user password.
                                       </td>
	                             </tr>

	                             <tr>
		                         <td>Current password:</td>

		                         <td>
		                            <input name=\"oldpass\" type=password class=task style=\"float: left\">
                                       </td>

		                         <td>
                                          * Please enter current CP password.
                                       </td>
	                             </tr>
	
	                             <tr>
		                         <td>&nbsp;</td>
		                         <td>&nbsp;</td>		              
                                       <td>&nbsp;</td>
	                             </tr>

                                 </table>

                                 <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	                             <tr>
		                         <td>
                                          <div align=\"center\">
                                             <input type=\"submit\" name=\"sql\" value=\"Save data\" class=\"button\">
                                          </div>
                                       </td>
	                             </tr>
                                 </table>

                              </form>
                           </div>
		          </td>
                     </tr>
                  </table>
               </div>";

       return $res;
    }         

    function MakeFormCleaningDB() 
    {              
       $res = "<div align=\"center\">
                  <table border=\"0\" width=\"1200\" class=table cellspacing = \"0\" cellpadding=\"0\">
                     <tr>
		          <td>
                           &nbsp;<img src=\"images\ic_2.png\">&nbsp;Delete all units from DB:
                        </td>
	             </tr>
	
                    <tr>
		         <td>
                          <div align=\"center\">
                             <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">
     
                                <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\">
                                   <tr>
		                        <td>&nbsp;</td>

		                        <td>
                                         <div align=\"center\">
                                            <input type=\"submit\" name=\"clear\" value=\"Clear\" class=\"button\">
                                         </div>
                                      </td>
		              
                                      <td>&nbsp;</td>
                                   </tr>
                                </table>

                             </form>
                           
                          </div>
		         </td>
                    </tr>
                  </table>
               </div>";

       return $res;
    }        

    function MakeFormCleaningTask() 
    {              
       $res = "<div align=\"center\">
                  <table border=\"0\" width=\"1200\" class=table cellspacing = \"0\" cellpadding=\"0\">
	              <tr>
		          <td>
                           &nbsp;<img src=\"images\ic_2.png\">&nbsp;Delete all active tasks:
                        </td>
	              </tr>
	
                     <tr>
		          <td>
                           <div align=\"center\">
                              <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">       
                                 <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\">
                                    <tr>
		                         <td>&nbsp;</td>

		                         <td>
                                          <div align=\"center\">
                                             <input type=\"submit\" name=\"cleartasks\" value=\"Delete\" class=\"button\" style=\"float: center\">
                                          </div>
                                       </td>
		              
                                       <td>&nbsp;</td>
                                    </tr>
                                 </table>
                              </form>                           
                           </div>
		          </td>
                     </tr>
                  </table>
               </div>";

       return $res;
    } 

    function MakeFormCreateTable() 
    {              
       $res = "<div align=\"center\">
                  <table border=\"0\" width=\"1200\" class=table cellspacing = \"0\" cellpadding=\"0\">
	              <tr>
		          <td>
                           &nbsp;<img src=\"images\ic_2.png\">&nbsp;Create table in DataBase:
                        </td>
	              </tr>
	
                     <tr>
		          <td>
                           <div align=\"center\">
                              <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">       
                                 <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\">
                                    <tr>
		                         <td>&nbsp;</td>

		                         <td>
                                          <div align=\"center\">
                                             <input type=\"submit\" name=\"createtable\" value=\"Create\" class=\"button\" style=\"float: center\">
                                          </div>
                                       </td>
		              
                                       <td>&nbsp;</td>
                                    </tr>
                                 </table>
                              </form>                           
                           </div>
		          </td>
                     </tr>
                  </table>
               </div>";

       return $res;
    } 

    function SaveConfig( $newlogin, $newpass, $oldpass, $obslogin, $obspass )
    {
       include( "config.php" );

       $clogin = $conf["login"];
       $cpass = $conf["password"];
       $cdbhost = $conf["dbhost"];
       $cdbname = $conf["dbname"];
       $cdbuser = $conf["dbuser"];
       $cdbpass = $conf["dbpass"];

       if ( $cpass == md5( $oldpass ) )
       {
          $pr = "    ";
          $cr = "\r\n";
          $rn = " = ";

          $content = $content . "<?php";

          $content = $content . $cr . $pr . "\$conf[\"login\"]" . $rn . "\"" . $newlogin . "\";";
          $content = $content . $cr . $pr . "\$conf[\"password\"]" . $rn . "\"" . md5( $newpass ) . "\";";
          $content = $content . $cr . $pr . "\$conf[\"observer_login\"]" . $rn . "\"" . $obslogin . "\";";
          $content = $content . $cr . $pr . "\$conf[\"observer_password\"]" . $rn . "\"" . md5( $obspass ) . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbhost\"]" . $rn . "\"" . $cdbhost . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbname\"]" . $rn . "\"" . $cdbname . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbuser\"]" . $rn . "\"" . $cdbuser . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbpass\"]" . $rn . "\"" . $cdbpass . "\";";
          $content = $content . $cr . "?>";

          file_put_contents( "config.php", $content );
          echo "<meta http-equiv=\"refresh\" content=\"1; url=settings.php\">"; 
       }
       else
       {
          echo "Incorrect password!";
       }
    }

    function SaveSQL( $newhost, $newname, $newuser, $newpass, $mainpass )
    {
       include( "config.php" );

       $clogin = $conf["login"];
       $cpass = $conf["password"];
       $ologin = $conf["observer_login"];
       $opass = $conf["observer_password"];
       $cdbhost = $conf["dbhost"];
       $cdbname = $conf["dbname"];
       $cdbuser = $conf["dbuser"];
       $cdbpass = $conf["dbpass"];

       if ( $cpass == md5( $mainpass ) )
       {
          $pr = "    ";
          $cr = "\r\n";
          $rn = " = ";

          $content = $content . "<?php";

          $content = $content . $cr . $pr . "\$conf[\"login\"]" . $rn . "\"" . $clogin . "\";";
          $content = $content . $cr . $pr . "\$conf[\"password\"]" . $rn . "\"" . $cpass . "\";";
          $content = $content . $cr . $pr . "\$conf[\"observer_login\"]" . $rn . "\"" . $ologin . "\";";
          $content = $content . $cr . $pr . "\$conf[\"observer_password\"]" . $rn . "\"" . $opass . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbhost\"]" . $rn . "\"" . $newhost . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbname\"]" . $rn . "\"" . $newname . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbuser\"]" . $rn . "\"" . $newuser . "\";";
          $content = $content . $cr . $pr . "\$conf[\"dbpass\"]" . $rn . "\"" . $newpass . "\";";
          $content = $content . $cr . "?>";

          file_put_contents( "config.php", $content );
          echo "<meta http-equiv=\"refresh\" content=\"1; url=settings.php\">"; 
       }
       else
       {
          echo "Incorrect password!";
       }
    }

    function DeleteUnits()
    {
       include( "config.php" );
       mysql_connect( $conf["dbhost"], $conf["dbuser"], $conf["dbpass"] );
       mysql_select_db( $conf["dbname"] );      
       mysql_query( 'DELETE FROM units' ); 
  
       echo "<meta http-equiv=\"refresh\" content=\"1; url=settings.php\">";    
    }
    
    function DeleteTasks() 
    {
	include( "config.php" );
       mysql_connect( $conf["dbhost"], $conf["dbuser"], $conf["dbpass"] );
       mysql_select_db( $conf["dbname"] );   	   
	mysql_query( "DELETE FROM tasks" );
	mysql_query( "TRUNCATE TABLE tasks_exec" );

       echo "<meta http-equiv=\"refresh\" content=\"1; url=settings.php\">"; 
    }

    function CreateTable()
    {
       include( "config.php" );
       mysql_connect( $conf["dbhost"], $conf["dbuser"], $conf["dbpass"] );
       mysql_select_db( $conf["dbname"] );    
       mysql_query( "CREATE TABLE IF NOT EXISTS `units` ( `id` varchar(10) NOT NULL, `ip` varchar(15) NOT NULL, `online` int(10) NOT NULL, `country` varchar(12) NOT NULL, `version` varchar(6) NOT NULL, `ar` varchar(10) NOT NULL, `arch` varchar(10) NOT NULL, `os` varchar(20) NOT NULL, `reg` int(10) NOT NULL, `av` varchar(15) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=MyISAM" );           
       mysql_query( "CREATE TABLE IF NOT EXISTS `tasks_exec` ( `id` int(11) NOT NULL AUTO_INCREMENT, `task_id` int(11) NOT NULL, `unitid` varchar(16) NOT NULL, `exec` tinyint(1) NOT NULL DEFAULT '0', PRIMARY KEY (`id`), KEY `unitid` (`unitid`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1" );           
       mysql_query( "CREATE TABLE IF NOT EXISTS `tasks` ( `id` int(11) NOT NULL AUTO_INCREMENT, `path` varchar(250) NOT NULL, `run` tinyint(1) NOT NULL, `filetype` tinyint(1) NOT NULL, `autorun` tinyint(1) NOT NULL, `tlimit` int(11) NOT NULL, `units` varchar(200) NOT NULL, `country` varchar(250) NOT NULL, `status` tinyint(1) NOT NULL DEFAULT '1', `loads` int(11) NOT NULL DEFAULT '0', `exec` int(11) NOT NULL DEFAULT '0', `error` int(11) NOT NULL DEFAULT '0', `error2` int(11) NOT NULL DEFAULT '0', PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000001" );     
       
       echo "<meta http-equiv=\"refresh\" content=\"1; url=settings.php\">"; 
    }

    include( "header.php" );

    if ( $_SESSION['Name'] == "OBSERVER" )  
    {
       echo "Please login at root, observers cant change settings"; 
       exit( 0 );
    }

    if( isset( $_POST["submit"] ) ) 
    {        
       SaveConfig( $_POST["newlogin"], $_POST["newpass"], $_POST["oldpass"], $_POST["obslogin"], $_POST["obspass"] );
       die;
    }

    if( isset( $_POST["sql"] ) ) 
    {        
       SaveSQL( $_POST["sqlhost"], $_POST["sqlname"], $_POST["sqluser"], $_POST["sqlpass"], $_POST["oldpass"] ); 
       die;
    }

    if( isset( $_POST["clear"] ) ) 
    {  
       DeleteUnits();     
       die;
    }

    if( isset( $_POST["cleartasks"] ) ) 
    {  
       DeleteTasks();    
       die;
    }

    if( isset( $_POST["createtable"] ) ) 
    {  
       CreateTable();    
       die;
    }

    echo ( MakeFormChangePass() );

    echo "<table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	     <tr>
		<td></td>
	     </tr>
          </table>";

    echo MakeFormSQLsettings();

    echo "<table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	     <tr>
		<td></td>
	     </tr>
          </table>";

    echo ( MakeFormCleaningDB() ); 

    echo "<table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	     <tr>
		<td></td>
	     </tr>
          </table>";

    echo MakeFormCleaningTask();

    echo "<table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	     <tr>
		<td></td>
	     </tr>
          </table>";
    
    echo MakeFormCreateTable();

    echo "</html>";
?>