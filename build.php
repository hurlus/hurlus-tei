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
    include(dirname(dirname(__FILE__)).'/teinte/teidoc.php');
    $readme = "
# Hurlus, les sources

Liens vers les fichiers XML/TEI. En cliquant, un texte devrait vous apparaître 
sans balises et proprement mis en page, avec une transformatoin XSLT à la volée
qui se fait dans le navigateur.

| N° | Auteur | Date | Titre | XML/TEI |
| -: | :----- | ---: | :---- | ------: |
";
    $glob = dirname(__FILE__)."/*.xml";
    $i = 1;
    foreach (glob($glob) as $srcfile) {
      $name = pathinfo($srcfile,  PATHINFO_FILENAME);
      $teidoc = new Teidoc($srcfile);
      $meta = $teidoc->meta();
      $readme .= "|$i.|".$meta['byline'].'|'.$meta['date'].'|'.$meta['title'];
      $readme .= "|[$name.xml](https://hurlus.github.io/tei/$name.xml)";
      $readme .= "|\n";
      $i++;
    }
    return $readme;
  }
}


?>
