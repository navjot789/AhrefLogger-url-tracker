<?php
    include "../connection/connect.php";
    session_start();
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
		0 => 'date_time',
		1 => 'ip',
		2 => 'browser',
		3 => 'os',
		4 => 'complete',
		5 => 'country',
		6 => 'region',
		7 => 'isp',
		8 => 'lat',		
	    9 => 'lon'
	  
	);

                                                


	$where_condition = $sqlTot = $sqlRec = "";

	if( !empty($params['search']['value']) ) {
		$where_condition .=	" AND ";
		$where_condition .= " ( tk.country LIKE '%".$params['search']['value']."%' ";    
		$where_condition .= " OR tk.os LIKE '%".$params['search']['value']."%' )";
	
		
	}
	
           function get_time_ago( $time )     //converting nornal time into facebook time ago
            {
                $time_difference = time() - $time;
            
                if( $time_difference < 1 ) { return 'less than 1 second ago'; }
                $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                            30 * 24 * 60 * 60       =>  'month',
                            24 * 60 * 60            =>  'day',
                            60 * 60                 =>  'hour',
                            60                      =>  'minute',
                            1                       =>  'second'
                );
            
                foreach( $condition as $secs => $str )
                {
                    $d = $time_difference / $secs;
            
                    if( $d >= 1 )
                    {
                        $t = round( $d );
                        return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
                    }
                }
            }  
  


	  $sql_query = "SELECT 
                    tk.date_time,
                    tk.ip,
                    tk.browser,
                    tk.os,
                    tk.complete,
                    tk.country,
                    tk.region,
                    tk.isp,
                    tk.lat,
                    tk.lon
                    FROM tracking_data tk, shotner sh WHERE tk.shorturl = sh.shorturl AND sh.track_code='".$_SESSION['TRACK_CODE']."' ";
                    
	$sqlTot .= $sql_query;
	$sqlRec .= $sql_query;
	
	if(isset($where_condition) && $where_condition != '') {

		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}

 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($con, $sqlTot) or die("Database Error:". mysqli_error($con));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($con, $sqlRec) or die("Error to Get the Post details.");

	while( $row = mysqli_fetch_array($queryRecords) ) { 
	    
	    $nestedData=array(); 
	    $nestedData[] = $row["date_time"];
	    $nestedData[] = $row["ip"];
        $nestedData[] = $row["browser"];
        $nestedData[] = $row["os"];
        $nestedData[] = $row["complete"];
        $nestedData[] = $row["country"];
	    $nestedData[] = $row["region"];
        $nestedData[] = $row["isp"];
        $nestedData[] = $row["lat"];
        $nestedData[] = $row["lon"];        
        
        //$nestedData[] ='<a class="fa fa-pencil-square-o" href="'.TEMPLATES_URI.$row['ip'].'" >Edit</a>
        //                      <a class="fa fa-trash" href="'.TEMPLATES_URI.$row['ip'].'" >Delete</a>
        //                      <a class="fa fa-eye" href="'.TEMPLATES_URI.$row['ip'].'" >View</a>';
        
        
        $data[] = $nestedData;
	    
	}	

	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);

	echo json_encode($json_data);

?>