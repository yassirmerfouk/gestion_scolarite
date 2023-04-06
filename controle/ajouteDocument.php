<?php
if(!empty($_FILES)){
    $idEtudiant = $_POST['id'];
    $file_name = $_FILES['file']['name'];
    $file_extension = strrchr($file_name,".");
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_dest = '../admin/files/'.$file_name;
    $extensions_autorisees = array('.pdf','.PDF');
    if(in_array($file_extension,$extensions_autorisees,$idEtudiant)){
        if(move_uploaded_file($file_tmp_name,$file_dest)){
        include '../connect/metiers.php';
        
 		$document = new document();
        echo $file_name,$file_dest,$idEtudiant ;
 		$document->insererDocument($file_name,$file_dest,$idEtudiant);
        header('location: ../admin/document.php?validation=1');
        }else{
            header('location: ../admin/document.php?erreur=1');
        }
    }else{
         echo "seules les fichiers PDF sont autorisés";
       }
}