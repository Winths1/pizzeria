<?php
    $action = $_GET['action'];

    $servname = "localhost";
    $dbname = "pizzeria";
    $user = "root";
    $pass = "";

    $prixset = $_POST['price'];
    $oldname = $_GET['oldname'];

    // Update action
    if($action == 'update'){

       if(isset($_POST['price'])){
            try {
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

                $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare('
                    UPDATE pizza
                    SET prix_vente = :prixset
                    WHERE nom = :oldname
                ');

                $sth->bindValue(':prixset',$prixset, PDO::PARAM_STR);
                $sth->bindValue(':oldname',$oldname, PDO::PARAM_STR_CHAR);

                $sth->execute();

                $dbco = NULL; 

                header("Location: page.php");

            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                $dbco = NULL;
            }
        } else {
            header("Location: page.php");
        }
    } elseif ($action == 'delete'){

    }







?>