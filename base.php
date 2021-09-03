<section>
    <!-- Ajouter une pizza -->
    <div class="add_pizza">
        <div id="show_add">
                Ajouter une pizza
        </div>
        <form id="form_insert" action="traitement.php?action=insert" method="POST">
            <div class="inp_add">
                <div>
                    <label for="nom_add">Nom de la pizza</label>
                    <input type="text" name="nom_add" id="name_add" required>
                </div>
                <div>
                    <label for="prix_add">Prix de la pizza</label>
                    <input type="number" name="prix_add" id="price_add" min="0" max="99" step="0.01" required>
                </div>
                <div>
                    <label for="note_add">Note pizza</label>
                    <input type="number" name="note_add" id="note_add" min="0" max="5" step="0.1">
                </div>
            </div>
            <div class="btn_insert">
                <input class="submit_add" type="submit" value="Ajouter">
            </div>
        </form>
</section>

<section class="show">
    <div class="show_product">
        <div id="pizShow">
            Afficher la liste des pizzas
        </div>
    </div>
    <div class="show_product">
        <div id="proShow">
            Afficher la liste des produits
        </div>
    </div>
</section>


<main id="secpizz" class="active">
<?php
        $servname = 'localhost';
        $dbname = 'pizzeria';
        $user = 'root';
        $pass = '';

        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $dbco->prepare("
            SELECT * FROM pizza
            ");

            $sth2 = $dbco->prepare('
                SELECT *
                FROM produit
            ');

            $dbco = NULL;

            $sth->execute();
            $sth2->execute();

            $resultat = $sth->fetchALL(PDO::FETCH_ASSOC);        
        
            foreach ($resultat as $pizza) {
                ?>
                <div class="container_pizza">
                    <!-- <div class="img_pizza">
                        <img src="img/imgpizza.jpg" alt="pizza">
                    </div> -->
                    <div class="pizza">
                        <?php
                        echo "<h2>".$pizza["nom"]."</h2><br>";
                        echo "<p>".$pizza["prix_vente"]."€"."</p>";

                        if ($pizza["note_consommateur"] == NULL) {
                            echo "";
                        } else {
                            echo "<h2> Note :</h2>"."<p> ".$pizza["note_consommateur"]."/5"."</p><br>";
                        }
                        ?>
                    </div>
                    <div class="boutons">
                        <a id='update' href="update.php?nom=<?php echo $pizza['nom'] ?>&prix=<?php echo $pizza['prix_vente'] ?>&note=<?php echo $pizza['note_consommateur'] ?>">Up</a>
                        <span id='delete' class="del_but">Del</span>
                        <a href="show.php?nom=<?php echo $pizza['nom'] ?>" id="show">Ing</a>
                    </div>


                    <!-- The Modal -->
                    <div class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <p>Êtes-vous sûr de vouloir supprimer cette pizza ?</p>
                            <div class="button_modal">
                                <a id="yes" href="traitement.php?action=delete&nom=<?php echo $pizza['nom'] ?>">
                                    Oui
                                </a>
                                <span class="close">Non</span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            };
            ?>

</main>
<section id="secprod" class="products">
                <?php
                
                $resultat2 = $sth2->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultat2 as $produit) {
                    ?>
                     <div class="container_produit">
                        <div class="produit">
                            <?php
                            echo "<h2>".$produit["nom"]."</h2><br>";
                            echo "<p>".$produit["prix_kg"]."€"."</p>";
                            if ($produit['allergene'] == 1) {
                                echo "<p>Contient des allergenes</p>";
                            } else {
                                echo "";
                            }
                            
                            ?>
                        </div>
                        <div class="boutons">
                            <a id='update' href="update.php?nom=<?php echo $pizza['nom'] ?>&prix=<?php echo $pizza['prix_vente'] ?>&note=<?php echo $pizza['note_consommateur'] ?>">Up</a>
                            <span id='delete' class="del_but">Del</span>
                        </div>

                        <!-- The Modal -->
                        <div class="modalp">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <p>Êtes-vous sûr de vouloir supprimer ce produit ?</p>
                                <div class="button_modal">
                                    <a id="yes" href="traitement.php?action=delete&nom=<?php echo $produit['nom'] ?>">
                                        Oui
                                    </a>
                                    <span class="close">Non</span>
                                </div>
                            </div>
                        </div>


                    </div>
                        <?php                
            
                }
        }                
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
            $dbco = NULL;
        }
?>
</section>

