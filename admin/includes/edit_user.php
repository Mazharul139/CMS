<?php 

if(isset($_GET['edit_user']))
{
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";

$select_users_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}




if(isset($_POST['edit_user'])){

   // $post_title = $_POST['title'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    //$post_image = $_FILES['image'] ['name'];
    //$post_image_temp = $_FILES['image']['tmp_name'];

    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password= $_POST['user_password'];

    if(!empty($user_password))
    {
        $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
        $get_user_query = mysqli_query($connection,$query_password);
        confirmquery($get_user_query);

        $row = mysqli_fetch_array($get_user_query);
        $db_user_password = $row['user_password'];
    }

    if($db_user_password != $user_password)
    {
        $hashed_password= password_hash($user_password,PASSWORD_BCRYPT, array('cost'=>12));
    
  
  
  
  
  
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
   // $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $update_user = mysqli_query($connection , $query);
    confirmquery($update_user);

    echo "User Updated" . "<a href = 'users.php'>View Users?</a>";



}
}
}

else{

    header("Location:index.php");
}



?>


<form action="" method ="post" enctype="multipart/form-data">

<div class = "form-group">
    <label for ="firstname">Firstname</label>
    <input type ="text" value="<?php echo $user_firstname ?>" class = "form-control" name="user_firstname">
</div>

<div class = "form-group">
    <label for ="lastname">Lastname</label>
    <input type ="text" value="<?php echo $user_lastname ?>" class = "form-control" name="user_lastname">
</div>


<!--<div class = "form-group">
    <select name = "user_role" id= "user_role">
        
        <option value = </option>

    </select>
    
</div>-->

<div class = "form-group">
    <label for ="username">Username</label>
    <input type ="text" value="<?php echo $username?>" class = "form-control" name="username">
</div>

<div class = "form-group">
    <label for ="email">Email</label>
    <input type ="text" value="<?php echo $user_email ?>" class = "form-control" name="user_email">
</div>

<div class = "form-group">
    <label for ="password">Password</label>
    <input autocomplete="off" type ="password" class="form-control" name="user_password">
</div>

<!--<div class = "form-group">
    <label for ="post_tags">Post Tags</label>
    <input type ="text" class = "form-control" name="post_tags">
</div>

<div class = "form-group">
    <label for ="post_content">Post Content</label>
    <textarea class = "form-control" name="post_content" id="" cols="30" rows = "10"></textarea>
</div> -->

<div class = "form-group">

    <input class = "btn btn-primary" type ="submit" name="edit_user" value ="Update user">
</div>

</form>
