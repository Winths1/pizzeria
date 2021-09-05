<?php include "header.php" ?>

<?php
    $nom = $_GET['nom'];
    $prix = $_GET['prixkg'];
    $note = $_GET['allergene'];
?>

<form class="updateForm" action="traitement.php?action=update&oldname=<?php echo $nom ?>" method="post">
    <div>
        <label for="nomp">Nom de la pizza</label>
        <input type='text' name='nomp' id='name_product' required value="<?php echo $nom ?>">
    </div>
    <div>
        <label for="prixkg">Prix du produit au kilo</label>
        <input type='number' name='prixkg' id='price_product' step='0.01' min='0' max='99' value="<?php echo $prix ?>">
        
    </div>
    <div>
        <label for="allergene_p">Allergene</label>
        <input type="checkbox" name="allergene_p" id="allergeneP" value="<?php $note ?>">
    </div>
    <!-- <a id='act_update' href=>Up</a> -->
    <div class="upd_choice">
        <input type="submit" value="Update">
        <a class="retour" href="http://localhost/pizzeria/page.php">Retour</a>
    </div>
</form>

<?php include "footer.php" ?>