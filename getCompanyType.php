<?php
include('dbConnect.php'); // include database connection file
// Check if search word is not empty
if($_POST['search'] != ''){
        $searchTxt = $_POST['search'];
        $sql = "select id,companyType  from test WHERE companyType LIKE '%".$searchTxt."%' ";
        $result = $conn->query($sql);
        //echo $result;

        // output data of each row
        while($row = $result->fetch_assoc()) {
                echo "<li value=' " . $row["id"]. "'> " . $row["companyType"]. "</li>";
            }
       
            // mysqli_close($conn);

    }
?>