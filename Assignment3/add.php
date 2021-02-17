<?php
include('config.php');
?>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $sql = "INSERT INTO `users` (`username`, `email`, `gender`, `city`) VALUES ('$username', '$email', '$gender', '$city')";
    mysqli_query($conn, $sql);
}
else{
    echo "Please click submit button to submit the data..";
}
?>

<html>
    <head>
        <title>HTML Forms</title>
    </head>
<body>
<form method="POST" action="add.php">
    USERNAME <input type="text" name="username" placeholder="Type Your Username" required><br>
    E-MAIL <input type="email" name="email" placeholder="Type Your E-mail" required><br>
    GENDER <input type="radio" name="gender" value="male" >MALE <input type="radio" name="gender" value="female" >FEMALE<br>
    Select City <select name="city">
        <option value="Dehradun">Dehradun</option>
        <option value="Delhi">Delhi</option>
        <option value="Himachal">Himachal</option>
        <option value="Lucknow">Lucknow</option>
        <option value="Bengal">Bengal</option>
        <option value="Bhasundra">Bhasundra</option>
    </select><br>
    <input type="submit" name="submit" value="Click Here To Submit Your Data">
</form>
</body>
</html>