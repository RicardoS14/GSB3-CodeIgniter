<?php

class PdoGsb {

    // Attributs
    private static $serveur='mysql:host=mysql-ppe3.alwaysdata.net';
    private static $bdd='dbname=ppe3_visiteurs';
    private static $user='ppe3_admin' ;
    private static $mdp='root' ;
    private static $monPdo;
    private static $monPdoGsb=null;

    public function GetListeMedicament() {
        $req="select MED_DEPOTLEGAL, MED_NOMCOMMERCIAL, medicament.FAM_CODE as Fam_code , FAM_LIBELLE, MED_PRIXECHANTILLON from medicament, famille where medicament.FAM_CODE = famille.FAM_CODE";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $ligne;
    }

    public function getLesPraticiens() {
        $req = "select * from praticien";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $ligne;
    }

    public function getNewId(){
        try {
            $req="SELECT MAX(RAP_NUM) AS max FROM rapport_visite";
            $prep= PdoGsb::$monPdo->query($req);
            $ligne = $prep->fetch(PDO::FETCH_ASSOC);
            return $ligne['max'];
        }
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    public function ajouterCR($numV, $numR, $numP, $bilan, $motif, $dateV) {
        try {
            $req="INSERT INTO rapport_visite (VIS_MATRICULE, RAP_NUM, PRA_NUM, RAP_BILAN, RAP_MOTIF, VIS_DATE) VALUES (:numV, :numR, :numP, :bilan, :motif, :dateV)";
            $res=PdoGsb::$monPdo->prepare($req);
            $res->bindValue(':numV', $numV, PDO::PARAM_STR);
            $res->bindValue(':numR', $numR, PDO::PARAM_INT);
            $res->bindValue(':numP', $numP, PDO::PARAM_INT);
            $res->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $res->bindValue(':motif', $motif, PDO::PARAM_STR);
            $res->bindValue(':dateV', $dateV, PDO::PARAM_STR);
            $res->execute();
        }
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    public function getCR($id) {
        try {
            $req="SELECT VIS_NOM, VIS_PRENOM, PRA_NOM, PRA_PRENOM, RAP_NUM, RAP_DATE, RAP_BILAN, RAP_MOTIF, VIS_DATE FROM rapport_visite  JOIN visiteur ON rapport_visite.VIS_MATRICULE = visiteur.VIS_MATRICULE JOIN praticien ON rapport_visite.PRA_NUM = praticien.PRA_NUM WHERE visiteur.VIS_MATRICULE = :id ORDER BY RAP_NUM";
            $prep= PdoGsb::$monPdo->prepare($req);
            $prep->bindValue('id', $id, PDO::PARAM_STR);
            $prep->execute();
            $ligne = $prep->fetchAll(PDO::FETCH_ASSOC);
            return $ligne;
        }
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    public function ajouterEchantillon($numV, $numR, $numM, $qt){
        try {
            $req="INSERT INTO offrir (VIS_MATRICULE, RAP_NUM, MED_DEPOTLEGAL, OFF_QTE) VALUES (:numV, :numR, :numM, :qt)";
            $res=PdoGsb::$monPdo->prepare($req);
            $res->bindValue(':numV', $numV, PDO::PARAM_STR);
            $res->bindValue(':numR', $numR, PDO::PARAM_INT);
            $res->bindValue(':numM', $numM, PDO::PARAM_STR);
            $res->bindValue(':qt', $qt, PDO::PARAM_INT);
            $res->execute();
        }
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    public function getDetailsEchantillons($id) {
        try {
            $req="SELECT * FROM offrir INNER JOIN medicament ON offrir.MED_DEPOTLEGAL = medicament.MED_DEPOTLEGAL WHERE RAP_NUM = :pid";
            $prep= PdoGsb::$monPdo->prepare($req);
            $prep->bindValue('pid', $id, PDO::PARAM_INT);
            $prep->execute();
            $ligne = $prep->fetchAll(PDO::FETCH_ASSOC);
            return $ligne;
        }
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

}