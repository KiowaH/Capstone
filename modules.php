<?php
include("index.php");
?>
<table>
    <tr>
        <td>Module Name</td>
        <td>Submissions</td>
    </tr>
<?php if(isset($_SESSION['user_login'])) //student view
{
    $currId = $_SESSION['classId'];
    $statement = "SELECT * FROM modules WHERE classId = '$currId'";
    $results = $db->query($statement);?>
<style>
        table,th,td{border: 1px solid black}
</style>  
    <?php
    foreach($results as $row){
        echo "<tr><td> <a href=modInfo.php?id={$row['modId']}>{$row['modName']}</a></td>
        <td><a href=submissions.php?id={$row['modId']}>View Submissions</a></td>";
    }
    ?>

    
</table>

<?php //prof view
}elseif(isset($_SESSION['prof_login'])){
    echo"<br>Your modules:<br>";
    $currId = $_SESSION['classId'];
    $statement = "SELECT * FROM modules WHERE classId = '$currId'";
    $results = $db->query($statement);?>
    <table>
    <style>
        table,th,td{border: 1px solid black}
    </style> 
    <?php foreach($results as $row){
        echo "<tr><td> <a href=modInfo.php?id={$row['modId']}>{$row['modName']}</a></td>
        <td><a href=submissions.php?id={$row['modId']}>View Submissions</a></td>";
    }
?>
</table>
<form method="POST">
    <h3>Make a new Module: </h3>
    <input type=submit name="makeMod" value="CREATE!">
</form>
<?php if(isset($_POST['makeMod'])){
    header("Location: makeMod.php");
}
}