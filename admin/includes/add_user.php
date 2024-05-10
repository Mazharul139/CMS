<?php 

if(isset($_POST['create_user'])){

   // $post_title = $_POST['title'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    //$post_image = $_FILES['image'] ['name'];
    //$post_image_temp = $_FILES['image']['tmp_name'];

    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password= $_POST['user_password'];
   // $post_date = date('d-m-y');
   // $post_comment_count = 4;
   // $post_status = $_POST['post_status'];

   // move_uploaded_file($post_image_temp , "../images/ $post_image");

   $user_password= password_hash($user_password,PASSWORD_BCRYPT, array('cost'=>10));

    $query = "INSERT INTO users( user_firstname, user_lastname, user_role, username, user_email, user_password)" ;
    $query .="VALUES( '{$user_firstname}', '{$user_lastname}' , '{$user_role}', '{$username}' , '{$user_email}', '{$user_password}')";

    $create_user_query = mysqli_query($connection , $query);
    confirmquery($create_user_query);

    echo"User Created : " . " " . "<a href=users.php>View User</a>";




}



?>


<form action="" method ="post" enctype="multipart/form-data">

<div class = "form-group">
    <label for ="firstname">Firstname</label>
    <input type ="text" class = "form-control" name="user_firstname">
</div>

<div class = "form-group">
    <label for ="lastname">Lastname</label>
    <input type ="text" class = "form-control" name="user_lastname">
</div>


<div class = "form-group">
    <select name = "user_role" id= "user_role">
        
        <option value = "subscriber">Select Option</option>
        <option value = "admin">Admin</option>
        <option value = "subscriber">Subscriber</option>
    </select>
    
</div> 

<div class = "form-group">
    <label for ="username">Username</label>
    <input type ="text" class = "form-control" name="username">
</div>

<div class = "form-group">
    <label for ="email">Email</label>
    <input type ="text" class = "form-control" name="user_email">
</div>

<div class = "form-group">
    <label for ="password">Password</label>
    <input type ="text" class="form-control" name="user_password">
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

    <input class = "btn btn-primary" type ="submit" name="create_user" value ="Publish user">
</div>

</form>
