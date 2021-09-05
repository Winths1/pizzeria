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
       }

       elseif(isset($_POST['prixkg'])){
            try {
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

                $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare('
                    UPDATE produit
                    SET prix_kg = :prixset
                    WHERE nom = :oldname
                ');

                $prixset = $_POST['prixkg'];
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
    } elseif($action == 'deletep'){
            try {
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    
                $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
                $sth1 = $dbco->prepare('
                    DELETE FROM ingredient
                    WHERE nom= :nom
                 ');

                $sth2 = $dbco->prepare('
                    DELETE FROM produit
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
        if(isset($_POST['nom_add'])){
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
        }
    } elseif($action == "insertp") {
        if(isset($_POST['nomp_add'])) {
            echo "coucou";
            try {
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

                $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare('
                INSERT INTO produit (nom,prix_kg,allergene) VALUES
                    (:namep, :prixkg, :allergene)
                ');

                $nomp = $_POST['nomp_add'];
                $prix = $_POST['prixp_kg'];
                $aller = $_POST['allergene_p'];

                print_r($aller);


                $sth->bindValue(':nomp',$nomp,PDO::PARAM_STR_CHAR);
                $sth->bindValue(':prixkg',$prix,PDO::PARAM_STR);

                if($aller == NULL){
                    $sth->bindValue(':allergene',NULL,PDO::PARAM_BOOL);
                } else {
                    $sth->bindValue(':allergene',1,PDO::PARAM_BOOL);
                }
                

                $sth->execute();

                $dbco = NULL;

                header('Location: page.php');
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                $dbco = NULL;
            }
        }
    }elseif ($action == 'test') {
        $nomp = $_POST['nomp_add'];
        $prix = $_POST['prixp_kg'];
        $aller = $_POST['allergene_p'];

        var_dump($nomp);
        var_dump($prix);

        if($aller == NULL){
            echo '0';
        } else {
            echo '1';
        }
    }


?>