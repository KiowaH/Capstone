<?php include("index.php");?>
<html>
    <form method="POST">
        <h2>Please input professor code</h2>
        <p>Professor code: </p> <input type=password name="profCode" maxlength="50" required>
        <input type=submit value="GO!">
</html>

<?php
    if(isset($_POST['profCode'])){
        $attemptCode = $_POST['profCode'];

        $statement = "SELECT adminLogin from admins;";
        $results = $db->query($statement);
        foreach($results as $row){
            $pass = "{$row['adminLogin']}";
        }
        if(password_verify($attemptCode, $pass) == true){
            header('Location: profUsers.php');
        }else{
            echo"<br>Invalid code! Please try again";
        }
    }
?>