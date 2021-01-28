<?php include 'unsplash-inc/unsplash-header.php'; ?>

<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../unsplash-classes/unsplash-cart.php'); 


?>

<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>


<div class = "grid-2">
    <table class= "table" >
        <tr>
            <th> Id </th>
            <th> Order Date </th>
            <th> Price </th>
        </tr>
        
        <?php 
        
        $ct = new Cart();
        $fm = new Format();
        $getorder = $ct->getorderedprod();
        if($getorder){
            while($result = $getorder->fetch_assoc()){
            
        ?>

        <tr>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $fm->formatDate($result['date']); ?></td>
            <td>$<?php echo $result['price']; ?></td>
        </tr>
        
        <?php } } ?>
        
        
                    
    </table> 
                        
    <div class="button">  
        <btn class="btn"> <a href="">create</a> </btn>
    </div>

</div>
            
        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>