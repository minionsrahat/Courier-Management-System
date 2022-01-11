<?php
include('db_connection.php');
include('php_query_functions.php');
session_start();


if(isset($_GET['action'])&& $_GET['action']=="send_request")
{
    save_parcel($con);

}

if(isset($_POST['contact-submit'])){
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $msg=$_POST['msg'];
    $date=date('Y-m-d H:i:s');
    $columns=array('id', 'name', 'user_mail', 'message', 'date');
    $values=array(null,$name,$mail,$msg,$date);
    PushData($con,'feedbacks',$columns,$values);
    header('location:../contact_us.php?success=True');

}

function save_parcel($con){
    extract($_POST);
    $data = "";

       
        foreach($_POST as $key => $val){
            if(!in_array($key, array('id','weight','height','width','length','price')) && !is_numeric($key)){
                if(empty($data)){
                    $data .= " $key='$val' ";
                }else{
                    $data .= ", $key='$val' ";
                }
            }
        }
        if(!isset($type)){
            $data .= ", type='2' ";
        }
            $data .= ", height='{$height}' ";
            $data .= ", width='{$width}' ";
            $data .= ", length='{$length}' ";
            $data .= ", weight='{$weight}' ";
            $price = str_replace(',', '', $price);
			$data .= ", price='{$price}'";
        if(empty($id)){
            $i = 0;
            while($i == 0){
                $ref = sprintf("%'012d",mt_rand(0, 999999999999));
                $chk = $con->query("SELECT * FROM parcels where reference_number = '$ref'")->num_rows;
                if($chk <= 0){
                    $i = 1;
                }
            }
            $data .= ", reference_number='$ref' ";
            if($save[] = $con->query("INSERT INTO parcel_requests set $data"))
                $ids[]= $con->insert_id;
        }
    
    if(isset($save) && isset($ids)){
        // return json_encode(array('ids'=>$ids,'status'=>1));
        echo  $ref;
    }
}


