<div><h4>Rapport de visite</h4></div>
<div>
    <form method="post" action="index.php?uc=gererCR&amp;action=saisir">

        Date de la visite
        <div>
            <input type="date" name="date" id="date" required>
        </div>
        <br/>

        Praticien
        <div>  
            <select name="pra" value="<?=$value["PRA_NUM"]?>" required>
                <?php foreach ($lesPraticiens as $key => $value):?>
                    <option value="<?=$value["PRA_NUM"]?>"><?=$value["PRA_NOM"].' '.$value["PRA_PRENOM"].' ('.$value["PRA_COEFNOTORIETE"].')'?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br/>

        Motif
        <div>
            <input type="text" name="motif" required>
        </div>
        <br/>

        Bilan
        <div>
            <textarea rows="5" name="bilan" required></textarea>
        </div>
        <br/>

        <h3>Échantillons</h3>
        <select name="medic" value="<?=$med['MED_DEPOTLEGAL']?>">
            <?php foreach ($LesMedicaments as $key => $med):?>
                <option value="<?=$med["MED_DEPOTLEGAL"]?>"><?=$med["MED_DEPOTLEGAL"].' '.$med["MED_NOMCOMMERCIAL"].' '.$med["Fam_code"].' '.$med["FAM_LIBELLE"].' '.$med["MED_PRIXECHANTILLON"]?></option>
            <?php endforeach; ?>
        </select>
        <br/>
        <br/>
        
        <div>
            <input type="number" name="quantite" min="1">
        </div>
        
        </br>
        <div>
            <input type="checkbox" name="rempl" style=" margin-left:2%; width:15px;">
        </div>
        <?php echo form_submit("Valider", "saisir"); ?>
    </form>
</div>