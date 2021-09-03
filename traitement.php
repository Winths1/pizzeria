<?php
    $action = $_GET['action'];

    $servname = "localhost";
    $dbname = "pizzeria";
    $user = "root";
    $pass = "";

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

                $prixset = $_POST['price'];
                $oldname = $_GET['oldname'];

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
        try {
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

            $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sth1 = $dbco->prepare('
                    DELETE FROM ingredient
                    WHERE nom_pizza= :nom
            ');

            $sth2 = $dbco->prepare('
                    DELETE FROM pizza
                    WHERE nom= :nom
                ');
            
            $nom = $_GET['nom'];

            $sth1->bindValue(':nom',$nom, PDO::PARAM_STR_CHAR);
            $sth2->bindValue(':nom',$nom, PDO::PARAM_STR_CHAR);

            $sth1->execute();
            $sth2->execute();

            $dbco = NULL;

            header("Location: page.php");
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
            $dbco = NULL;
        }

    } elseif ($action == 'insert') {
        if(isset($_POST['nom_add']))
        try {
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

            $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sth = $dbco->prepare('
            INSERT INTO pizza (nom,prix_vente,note_consommateur) VALUES
                (:name, :prix, :note)
            ');

            $nom = $_POST['nom_add'];
            $prix = $_POST['prix_add'];
            $note = $_POST['note_add'];

            $sth->bindValue(':name',$nom,PDO::PARAM_STR_CHAR);
            $sth->bindValue(':prix',$prix,PDO::PARAM_STR);
            if(empty($note)) {
                $sth->bindValue(':note',NULL,PDO::PARAM_STR);
            } else {
                $sth->bindValue(':note',$note,PDO::PARAM_STR);
            }

            $sth->execute();

            $dbco = NULL;

            header('Location: page.php');
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
            $dbco = NULL;
        }
    };


?>