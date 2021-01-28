<?php include '../unsplash-classes/unsplash-adminlogin.php'; ?>

<head>
<link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-login.css">
</head>   
    
  <?php
    
    $al = new Adminlogin();
    
    if(isset($_POST['submit'])){
        $adminuser = $_POST['adminUser'];
        $adminpass = md5($_POST['adminpass']);
        
        $loginchk = $al->adminlogin($adminuser,$adminpass);
    }
    
    ?>
  
    
<body>
    
<form action="" method="post" class="real-form">
    
    <h3> login </h3> 
    
        <span style = "color:red ; font-size: 18px;">

        <?php
        
        if(isset($loginchk)){
            echo $loginchk;
        }
        
        ?>
    
    </span>
   
<div class= "form">
    
<input type='text' name = "adminUser" class="form-control"  autocomplete="off" required />
    
    
    <label for="adminUser" class="label-name">
        <span class="content-name">Username</span>
    </label> 
    
  
    
</div>  
    
    

<div class="form">
    
<input type="password" name = "adminpass" autocomplete="off" required />
    
<label for="adminpass" class="label-name">
     <span class="content-name">Password</span>
</label>
    
 
    
</div>  
    
    
<div class="button">
<button class="btn" type= "submit" name= "submit" value="submit" >Submit</button> 
</div>
    
    
</form>
    

    
  </body>
</html>