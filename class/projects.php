<?php
require_once 'model/model.php';

class Project extends MODEL {

  public function __construct() {
    $this->data_base = "portfolio";
    $this->table = "projects";
    $this->table_columns = "(
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      titre varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      descriptif text COLLATE utf8_unicode_ci NOT NULL,
      image varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
      lien varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
      actif text COLLATE utf8_unicode_ci NOT NULL
      )";

    $this->createDataBase();
    $this->createTable();
  }

  public function get_all() {
    return $this->query("SELECT * FROM $this->table");
  }

  public function remove($id) {
    $this->query("DELETE FROM $this->table WHERE id = ?", $id);
  }

  public function get_id($id) {
    return $this->query("SELECT * FROM $this->table WHERE id = ?", $id)->fetch_assoc();
  }

  public function set_data($id, $titre, $description, $image, $lien, $actif) {
    $this->query("UPDATE $this->table SET id = ? WHERE id = ?", $id, $titre, $description, $image, $lien, $actif);
  }

  public function set_texte($id, $texte) {
    $this->query("UPDATE $this->table SET texte = ? WHERE id = ?", $texte, $id);
  }

  public function delete_all() {
    $this->resetTable();
  }

  public function actif($id) {
    $this->query("UPDATE $this->table SET archived = ? WHERE id = ?", "true", $id);
  }

  public function unactif($id) {
    $this->query("UPDATE $this->table SET archived = ? WHERE id = ?", "false", $id);
  }

  public function get_unactifProjects() {
    return $this->query("SELECT * FROM $this->table WHERE actif = 'false'");
  }

  public function get_actifsProjects() {
    return $this->query("SELECT * FROM $this->table WHERE actif = 'true'");
  }

  public function count_actifsProjects(){
    return $this->query("SELECT COUNT(*) FROM $this->table WHERE actif = 'true'");
  }


}
