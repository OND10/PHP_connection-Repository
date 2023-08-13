<?php

function get_from_connection($servername,$username,$password,$databasename)
{
    //Sending data using post form

     $firstname=$_POST['firstname'];
     $age=$_POST['age'];
    
    //creating instance of mysqli class to make connection
    $con=new mysqli($servername,$username,$password,$databasename);

    //Condition if con is false will print die
    if($con->connect_error){
        die('Faild in Connection'.$con->connect_error);
    }
    else{

        //Command of transaction
        $sql=$con->prepare("insert into Users_form (Name,Age) values(?,?)");
        //
       /* `->bind_param("ss",,);` is binding the parameters to the prepared
       statement. */
        $sql->bind_param("ss",$firstname,$age);
        $sql->execute();
        echo "<h4 style='font-size:18px;color:white'>Added Succefully</h4>";
        
    }   
}

get_from_connection("localhost","root","","php_user_admin");

