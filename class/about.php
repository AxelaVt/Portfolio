<?php
require_once 'model/model.php';

class About extends MODEL {

  public function __construct() {
    $this->data_base = "portfolio";
    $this->table = "about";
    $this->table_columns = "(
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      titre varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      texte text COLLATE utf8_unicode_ci NOT NULL
      )";
    $this->createDataBase();
    $this->createTable();
  }

  public function get_lastpublish() {
    return $this->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1");
  }

  public function add($titre) {
    $this->query("INSERT INTO $this->table (titre) VALUES (?)", $titre);
  }

  public function remove($id) {
    $this->query("DELETE FROM $this->table WHERE id = ?", $id);
  }

  public function get_id($id) {
    return $this->query("SELECT * FROM $this->table WHERE id = ?", $id)->fetch_assoc();
  }

  public function get_titre($titre) {
    return $this->query("SELECT * FROM $this->table WHERE name = ?", $titre)->fetch_assoc();
  }

  public function get_texte($texte) {
    return $this->query("SELECT * FROM $this->table WHERE texte = ?", $texte)->fetch_assoc();
  }

  public function set_titre($id, $titre) {
    $this->query("UPDATE $this->table SET titre = ? WHERE id = ?", $titre, $id);
  }

  public function set_texte($id, $texte) {
    $this->query("UPDATE $this->table SET texte = ? WHERE id = ?", $texte, $id);
  }

  public function get_all() {
    return $this->query("SELECT * FROM $this->table");
  }

  public function delete_all() {
    $this->resetTable();
  }

}
