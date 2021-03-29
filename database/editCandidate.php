<?php
    include 'connect.php';
    session_start();
    
    if(isset($_GET['id'])){
        $candidateid = $_GET['id'];
        $sql = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            $candidateid = $row['candidate_id'];
            $firstname = $row['fname'];
            $lastname = $row['lname'];
            $positionname = $row['position_name'];
            $partylist = $row['party_name'];
            $platform = $row['platform_info'];
            $credentials = $row['credentials'];
            
            header("location:../Admin/candidate.php?candidateid=".$candidateid."&fname=".$firstname."&lname=".$lastname."&candidateid=".$candidateid."&partylist=".$partylist."&platform=".$platform."&credentials=".$credentials."");
        }
        else{
            echo "message";
        }
    }
    
?>