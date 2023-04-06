<?php
class DAO
{
    function __construct()
    {
    }
    function connexion()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=scolarite', 'root', '');
        return $pdo;
    }
    // fonction pour inserer les étudiants de fichier excel 
    function insererDansListeEtudiant($fichier)
    {
        $pdo = $this->connexion();
        $reader = PHPExcel_IOFactory::createReaderForFile($fichier);
        $excel_Obj = $reader->load($fichier);
        $worksheet = $excel_Obj->getSheet('0');
        $lastRow = $worksheet->getHighestRow();
        $colomncount = $worksheet->getHighestDataColumn();
        $colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
        for ($row = 1; $row <= $lastRow; $row++) {
            for ($col = 0; $col < $colomncount_number; $col++) {
                $valeur = $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue();
                $table[] = $valeur;
            }
            if (!$this->estEtudiant($table[0])) {
                $stmt = $pdo->prepare('INSERT INTO listeetudiant(CNE,NOM,PRENOM,NOMCLASSE) VALUES(?,?,?,?)');
                $stmt->execute(array($table[0], $table[1], $table[2], $table[3]));
            }
            unset($table);
        }
    }
    // fonction pour tester si l'etudiant se trouve dans le tableau listeetudiant (not table etudiant)
    function estEtudiant($cne)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT CNE FROM listeetudiant WHERE CNE=?');
        $stmt->execute(array($cne));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // fonction pour envoyer un tableau dans se trouve tout les infos d'etudiant dans le tableau liste etudiant
    function rechercheDansListeEtudiant($cne)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM listeetudiant WHERE CNE=?');
        $stmt->execute(array($cne));
        return $stmt->fetch();
    }
    // fonction retourne le nombre d'etudiant (liste etudiants) :
    function compteurEtudiantsAdmis()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM listeetudiant');
        $stmt->execute();
        return $stmt->rowCount();
    }
    // fontion pour tester si l'etudiant a un compte
    function estEtudiantAvecCompte($cne)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT CNE FROM etudiant WHERE CNE=?');
        $stmt->execute(array($cne));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // fonction pour tester si l'etudiant a un compte mais avec email (utilisé pour restaurer le mot de passe)
    function estEtudiantEmail($email)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT EMAIL FROM etudiant WHERE EMAIL=?');
        $stmt->execute(array($email));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    function estEtudiantEmail2($email, $id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT EMAIL FROM etudiant WHERE EMAIL=? AND IDETUDIANT!=?');
        $stmt->execute(array($email, $id));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // teste de login d'etudiant
    function connexionEtudiant($cne, $password)
    {
        $hashedPassword = sha1($password);
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT CNE,PASSWORD FROM etudiant WHERE CNE=? AND PASSWORD=?');
        $stmt->execute(array($cne, $hashedPassword));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // fonction pour inserer les infos d'étudiant à la création de compte
    function insererInfosEtudiantCreation($idClasse, $cne, $nom, $prenom, $email, $dateNaissance, $password)
    {
        $hashedPassword = sha1($password);
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('INSERT INTO etudiant(IDCLASSE,CNE,NOM,PRENOM,EMAIL,DATENAISSANCE,PASSWORD) VALUES(?,?,?,?,?,?,?)');
        $stmt->execute(array($idClasse, $cne, $nom, $prenom, $email, $dateNaissance, $hashedPassword));
    }
    // fonction pour l'inscrption 
    function inscriptionEtudiant($id, $cin, $telephone, $image, $nomAr, $prenomAr, $bacAnnee, $bacFiliere, $bacMention, $villeOrigine, $villeActuelle, $adresse, $copyBac, $copyCin)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('UPDATE etudiant SET CIN=?, TELEPHONE=?, IMAGE=?, NOMAR=?, PRENOMAR=?, BACANNEE=?, BACFILIERE=?, BACMENTION=?, VILLEORIGINE=?, VILLEACTUEL=?, ADRESSE=?, COPYBAC=?, COPYCIN=? WHERE IDETUDIANT=?');
        $stmt->execute(array($cin, $telephone, $image, $nomAr, $prenomAr, $bacAnnee, $bacFiliere, $bacMention, $villeOrigine, $villeActuelle, $adresse, $copyBac, $copyCin, $id));
    }
    // fonction retourne les infos d'etudiant à l'aide de cne
    function rechercheEtudiantAvecCne($cne)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM etudiant WHERE CNE=?');
        $stmt->execute(array($cne));
        return $stmt->fetch();
    }
    // fonction retourne les infos d'etudiant à l'aide id
    function rechercheEtudiantAvecId($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM etudiant WHERE IDETUDIANT=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function isEtudiantById($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM etudiant WHERE IDETUDIANT=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    function identiqueMotDePasseEtudiant($id, $password)
    {
        $hashedPassword = sha1($password);
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT PASSWORD FROM etudiant WHERE PASSWORD=? AND IDETUDIANT=?');
        $stmt->execute(array($hashedPassword, $id));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    //fonction de recherche d'etudiant
    function listeEtudiant()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM etudiant ');
        $stmt->execute(array());
        return $stmt->fetch();
    }
    // fonction pour modifier infos etudiant
    function modifierInfosEtudiant($id, $email, $password, $telephone, $adresse, $image)
    {
        $pdo = $this->connexion();
        $hashedPassword = sha1($password);
        if (empty($password) || empty($image)) {
            if (empty($password) && empty($image)) {
                $stmt = $pdo->prepare('UPDATE etudiant SET EMAIL=?,TELEPHONE=?,ADRESSE=? WHERE idEtudiant=?');
                $stmt->execute(array($email, $telephone, $adresse, $id));
            } else {
                if (empty($password)) {
                    $stmt = $pdo->prepare('UPDATE etudiant SET EMAIL=?,TELEPHONE=?,ADRESSE=?,IMAGE=? WHERE idEtudiant=?');
                    $stmt->execute(array($email, $telephone, $adresse, $image, $id));
                }
                if (empty($image)) {
                    $stmt = $pdo->prepare('UPDATE etudiant SET EMAIL=?,TELEPHONE=?,ADRESSE=?,PASSWORD=? WHERE idEtudiant=?');
                    $stmt->execute(array($email, $telephone, $adresse, $hashedPassword, $id));
                }
            }
        } else {
            $stmt = $pdo->prepare('UPDATE etudiant SET EMAIL=?,TELEPHONE=?,ADRESSE=?,PASSWORD=?,IMAGE=? WHERE idEtudiant=?');
            $stmt->execute(array($email, $telephone, $adresse, $hashedPassword, $image, $id));
        }
    }
    // fonction pour tester si l'étudiant a terminé son inscription :
    // juste un teste sur le cin :
    function estInscrit($cin)
    {
        if (!empty($cin))
            return true;
        else
            return false;
    }
    // fonction retourne nombre etudiants inscrit :
    function compteurEtudiantsInscrit()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM etudiant');
        $stmt->execute();
        return $stmt->rowCount();
    }
    // fonction pour restaurer le mot de passe d'etudiant : 
    function restaurerMotDePassseEtudiant($email)
    {
        $pdo = $this->connexion();
        $password = random_int(1000000, 9999999);
        $hashedPassword = sha1($password);
        $stmt = $pdo->prepare('UPDATE etudiant SET PASSWORD=? WHERE EMAIL=?');
        $stmt->execute(array($hashedPassword, $email));
        return $password;
    }

    // function teste si l'utilisteur est un admin
    function estAdmin($email)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT EMAIL FROM admin WHERE EMAIL=?');
        $stmt->execute(array($email));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    function identiqueMotDePasseAdmin($id, $password)
    {
        $hashedPassword = sha1($password);
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT PASSWORD FROM admin WHERE PASSWORD=? AND IDADMIN=?');
        $stmt->execute(array($hashedPassword, $id));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // teste login admin 
    function connexionAdmin($email, $password)
    {
        $hashedPassword = sha1($password);
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT EMAIL, PASSWORD FROM admin WHERE EMAIL=? AND PASSWORD=?');
        $stmt->execute(array($email, $hashedPassword));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // fonction pour modifier infos admin 
    function modifierInfosAdmin($email, $password, $id)
    {
        $pdo = $this->connexion();
        if (empty($password)) {
            $stmt = $pdo->prepare('UPDATE admin SET EMAIL=? WHERE IDADMIN=?');
            $stmt->execute(array($email, $id));
        } else {
            $hashedPassword = sha1($password);
            $stmt = $pdo->prepare('UPDATE admin SET EMAIL=?, PASSWORD=? WHERE IDADMIN=?');
            $stmt->execute(array($email, $hashedPassword, $id));
        }
    }
    // fonction retourne les infos admin à l'aide d'email
    function rechercheAdminAvecEmail($email)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM admin WHERE EMAIL=?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }
    // fonction pour restaurer le mot de passe d'admin : 
    function restaurerMotDePassseAdmin($email)
    {
        $pdo = $this->connexion();
        $password = random_int(1000000, 9999999);
        $hashedPassword = sha1($password);
        $stmt = $pdo->prepare('UPDATE admin SET PASSWORD=? WHERE EMAIL=?');
        $stmt->execute(array($hashedPassword, $email));
        return $password;
    }
    // fonction retourne les infos d'une classe à l'aide de nom de classe
    function rechercheClasseAvecNom($nomClasse)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM classe WHERE NOMCLASSE=?');
        $stmt->execute(array($nomClasse));
        return $stmt->fetch();
    }
    // fonction teste if classe exist avec id : 
    function isClasseById($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM classe WHERE IDCLASSE=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }
    // fonction retourne les infos d'une classe à l'aide de cne
    function rechercheClasseAvecId($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM classe WHERE IDCLASSE=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    // fonction retourne tout les classe : 
    function getAllClasses()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM classe');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //
    function getEtudiantsByClasseId($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM etudiant WHERE IDCLASSE=? ORDER BY NOM');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }
    // fonction pour inserer une reclamation :
    function insererReclamation($idEtudiant, $reclamation, $dateReclamation, $etat)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('INSERT INTO reclamation(IDETUDIANT,RECLAMATION,DATERECLAMATION,ETAT) VALUES(?,?,?,?)');
        $stmt->execute(array($idEtudiant, $reclamation, $dateReclamation, $etat));
    }
    // fonction retourne tous les réclamtion : 
    function getAllReclamation()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM reclamation');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // fonction cherche une réclamtion avec son id :
    public function getEtudiantReclamtion($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM reclamation WHERE IDRECLAMATION=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    // fonction supprime une réclamtion avec son id :
    public function deleteEtudiantReclamtion($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('DELETE FROM reclamation WHERE IDRECLAMATION=?');
        $stmt->execute(array($id));
    }
    // fonction retourne tous les réclamtion : 
    function getAllReclamationEtudiant($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM reclamation WHERE IDETUDIANT=?');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    // fonction teste si réclamation existe avec id : 
    function estReclamationById($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM reclamation WHERE IDRECLAMATION=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() != 0)
            return true;
        else return false;
    }

    // fonction edite une réclamation : 
    function editReclamation($id, $idEtudiant, $reclamation)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('UPDATE reclamation set RECLAMATION=? WHERE IDRECLAMATION=? AND IDETUDIANT=?');
        $stmt->execute(array($reclamation, $id, $idEtudiant));
    }

    function traiterReclamation($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('UPDATE reclamation SET ETAT=? WHERE IDRECLAMATION=?');
        $stmt->execute(array(1, $id));
    }

    function compteurReclamationsNonTraite()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM reclamation WHERE ETAT!=?');
        $stmt->execute(array(1));
        return $stmt->rowCount();
    }

    function ajouteAnnonce($annonce, $date, $classes_id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('INSERT INTO annonce(ANNONCE,DATE) VALUES(?,?)');
        $stmt->execute(array($annonce, $date));
        $stmt = $pdo->prepare('SELECT * from annonce WHERE ANNONCE=?');
        $stmt->execute(array($annonce));
        $infos_annonce = $stmt->fetch();
        foreach ($classes_id as $classe_id) {
            $stmt = $pdo->prepare('INSERT INTO annonce_classe(IDANNONCE,IDCLASSE) VALUES(?,?)');
            $stmt->execute(array($infos_annonce['IDANNONCE'], $classe_id));
        }
    }

    function getAllAnnonce()
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM annonce');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function deleteAnnonce($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('DELETE FROM annonce WHERE IDANNONCE=?');
        $stmt->execute(array($id));
    }

    function isAnnonceById($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM annonce WHERE IDANNONCE=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }

    function searchAnnonceById($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM annonce WHERE IDANNONCE=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function getAllAnnonceClasse($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM annonce_classe WHERE IDCLASSE=?');
        $stmt->execute(array($id));
        $infos = $stmt->fetchAll();
        $annonces = [];
        foreach ($infos as $info) {
            $stmt = $pdo->prepare('SELECT * FROM annonce WHERE IDANNONCE=?');
            $stmt->execute(array($info['IDANNONCE']));
            $annonce = $stmt->fetch();
            array_push($annonces, $annonce);
        }
        return $annonces;
    }

    function isauthorizedToShowAnnonce($idAnnonce, $idClasse)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM annonce_classe WHERE IDANNONCE=? AND IDCLASSE=?');
        $stmt->execute(array($idAnnonce, $idClasse));
        if ($stmt->rowCount() != 0)
            return true;
        else
            return false;
    }

    function getclasseAnnonce($id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('SELECT * FROM annonce_classe WHERE IDANNONCE=?');
        $stmt->execute(array($id));
        $infos = $stmt->fetchAll();
        $classes = [];
        foreach ($infos as $info) {
            $stmt = $pdo->prepare('SELECT * FROM classe WHERE IDCLASSE=?');
            $stmt->execute(array($info['IDCLASSE']));
            $classe = $stmt->fetch();
            array_push($classes, $classe);
        }
        return $classes;
    }


    function modifierAnnonce($annonce, $id, $classes_id)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('UPDATE annonce SET ANNONCE=? WHERE IDANNONCE=?');
        $stmt->execute(array($annonce, $id));
        $stmt = $pdo->prepare('DELETE FROM annonce_classe WHERE IDANNONCE=?');
        $stmt->execute(array($id));
        $stmt = $pdo->prepare('SELECT * from annonce WHERE IDANNONCE=?');
        $stmt->execute(array($id));
        foreach ($classes_id as $classe_id) {
            $stmt = $pdo->prepare('INSERT INTO annonce_classe(IDANNONCE,IDCLASSE) VALUES(?,?)');
            $stmt->execute(array($id, $classe_id));
        }
    }








    // ------------------------------------------------------------------------

    // fonction pour inserer une demande :
    function insererDemande($typeDemande, $etatDemande, $dateDemande, $idEtudiant, $fileurl)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare("SELECT URLDOC FROM `demandes` where IDETUDIANT = $idEtudiant and TYPEDEMANDE = '$typeDemande'");
        $stmt->execute();
        $data = $stmt->fetch();


        $stmt = $pdo->prepare("INSERT INTO demandes(TYPEDEMANDE,ETATDEMANDE,DATEDEMANDE,IDETUDIANT,URLDOC) VALUES('$typeDemande', '$etatDemande', '$dateDemande', $idEtudiant,'$fileurl')");
        $stmt->execute();
    }

    //fonction pour afficher liste des demandes :
    function listeDemande()
    {
        $pdo = $this->connexion();
        $req = $pdo->query("select * from demandes where idEtudiant=$etudiant->idEtudiant");
        $data = $req->fetch();
        return $data;
    }

    //fonction pour editer une demande : 
    // function  UpdateDemande(){
    //     $pdo = $this->connexion();
    //     $ps=$pdo->prepare("UPDATE demandes SET TYPEDEMANDE=?,ETATDEMANDE=?,DATEDEMANDE=?,IDETUDIANT=? WHERE IDDEMANDE=? ");
    //     $params=array($typeDemande,$etatDemande,$dateDemande,$idEtudiant);
    //     $ps->execute($params);
    // }
    //fonction pour inserer un message
    public function Insert($refusersrc, $refuserdest, $message, $date)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare("INSERT INTO  message(refusersrc,refuserdest,message,date) VALUES(?,?,?,?)");

        $stmt->execute(array($refusersrc, $refuserdest, $message, $date));
    }
    //fonction pour trouver le recepteur du message

    //fonction pour inserer un document 
    function insererDocument($name, $file_url, $idEtudiant)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare("INSERT INTO documents(NAMEFILE,FILE_URL,IDETUDIANT) VALUES('$name','$file_url',$idEtudiant)");
        $stmt->execute();
        $stmt = $pdo->prepare("UPDATE `demandes` SET `URLDOC` = '$file_url' WHERE `demandes`.`IDETUDIANT` = $idEtudiant;");
        $stmt->execute();
    }
    //fonction pour update d'etat demande
    function UpdateDemande($etat, $idDemande)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare("UPDATE demandes SET ETATDEMANDE=? WHERE IDDEMANDE=? ");
        $stmt->execute(array($etat, $idDemande));
    }


    //fonction pour inserer l'abscence
    function insererAbscence($date, $heures, $idEtudiant)
    {
        $pdo = $this->connexion();
        $stmt = $pdo->prepare('INSERT INTO abscence(DATE,HEURES,IDETUDIANT) VALUES(?,?,?)');
        $stmt->execute(array($date, $heures, $idEtudiant));
    }
}
