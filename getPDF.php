<?php
    include('dbConnect.php'); // include database connection file
    if($_POST['companyType']!=''){ // check company type is not empty
        $lineOfBusiness = trim($_POST['lineOfBusiness']);
        //echo $lineOfBusiness;

        // create query as per language selected
        if($_POST['english'] == 'E' && $_POST['french'] == 'F'){
            $sql = 'select '.$lineOfBusiness.'  from test WHERE companyType = "'.trim($_POST['companyType']).'" and ( Language = "'.$_POST['english'].'" or Language = "'.$_POST['french'].'")';//LIKE '%$searchTxt%'";
        }
        else if($_POST['english'] == 'E'){
            $sql = 'select '.$lineOfBusiness.'  from test WHERE companyType = "'.trim($_POST['companyType']).'" and Language = "'.$_POST['english'].'"';
        }
        else if($_POST['french'] == 'F'){
            $sql = 'select '.$lineOfBusiness.'  from test WHERE companyType = "'.trim($_POST['companyType']).'" and Language = "'.$_POST['french'].'"';
        }
        
        

       //echo $sql;
        $result = $conn->query($sql);
        //print_r($result);
        // output data of each row
        $PDF = array();
        if(!empty($result)){
           if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    //echo $row[$lineOfBusiness];
                    array_push($PDF,trim($row[$lineOfBusiness]));
                    }
            }else{
                $PDF =array();
            }
        }    
        
        echo json_encode($PDF);
    }
?>