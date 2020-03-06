<?php
$title='Ajouter un artiste';
//j'instecie ma classe artiste 
$addArtist=  new artist();
//je créer mon tableau d'erreur
$formError=array();
if(isset($_POST['add'])){
    if(!empty($_POST['artistName'])){
        $addArtist->artist_name= htmlspecialchars($_POST['artistName']);
    } else {
   $formError['artistName']='Merci de remplir le nom de l\'artiste!!'     ;
   }
   if (count($formError) == 0) {
      
       $verfiAddArtist=$addArtist->addArtist();
   }
   if($verfiAddArtist==true){
        header("Location: listsArtist.php");
   }
}