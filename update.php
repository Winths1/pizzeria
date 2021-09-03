<?php include "header.php" ?>

<?php
    $nom = $_GET['nom'];
    $prix = $_GET['prix'];
    $note = $_GET['note'];
?>

<form class="updateForm" action="traitement.php?action=update&oldname=<?php echo $nom ?>" method="post">
    <div>
        <label for="nom">Nom de la pizza</label>
        <input type='text' name='name' id='name_pizza' required value="<?php echo $nom ?>">
    </div>
    <div>
        <label for="prix">Prix de la pizza</label>
        <input type='number' name='price' id='price_pizza' step='0.01' min='0' max='99' value="<?php echo $prix ?>">
        
    </div>
    <div>
        <label for="note">Note de la pizza</label>
        <input type='number' name='mark' id='mark_pizza' step='0.1' min='0' max='5' value="<?php echo $note ?>">
    </div>
    <!-- <a id='act_update' href=>Up</a> -->
    <div class="upd_choice">
        <input type="submit" value="Update">
        <a class="retour" href="http://localhost/pizzeria/page.php">Retour</a>
    </div>
</form>

<?php include "footer.php" ?>