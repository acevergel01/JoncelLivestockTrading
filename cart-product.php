<?php
    require "DataBase.php";
    $db = new DataBase();
    $id = $_POST['id'];
    $con = $db->dbConnect();
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    echo $sql;
    // while ($row = mysqli_fetch_array($result)) {
    //     echo "<tr>";
    //     echo "<td>" . "<img src=" .   $row['image'] . " />" . "</td>";
    //     echo "<td>" . "<button class=\"tooltips\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"" . $row['info'] . "\"><i class=\"fas fa-info-circle\"></i></button>" . $row['type'] . "</td>";
    //     echo "<td>" . "PHP " . $row['price'] . "/KG" . "</td>";
    //     echo "<td>" . "<span class=\"quantity-input\">
    //     <button class=\"decrement\" id=\"".$row['prod_id']."\"><i class=\"fas fa-angle-left\"></i></button>
    //     <span price=\"".$row['price']."\" id=\""."quantity".$row['prod_id']."\">0</span>
    //     <button class=\"increment\" id=\"".$row['prod_id']."\">
    //     <i class=\"fas fa-angle-right\"></i></button></span>" . "</td>";
    //     echo "<td>" . "<span class=\"total\" id=\"total".$row['prod_id']."\">TOTAL</span>" . "</td>";
    //     if ($row['availability']){
    //         echo "<td>" . "<button class=\"add-to-cart\">Add to cart</button>" . "</td>";
    //     }
    //     else echo "<td>Unavailable</td>";
    //     echo "</tr>";
    //     echo "<tr style=\"height:5px;\"/>";
    // }
    
?>
<script type="text/javascript">
    $(document).ready(function() {

 
    });
</script>
