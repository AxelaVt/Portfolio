

<?php
require 'model/model.php';
require "class/about.php";
require "class/projects.php";



function displayAbout(){
  $aboutmanager = new About();
  $data = $aboutmanager->get_lastpublish();
  return $data;
}

function displayProjects(){
  $projectsmanager = new Project();
  $data = $projectsmanager->get_actifsProjects();
  return $data;

}

function quantityProject(){
  $projectsmanager = new Project();
  $projectsqty = $projectsmanager->count_actifsProjects();
  return $projectsqty;
}

function displayContact(){
  require('view/contactView.php');
}

function displayProjet(){
  if (isset($_GET['id']) && $_GET['id'] > 0){
    $projectsmanager = new Project();
    $data = get_id($_GET['id']);
    return $data;
  }

}
