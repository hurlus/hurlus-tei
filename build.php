<?php

Hurlus::init();
file_put_contents(Hurlus::$home."README.md", Hurlus::readme());

class Hurlus
{
  /** Home directory of project, absolute */
  static $home;
  
  public static function init()
  {
    self::$home = dirname(__FILE__).'/';
  }

  public static function readme()
  {
    $readme = "
# Hurlus, les textes

Liens vers les fichiers XML. En cliquant, un texte devrait vous apparaître 
sans balises et proprement mis en page, avec une transformatoin XSLT à la volée
qui se fait dans le navigateur.

";
    
    foreach (glob(self::$home."*.xml") as $srcfile) {
      $basename = basename($srcfile);
      $readme .= "1. [$basename](https://hurlus.github.io/hurlus-tei/$basename)\n";
    }
    return $readme;
  }
}


?>
