<?php
include 'DAO.php';
class etudiant
{
    public $idEtudiant;
    public $idClasse;
    public $nom;
    public $prenom;
    public $cne;
    public $cin;
    public $email;
    public $password;
    public $telphone;
    public $image;
    public $dateNaissance;
    public $nomAr;
    public $prenomAr;
    public $bacAnnee;
    public $bacFiliere;
    public $bacMention;
    public $villeOrigine;
    public $villeActuel;
    public $adresse;
    public $copyBac;
    public $copyCin;
    function __construct()
    {
    }
    // fonction pour inserer tout les infos d'un étudiant
    function setInfos($idEtudiant, $idClasse, $nom, $prenom, $cne, $cin, $email, $password, $telphone, $image, $dateNaissance, $nomAr, $prenomAr, $bacAnnee, $bacFiliere, $bacMention, $villeOrigine, $villeActuel, $adresse, $copyBac, $copyCin)
    {
        $this->idEtudiant = $idEtudiant;
        $this->idClasse = $idClasse;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->cne = $cne;
        $this->cin = $cin;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telphone;
        $this->image = $image;
        $this->dateNaissance = $dateNaissance;
        $this->nomAr = $nomAr;
        $this->prenomAr = $prenomAr;
        $this->bacAnnee = $bacAnnee;
        $this->bacFiliere = $bacFiliere;
        $this->bacMention = $bacMention;
        $this->villeOrigine = $villeOrigine;
        $this->villeActuel = $villeActuel;
        $this->adresse = $adresse;
        $this->copyBac = $copyBac;
        $this->copyCin = $copyCin;
    }
    function estEtudiant()
    {
        $dao = new DAO();
        return $dao->estEtudiant($this->cne);
    }
    function rechercheDansListeEtudiant()
    {
        $dao = new DAO();
        return $dao->rechercheDansListeEtudiant($this->cne);
    }
    function estEtudiantAvecCompte()
    {
        $dao = new DAO();
        return $dao->estEtudiantAvecCompte($this->cne);
    }
    function estEtudiantEmail()
    {
        $dao = new DAO();
        return $dao->estEtudiantEmail($this->email);
    }
    function estEtudiantEmail2()
    {
        $dao = new DAO();
        return $dao->estEtudiantEmail2($this->email, $this->idEtudiant);
    }
    function connexionEtudiant()
    {
        $dao = new DAO();
        return $dao->connexionEtudiant($this->cne, $this->password);
    }
    function insererInfosEtudiantCreation()
    {
        $dao = new DAO();
        $dao->insererInfosEtudiantCreation($this->idClasse, $this->cne, $this->nom, $this->prenom, $this->email, $this->dateNaissance, $this->password);
    }
    function rechercheEtudiantAvecCne()
    {
        $dao = new DAO();
        $infos = $dao->rechercheEtudiantAvecCne($this->cne);
        $etudiant = new etudiant();
        $etudiant->setInfos($infos['IDETUDIANT'], $infos['IDCLASSE'], $infos['NOM'], $infos['PRENOM'], $infos['CNE'], $infos['CIN'], $infos['EMAIL'], $infos['PASSWORD'], $infos['TELEPHONE'], $infos['IMAGE'], $infos['DATENAISSANCE'], $infos['NOMAR'], $infos['PRENOMAR'], $infos['BACANNEE'], $infos['BACFILIERE'], $infos['BACMENTION'], $infos['VILLEORIGINE'], $infos['VILLEACTUEL'], $infos['ADRESSE'], $infos['COPYBAC'], $infos['COPYCIN']);
        return $etudiant;
    }
    function rechercheEtudiantAvecId()
    {
        $dao = new DAO();
        $infos = $dao->rechercheEtudiantAvecId($this->idEtudiant);
        $etudiant = new etudiant();
        $etudiant->setInfos($infos['IDETUDIANT'], $infos['IDCLASSE'], $infos['NOM'], $infos['PRENOM'], $infos['CNE'], $infos['CIN'], $infos['EMAIL'], $infos['PASSWORD'], $infos['TELEPHONE'], $infos['IMAGE'], $infos['DATENAISSANCE'], $infos['NOMAR'], $infos['PRENOMAR'], $infos['BACANNEE'], $infos['BACFILIERE'], $infos['BACMENTION'], $infos['VILLEORIGINE'], $infos['VILLEACTUEL'], $infos['ADRESSE'], $infos['COPYBAC'], $infos['COPYCIN']);
        return $etudiant;
    }
    function isEtudiantById()
    {
        $dao = new DAO();
        return $dao->isEtudiantById($this->idEtudiant);
    }
    function inscriptionEtudiant()
    {
        $dao = new DAO();
        $dao->inscriptionEtudiant($this->idEtudiant, $this->cin, $this->telephone, $this->image, $this->nomAr, $this->prenomAr, $this->bacAnnee, $this->bacFiliere, $this->bacMention, $this->villeOrigine, $this->villeActuel, $this->adresse, $this->copyBac, $this->copyCin);
    }
    function identiqueMotDePasseEtudiant()
    {
        $dao = new DAO();
        return $dao->identiqueMotDePasseEtudiant($this->idEtudiant, $this->password);
    }
    function modifierInfosEtudiant()
    {
        $dao = new DAO();
        $dao->modifierInfosEtudiant($this->idEtudiant, $this->email, $this->password, $this->telephone, $this->adresse, $this->image);
    }
    function estInscrit()
    {
        $dao = new DAO();
        return $dao->estInscrit($this->cin);
    }
    static function compteurEtudiantsAdmis()
    {
        $dao = new DAO();
        return $dao->compteurEtudiantsAdmis();
    }
    static function compteurEtudiantsInscrit()
    {
        $dao = new DAO();
        return $dao->compteurEtudiantsInscrit();
    }
    function restaurerMotDePassseEtudiant()
    {
        $dao = new DAO();
        return $dao->restaurerMotDePassseEtudiant($this->email);
    }
}

class admin
{
    public $idAdmin;
    public $email;
    public $password;
    function __construct()
    {
    }
    function setInfos($idAdmin, $email, $password)
    {
        $this->idAdmin = $idAdmin;
        $this->email = $email;
        $this->password = $password;
    }
    function estAdmin()
    {
        $dao = new DAO();
        return $dao->estAdmin($this->email);
    }
    function identiqueMotDePasseAdmin()
    {
        $dao = new DAO();
        return $dao->identiqueMotDePasseAdmin($this->idAdmin, $this->password);
    }
    function connexionAdmin()
    {
        $dao = new DAO();
        return $dao->connexionAdmin($this->email, $this->password);
    }
    function modifierInfosAdmin()
    {
        $dao = new DAO();
        $dao->modifierInfosAdmin($this->email, $this->password, $this->idAdmin);
    }
    function rechercheAdminAvecEmail()
    {
        $dao = new DAO();
        $infos = $dao->rechercheAdminAvecEmail($this->email);
        $admin = new admin();
        $admin->setInfos($infos['IDADMIN'], $infos['EMAIL'], $infos['PASSWORD']);
        return $admin;
    }
    function restaurerMotDePassseAdmin()
    {
        $dao = new DAO();
        return $dao->restaurerMotDePassseAdmin($this->email);
    }
}
class classe
{
    public $idClasse;
    public $nomClasse;
    function __construct()
    {
    }
    function setInfos($idClasse, $nomClasse)
    {
        $this->idClasse = $idClasse;
        $this->nomClasse = $nomClasse;
    }
    function rechercheClasseAvecNom()
    {
        $dao = new DAO();
        $infos = $dao->rechercheClasseAvecNom($this->nomClasse);
        $classe = new classe();
        $classe->setInfos($infos['IDCLASSE'], $infos['NOMCLASSE']);
        return $classe;
    }
    function rechercheClasseAvecId()
    {
        $dao = new DAO();
        $infos = $dao->rechercheClasseAvecId($this->idClasse);
        $classe = new classe();
        $classe->setInfos($infos['IDCLASSE'], $infos['NOMCLASSE']);
        return $classe;
    }
    function isClasseById()
    {
        $dao = new DAO();
        return $dao->isClasseById($this->idClasse);
    }
    function getAllClasses()
    {
        $dao = new DAO();
        $infos = $dao->getAllClasses();
        $classes = [];
        foreach ($infos as $info) {
            $classe = new classe();
            $classe->setInfos($info['IDCLASSE'], $info['NOMCLASSE']);
            array_push($classes, $classe);
        }
        return $classes;
    }
    function getEtudiantsByClasseId()
    {
        $dao = new DAO();
        $infos = $dao->getEtudiantsByClasseId($this->idClasse);
        $etudiants = [];
        foreach ($infos as $info) {
            $etudiant = new etudiant();
            $etudiant->setInfos($info['IDETUDIANT'], $info['IDCLASSE'], $info['NOM'], $info['PRENOM'], $info['CNE'], $info['CIN'], $info['EMAIL'], $info['PASSWORD'], $info['TELEPHONE'], $info['IMAGE'], $info['DATENAISSANCE'], $info['NOMAR'], $info['PRENOMAR'], $info['BACANNEE'], $info['BACFILIERE'], $info['BACMENTION'], $info['VILLEORIGINE'], $info['VILLEACTUEL'], $info['ADRESSE'], $info['COPYBAC'], $info['COPYCIN']);
            array_push($etudiants, $etudiant);
        }
        return $etudiants;
    }
}
class reclamation
{
    public $idReclamation;
    public $idEtudiant;
    public $reclamation;
    public $dateReclamation;
    public $etat;
    function __construct()
    {
    }
    function setInfos($idEtudiant, $reclamation, $dateReclamation, $etat)
    {
        $this->idEtudiant = $idEtudiant;
        $this->reclamation = $reclamation;
        $this->dateReclamation = $dateReclamation;
        $this->etat = $etat;
    }
    function insererReclamation()
    {
        $dao = new DAO();
        $dao->insererReclamation($this->idEtudiant, $this->reclamation, $this->dateReclamation, $this->etat);
    }
    function getAllReclamation()
    {
        $dao = new DAO();
        $infos = $dao->getAllReclamation();
        $reclamtions = [];
        foreach ($infos as $info) {
            $reclamation = new reclamation();
            $reclamation->idReclamation = $info['IDRECLAMATION'];
            $reclamation->setInfos($info['IDETUDIANT'], $info['RECLAMATION'], $info['DATERECLAMATION'], $info['ETAT']);
            array_push($reclamtions, $reclamation);
        }
        return $reclamtions;
    }

    public function getEtudiantReclamtion()
    {
        $dao = new DAO();
        $infos = $dao->getEtudiantReclamtion($this->idReclamation);
        $reclamation = new reclamation();
        $reclamation->idReclamation = $infos['IDRECLAMATION'];
        $reclamation->setInfos($infos['IDETUDIANT'], $infos['RECLAMATION'], $infos['DATERECLAMATION'], $infos['ETAT']);
        return $reclamation;
    }

    public function deleteEtudiantReclamtion()
    {
        $dao = new DAO();
        $dao->deleteEtudiantReclamtion($this->idReclamation);
    }

    function getAllReclamationEtudiant()
    {
        $dao = new DAO();
        $infos = $dao->getAllReclamationEtudiant($this->idEtudiant);
        $reclamtions = [];
        foreach ($infos as $info) {
            $reclamation = new reclamation();
            $reclamation->idReclamation = $info['IDRECLAMATION'];
            $reclamation->setInfos($info['IDETUDIANT'], $info['RECLAMATION'], $info['DATERECLAMATION'], $info['ETAT']);
            array_push($reclamtions, $reclamation);
        }
        return $reclamtions;
    }

    function estReclamationById()
    {
        $dao = new DAO();
        return $dao->estReclamationById($this->idReclamation);
    }

    function editReclamation()
    {
        $dao = new DAO();
        $dao->editReclamation($this->idReclamation, $this->idEtudiant, $this->reclamation);
    }

    function traiterReclamation()
    {
        $dao = new DAO();
        $dao->traiterReclamation($this->idReclamation);
    }

    static function compteurReclamationsNonTraite()
    {
        $dao = new DAO();
        return $dao->compteurReclamationsNonTraite();
    }
}

class annonce
{
    public $idAnnonce;
    public $annonce;
    public $dateAnnonce;

    public function __construct()
    {
    }

    public function setInfos($idAnnonce, $annonce, $dateAnnonce)
    {
        $this->idAnnonce = $idAnnonce;
        $this->annonce = $annonce;
        $this->dateAnnonce = $dateAnnonce;
    }

    function ajouteAnnonce($classes_id)
    {
        $dao = new DAO();
        $dao->ajouteAnnonce($this->annonce, $this->dateAnnonce, $classes_id);
    }

    public function getAllAnnonce()
    {
        $dao = new DAO();
        $infos = $dao->getAllAnnonce();
        $annonces = [];
        foreach ($infos as $info) {
            $annonce = new annonce();
            $annonce->setInfos($info['IDANNONCE'], $info['ANNONCE'], $info['DATE']);
            array_push($annonces, $annonce);
        }
        return $annonces;
    }

    public function deleteAnnonce()
    {
        $dao = new DAO();
        $dao->deleteAnnonce($this->idAnnonce);
    }

    public function isAnnonceById()
    {
        $dao = new DAO();
        return $dao->isAnnonceById($this->idAnnonce);
    }

    public function searchAnnonceById()
    {
        $dao = new DAO();
        $infos = $dao->searchAnnonceById($this->idAnnonce);
        $annonce = new annonce();
        $annonce->setInfos($infos['IDANNONCE'], $infos['ANNONCE'], $infos['DATE']);
        return $annonce;
    }

    function getAllAnnonceClasse($id)
    {
        $dao = new DAO();
        $infos = $dao->getAllAnnonceClasse($id);
        $annonces = [];
        foreach ($infos as $info) {
            $annonce = new annonce();
            $annonce->setInfos($info['IDANNONCE'], $info['ANNONCE'], $info['DATE']);
            array_push($annonces, $annonce);
        }
        return $annonces;
    }

    function isauthorizedToShowAnnonce($idAnnonce, $idClasse)
    {
        $dao = new DAO();
        return $dao->isauthorizedToShowAnnonce($idAnnonce, $idClasse);
    }

    function getclasseAnnonce()
    {
        $dao = new DAO();
        $infos = $dao->getclasseAnnonce($this->idAnnonce);
        $classes = [];
        foreach ($infos as $info) {
            $classe = new classe();
            $classe->setInfos($info['IDCLASSE'], $info['NOMCLASSE']);
            array_push($classes, $classe);
        }
        return $classes;
    }

    function modifierAnnonce($classes_id)
    {
        $dao = new DAO();
        $dao->modifierAnnonce($this->annonce, $this->idAnnonce, $classes_id);
    }
}


class demande
{
    public $idDemande;
    public $etatDemande;
    public $typeDemande;
    public $dateDemande;
    public $idEtudiant;
    public $fileurl;
    function __construct()
    {
    }

    function setInfos($typeDemande, $etatDemande, $dateDemande, $idEtudiant, $k)
    {
        $this->etatDemande = $etatDemande;
        $this->typeDemande = $typeDemande;
        $this->dateDemande = $dateDemande;
        $this->idEtudiant = $idEtudiant;
        $this->fileurl = $k;
    }
    
    function insererDemande()
    {
        $dao = new DAO();
        $dao->insererDemande($this->typeDemande, $this->etatDemande, $this->dateDemande, $this->idEtudiant, $this->fileurl);
    }
    function listeDemande()
    {
        $dao = new DAO();
        $dao->listeDemande();
    }

    function listeDemandeAttente()
    {
        $dao = new DAO();
        $dao->listeDemandeAttente();
    }
    function UpdateDemande($et, $idd)
    {
        $dao = new DAO();
        $dao->UpdateDemande($et, $idd);
    }
}

class Message
{
    public $id;
    public $refusersrc;
    public $refuserdest;
    public $message;
    public $date;


    public function setInfos($refusersrc, $refuserdest, $message, $date)
    {
        $this->refusersrc = $refusersrc;
        $this->refuserdest = $refuserdest;
        $this->message = $message;
        $this->date = $date;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMessage()
    {
        return $this->message;
    }


    public function setMessage($message)
    {
        $this->message = $message;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;
    }
    public function insert()
    {
        $dao = new DAO();
        $dao->insert($this->refusersrc, $this->refuserdest, $this->message, $this->date);
    }
    public function deleteMessage()
    {
        $dao = new DAO();
        $dao->deleteMessage($this->refusersrc, $this->refuserdest);
    }
}
class document
{
    public $id;
    public $name;
    public $file_url;
    public $idEtudiant;
    public $etat;
    public $idDemande;
    function __construct()
    {
    }


    function insererDocument($name, $file_url, $idEtudiant)
    {
        $this->name = $name;
        $this->file_url = $file_url;
        $this->idEtudiant = $idEtudiant;
        $dao = new DAO();
        $dao->insererDocument($this->name, $this->file_url, $this->idEtudiant);
    }
    // function UpdateDemande($etat,$idDemande){
    //     $this->etat = $etat;

    //     $this->idDemande = $idDemande;
    //     $dao =new DAO();
    //     $dao->insererDocument($this->name,$this->file_url,$this->idEtudiant);

    // }


}
class abscence
{
    public $id;
    public $date;
    public $heures;
    public $idEtudiant;

    function __construct()
    {
    }

    function insererAbscence($date, $heures, $idEtudiant)
    {
        $this->date = $date;
        $this->heures = $heures;
        $this->idEtudiant = $idEtudiant;
        $dao = new DAO();
        $dao->insererAbscence($this->date, $this->heures, $this->idEtudiant);
    }
}
