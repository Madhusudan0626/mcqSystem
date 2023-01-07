<?php

$GLOBALS['hotsaddr']="localhost";
$GLOBALS['usernm']="madhusudansoul";
$GLOBALS['userpasswordstr']="madhusudan";
$GLOBALS['dbnm']="pramit";







if(isset($_POST['Sending_data'] ))
{

   

    $parameters=json_decode($_POST['Sending_data']);
    

	$qun=$parameters->qun;
    $op1=$parameters->op1;
    $op2=$parameters->op2;
    $op3=$parameters->op3;
    $op4=$parameters->op4;
	$cops=$parameters->cops;
    if(empty($qun && $op1 && $op2 && $op3 && $op3 && $cops))
    $temp= array('outmsg'=>'fill up all the fields ..' );
    else{

   // $temp= array('fname' => $fname . 'from backend','lname' => $lname  . 'from backend' );
    try{
        $conn=mysqli_connect($GLOBALS['hotsaddr'],$GLOBALS['usernm'],$GLOBALS['userpasswordstr'],'pramit');
	if($conn)
	{
         
        $sql = "INSERT INTO mcq VALUES (null,'".$qun."','".$op1."','".$op2."','".$op3."','".$op4."',".$cops.")";
        //$sql="insert into mcqs values(12,'kl','l','k','j','o',2)";
       $abc= mysqli_query($conn, $sql);
        $temp= array('outmsg'=>' Your Mcq inserted Successfully' );
   
	}
	else
	{
        
        }

    }
    catch(Exception $e){

    }
}
    echo json_encode( $temp );

}






?>