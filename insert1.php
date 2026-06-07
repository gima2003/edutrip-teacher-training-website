<?php
 session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/insert1.css">
    </head>

    <body>
    
       <!-- <nav class="navbar">

             
            <div class="navbar-brand">Student Management</div>

            <div class="navbar-actions">
            <a href="logout.php">Log out</a>
            <a  href="create.php" role="button">New Student</a>
            </div>
        </nav>  -->



         <nav class="navbar">
            <div class="navbar-brand">Instructor Management</div>
            <div class="navbar-actions">
            <a href="create1.php" class="btn btn-primary">New Instructor</a>
            <a href="logout1.php" class="btn btn-danger">Log out</a>
            <a href="homepage.html" class="btn btn-danger">Home</a>

    </div>
</nav>

            <br><br>

            <table class="table">
                <thead>
                    <tr>
                        <th>Instructor ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    require 'config.php';
                //read all row from database table

                $sql = "SELECT sid,sname,semail,phone,address FROM smanagment";
                $result = $con->query($sql);


                if($result -> num_rows>0){
                
                    while($row=$result->fetch_assoc())
                    {
                        echo "<tr>
                                <td>{$row['sid']}</td>
                                <td>{$row['sname']}</td>
                                <td>{$row['semail']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>



                            <td>
                                <a class='btn-edit' href='edit1.php?sid={$row['sid'] }'>Edit</a>
                                <a class='btn-delete'  href='delete1.php?sid={$row['sid']}'>Delete</a>
                            </td>
                         </tr>";
                    }
                }


               

                ?>



                </tbody>
            </table>


         </div>
    </body>
</html>