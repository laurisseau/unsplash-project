<?php include 'unsplash-inc/unsplash-header.php'; ?>
<?php include '../unsplash-classes/unsplash-category.php'; ?>  

  
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>

<?php

$cat = new category();
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delcat = $cat->delcatbyid($id);
}


?>

            <div class = "grid-2">

                <table class= "table" >

                    <tr>
                        <th> Id </th>
                        <th> Cat. Name </th>
                        <th> Action </th>
                    </tr>
                    
                <?php
                    $getcat = $cat->readcat();
                    if($getcat){
                        $i = 0;
                        while ($result = $getcat->fetch_assoc()){
                            $i++;
                            
                ?>
                    
                <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['catname']?></td>
                        <td><a href="unsplash-catedit.php?catid=<?php echo $result['catid'] ?>">edit</a> || <a onclick= "return confirm('are you sure?')" href="?delete=<?php echo $result['catid'] ?>">delete</a></td>
                    </tr> 
                           <?php } } ?>
                </table> 
 
                
                <div class="button">  
                   <btn class="btn"> <a href="unsplash-catcreate.php">create</a> </btn>
                </div>

            </div>
            
        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>

