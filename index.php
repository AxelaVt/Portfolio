

<?php
require 'controller/controller.php';



// affichage accueil

 if (isset($_GET['action'])){

   if ($_GET['action'] == 'menu'){
     require ('view/menuView.php');
   }

   if ($_GET['action'] == 'about') {
     $data = displayAbout();

     require ('view/aboutView.php');
   }

   if ($_GET['action'] == 'projects') {
     $data = displayProjects();
     //$projectsqty = quantityProject();
     //var_dump($data);
     //var_dump($projectsqty);
     //$projectsqty = count($data);
     require ('view/projectsView.php');
   }

   if ($_GET['action'] == 'project') {
     $data = displayProjet();
     var_dump($data);
     foreach ($data as $row) {
      }
     require ('view/projectView.php');
   }

   if ($_GET['action'] == 'articles') {

   }

   if ($_GET['action'] == 'contact') {

   }

 }
   else {
     require('view/accueilView.php');
}

















 ?>
