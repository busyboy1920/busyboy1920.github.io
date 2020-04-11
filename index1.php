<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<?php include 'filesLogic.php';?> 
<!DOCTYPE html>
<html>
    <head>
        <title>PDF Download</title>
        <link rel = "stylesheet" href="style.css"/>
        <meta charset="UTF-8">
    <link rel="stylesheet" href="stylelogin.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    </head>
    <body>
        <div class = "container">
            <div class = "row">
                <form action="index1.php" method = "POST" enctype="multipart/form-data">
                    <h3>Upload Files</h3>
                    <input type = "file" name = "myfile"><br />
                    <button type = "submit" name = "save">Upload</button>
                </form>
            </div>
            <div class = "row">
                <table>
                    <thread>
                        <th>ID</th>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Download</th>
                        <th>Action</th>                        
                    </thread>
                    <tbody>
                    <?php foreach($files as $file): ?>
                    <tr>
                        <td><?php echo $file['id'];?></td>
                        <td><?php echo $file['name'];?></td>
                        <td><?php echo $file['size'];?></td>
                        <td><?php echo $file['downloads'];?></td>
                        <td><a href = "index1.php?file_id=<?php echo $file['id']?>">Download</a></td>
                    </tr>
                    <?php endforeach ; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
        </div>
        <p>
            <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </p>
    </body>
</html>
