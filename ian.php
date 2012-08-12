<?



function dateRange( $first, $last, $step = '+1 month', $format = 'd/m/Y' ) {

    $dates = array();
    $current = strtotime( $first );
    $last = strtotime( $last );

    while( $current <= $last ) {

        $dates[] = date( $format, $current );
        $current = strtotime( $step, $current );
    }

    return $dates;
}
$data = dateRange( '2010/11/26', '2011/08/05') ;

foreach($data as $key){
	echo $key;
	echo"<br>";
}