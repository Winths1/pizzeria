<main>
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

            $dbco = NULL;

            $sth->execute();

            $resultat = $sth->fetchALL(PDO::FETCH_ASSOC);        
        
            foreach ($resultat as $pizza) {
                ?>
                <div class="container">
                    <div class="img_pizza">
                        <img src="img/imgpizza.jpg" alt="pizza">
                    </div>
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
            }
        }

        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
            $dbco = NULL;
        }
?>
</main>

