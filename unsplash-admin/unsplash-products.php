<?php include 'unsplash-inc/unsplash-header.php'; ?>
<?php include '../unsplash-classes/unsplash-products.php'; ?>  

    
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>

<?php
    
$products = new product(); 

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = $products->deletepro($id);
}
    
    
?>

            <div class = "grid-2">
                <table class= "table" >

                    <tr>
                        <th> id </th>
                        <th> Brand Name </th>
                        <th> actions </th>
                    </tr>

                    <?php
                    $read = $products->readpro();
                    if($read){
                        $i = 0;
                        while($row = $read->fetch_assoc()){
                        $i++;
                    ?>
                    
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><a href="unsplash-proedit.php?proid=<?php echo $row['proid'] ?>">edit</a> || <a href="?delete=<?php echo $row['proid'] ?>">delete</a> </td>
                        
                     <?php   } }   ?>    
                </table> 
                
               
                
                <div class="button">  
                   <btn class="btn"> <a href="unsplash-prodcreate.php">create</a> </btn>
                </div>
                
            </div>

        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>