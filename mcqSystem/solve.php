<?php

$GLOBALS['hotsaddr']="localhost";
$GLOBALS['usernm']="madhusudansoul";
$GLOBALS['userpasswordstr']="madhusudan";
$GLOBALS['dbnm']="pramit";







if(isset($_POST['Sending_data'] ))
{

   

    $parameters=json_decode($_POST['Sending_data']);
    $qid=$parameters->qid;
    $ans=$parameters->ans;

	
    // $temp= array('outmsg'=>'outSide the try block' );
    if(empty($qid))
    $temp= array('outmsg'=>'fill up all the fields ..' );
    else{
   // $temp= array('fname' => $fname . 'from backend','lname' => $lname  . 'from backend' );
    try{
        $conn=mysqli_connect($GLOBALS['hotsaddr'],$GLOBALS['usernm'],$GLOBALS['userpasswordstr'],'pramit');
	if($conn)
	{
        $query="select *from mcq where id = "."$qid";
        $re=mysqli_query($conn,$query);
        $result=mysqli_fetch_assoc($re);
        $temp= "Question : ".$result["question"]."<br>"."<ol>"."<li>".$result["op1"]."</li>"."<li>".$result["op2"]."</li>"."<li>".$result["op3"]."</li>"."<li>".$result["op4"]."</li></ol>";
   
	}
	else
	{
    $temp= array('outmsg'=>'connection error ..' );
        
    }

    }
    catch(Exception $e){

    }
}
    echo ( $temp );

}

if(isset($_POST['Sending_data1'] )){
    $parameters=json_decode($_POST['Sending_data1']);
    $ans=$parameters->ans;
    $qid=$parameters->qid;
    if(empty($ans))
    $temp= array('outmsg'=>'fill up all the fields ..' );
    else{
    $conn=mysqli_connect($GLOBALS['hotsaddr'],$GLOBALS['usernm'],$GLOBALS['userpasswordstr'],'pramit');
    if($conn)
	{
        $query="select corop from mcq where id = "."$qid";
        $re=mysqli_query($conn,$query);
        $result=mysqli_fetch_assoc($re);
    }

    if($ans==$result["corop"])
    echo "right ans";
    else
    echo "wrong ans";
}
    
}






?>