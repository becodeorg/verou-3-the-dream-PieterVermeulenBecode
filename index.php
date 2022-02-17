<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    $exchangeRate=1.14;
    $foreignMoney="Dollar";
    $location="Amerika";
    $localMoney= "Euro";
    $money1="dollar";
    $exchangeRate1=1.14;
    $money2="euro";
    $exchangeRate2=1;
    $money3="bitcoin";
    $exchangeRate3=1/38433;
    $money4="sats";
    $exchangeRate4=100000000/38433;
?>
<?php
if(!empty($_POST['foreignMoney'])){
    switch ($_POST['foreignMoney']) {
        case $money1:
            $foreignMoney=$money1;
            $exchangeRate=$exchangeRate1;
            break;
        case $money2:
            $foreignMoney=$money2;
            $exchangeRate=$exchangeRate2;
            break;
        case "$money3":
            $foreignMoney=$money3;
            $exchangeRate=$exchangeRate3;
            break;
        case "$money4":
            $foreignMoney=$money4;
            $exchangeRate=$exchangeRate4;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>You are going to: <?php echo $location?> </h1>
    <h3>The local money is: <?php echo $foreignMoney?></h3>
    <h3>1 <?php echo $localMoney?> is equal to: <?php echo $exchangeRate?> <?php echo $foreignMoney?></h3>

    <form action="" method="post">
        
        <select name="foreignMoney" onchange='if(this.value != 0) { this.form.submit(); }'>
            <option <?php if (!empty($_POST['foreignMoney'])):if ($_POST['foreignMoney'] == $money1) { ?>selected="true" <?php };endif; ?>value="<?php echo $money1?>"><?php echo $money1?></option>
            <option <?php if (!empty($_POST['foreignMoney'])):if ($_POST['foreignMoney'] == $money2) { ?>selected="true" <?php };endif; ?>value="<?php echo $money2?>"><?php echo $money2?></option>
            <option <?php if (!empty($_POST['foreignMoney'])):if ($_POST['foreignMoney'] == $money3) { ?>selected="true" <?php };endif; ?>value="<?php echo $money3?>"><?php echo $money3?></option>
            <option <?php if (!empty($_POST['foreignMoney'])):if ($_POST['foreignMoney'] == $money4) { ?>selected="true" <?php };endif; ?>value="<?php echo $money4?>"><?php echo $money4?></option>
        </select> 
        <label for="money">Calculate money:</label>
        <input type="number" id="money" name="money" id="money" placeholder='enter your amount to convert'>           
        
        <input type="radio" id="localForeign" name="radiobutton" value="localForeign"<?php checkedOrNot("localForeign") ?>>
        <label for="localForeign">Calculate from <?php echo $localMoney?> to <?php echo $foreignMoney?>.</label><br>
        <input type="radio" id="foreignLocal" name="radiobutton" value="foreignLocal" <?php checkedOrNot("foreignLocal") ?>>
        <label for="foreignLocal">Calculate from <?php echo $foreignMoney?> to <?php echo $localMoney?>.</label><br>
        <input type="submit" value="Calculate" />
    </form>
    
    <?php
        
        function checkedOrNot($localOrForeign){
            if (!empty($_POST['radiobutton'])){if($_POST["radiobutton"]==$localOrForeign){echo "checked='checked'";}};
        }
        
        if(!empty($_POST["money"])){
            if($_POST["radiobutton"]!=="foreignLocal"){
                $calculatedMoney=$_POST["money"]*$exchangeRate;
                echo "<h5>" .$_POST["money"]." ".$localMoney." is worth " .$calculatedMoney. " ".$foreignMoney."</h5>";
            }else{
                $calculatedMoney=$_POST["money"]/$exchangeRate;
                echo "<h5>".$_POST["money"]." ".$foreignMoney." equal to: " .$calculatedMoney. " ".$localMoney."</h5>";
            }
        }
        

        
    ?>
</body>
</html>