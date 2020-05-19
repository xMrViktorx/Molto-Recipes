<?php
    session_start();
?>
<?php
    if(isset($_POST['recipename'])) {
        require 'includes/dbh.inc.php';
        
        $recipeName = $_POST['recipename'];
        $ingradient = $_POST['all-ingradient'];
        $description = $_POST['all-description'];
        $dose = $_POST['inputDose'];
        $category = $_POST['category'];
        $difficulty = $_POST['difficulty'];
        $preparationTime = 120;
        
        $userId =$_SESSION['userId'];
        
        
        echo "Recipe name is <b>".$recipeName."</b><br>";
        echo "Ingradients: <b>".$ingradient."</b><br>";
        echo "Description: <b>".$description."</b><br>";
        echo "Dose: <b>".$dose."</b><br>";
        echo "Category: <b>".$category."</b><br>";
        echo "difficulty: <b>".$difficulty."</b><br>";
        
        if(isset($_POST['category'])) {
            //RECIPES
            $conn->query("INSERT INTO `recipes` (`recipe_id`, `user_id`, `recipe_name`, `preparation_time`, `dose`, `difficulty`) 
            VALUES (null, '".$userId."', '".$recipeName."', '".$preparationTime."', '".$dose."', '".$difficulty."')");
            
            
            //Ingradients
            $lastId = $conn->insert_id;
            $ingradient=substr($ingradient,0, -1);
            $arr = explode(";",$ingradient);
            for ($i=0; $i<count($arr); $i++){
                $temp2 = "";
                $temp1 = explode(" ", $arr[$i]);
                print_r($temp1);
                for ($j=2; $j<count($temp1); $j++){
                    $temp2 = $temp2." ".$temp1[$j];
                    print_r($temp2);
                }
            $conn->query("INSERT INTO `ingradients` (`ingradient_id`, `recipe_id`, `quantity`, `unit`, `ingradient`) 
            VALUES (null, '".$lastId."', '".$temp1[0]."', '".$temp1[1]."', '".$temp2."')");
            }
            
            //IMAGES
            
            foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
                $file_name=$_FILES["image"]["name"][$key];
                $file_tmp=$_FILES["image"]["tmp_name"][$key];
                echo $file_name."<br>";
                $conn->query("INSERT INTO `images` (`image_id`, `recipe_id`, `image`) 
                VALUES (null, '".$lastId."', '".$file_name."')");
            }
            
            //STEPS
            $description=substr($description,0, -1);
            $arr = explode(";",$description);
            for ($i=0; $i<count($arr); $i++) {
                $conn->query("INSERT INTO `steps` (`step_id`, `recipe_id`, `step`) 
                VALUES (null, '".$lastId."', '".$arr[$i]."')");
            }
            
        }
    }

?>