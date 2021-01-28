<?php include 'unsplash-inc/unsplash-header.php'; ?>
<?php include_once('../unsplash-classes/unsplash-format.php'); ?>
<?php include_once('../unsplash-classes/unsplash-addproduct.php'); ?>

<?php
$pd = new addproduct();
$fm = new Format();

?>

<?php

if(isset($_GET['delpro'])){
    $id = $_GET['delpro'];
    $delpro = $pd->delproaddbyid($id);
}


?>
  
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>

<?php

    if(isset($delpro)){
        echo $delpro;
    }

    ?>

            <div class = "grid-2">
                
        
                <table class= "table" >

                    <tr>
                        <th>Id</th>
                        <th> Pro. Name </th>
                        <th> Cat. Name </th>
                        <th> Brand. Name </th>
                        <th> body </th>
                        <th> price </th>
                        <th> image </th>
                        <th> Action </th>
                    </tr>
                    
                    

                    
                    <?php 
                    $read = $pd->addproductread();
                    if($read){
                        $i = 0;
                        while($result = $read->fetch_assoc()){
                    $i++;
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php  echo $result['productname'] ?></td>
                        <td><?php  echo $result['catname'] ?></td>
                        <td><?php  echo $result['proname'] ?></td>
                        <td><?php echo $fm->textshorten($result['body']) ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td><img src= "<?php echo $result['image'] ?>"height = "40px" width = "60px" </td>
                        <td><a href = "unsplash-addproupdate.php?productid=<?php echo $result['productid'] ?>">edit</a> || <a onclick= "return confirm('are you sure?')" href="?delpro=<?php echo $result['productid']; ?> " >delete</a></td>
                    </tr> 
                    
                    <?php } } ?>
                     
                </table> 
                
             
                
                
                <div class="button">  
                   <btn class="btn"> <a href="unsplash-apcreate.php">create</a> </btn>
                </div>
                
                
  
            </div>
            
        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>