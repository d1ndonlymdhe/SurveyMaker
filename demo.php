

<form action="" method="get">
 <input type="checkbox" name ="colddrinks[]" value="Coke"> Coke <br>
 <input type="checkbox" name ="colddrinks[]" value="Fanta"> Fanta <br>
 <input type="checkbox" name ="colddrinks[]" value="Sprite"> Sprite <br>
 <input type="submit" name = "submit"value="Submit">
</form>
<?php
$coldDrinks = $_GET['colddrinks']; 
foreach ($coldDrinks as $coldDrink){
 echo $coldDrink."<br/>";
}
?>
