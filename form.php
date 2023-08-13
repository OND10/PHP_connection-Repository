


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>DataBase</title>


    <style>

td,th,h2{
    color:white;
    font-weight:bold;
    font-family:cursive;
}

h2{
    text-align:center;
}

    </style>
</head>
<body style="margin:50px;background:black;">
    <h2>List of Users</h2>
    <br>

    <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Buttons</th>
        </tr>
        
    </thead>

    <tbody>

<?php

//This is followed by the connection
// $servername="localhost";
// $username="root";
// $password="";
// $database="php_user_admin";





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

//  $sqll="select * from Users_form";
//        $result=$con->query($sqll);
//        $data=$result->fetch_all(MYSQLI_ASSOC);
//        if(!$result){
//         die("Invalid query" . $con->error);
//        }

//        foreach($data as $row){
//         echo "<tr>
                        
//                 <td>" . $row["Id"] . "</td>
//                 <td>" . $row["Name"] . "</td>
//                 <td>" . $row["Age"] . "</td>
        
//                 <td>
                
//                 <a class='btn btn-primary' href='update' >Update</a>
//                 <a class='btn btn-danger' href='delete' >Delete</a>
                
//                 </td>
        
//                  </tr>";
        
//             }
?>

</tbody>

    </table>
</body>
</html>
