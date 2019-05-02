<?php

/**
 * Nos han pedido reemplazar la herramienta para mantener
 * el catalogo de peliculas de Netflix porque el original
 * es muy malo. Pero como es un cambio muy grande en nuestra
 * primera entrega no hay que entregar todas las funcionalidades.
 * 
 * Las funcionalidades que nos piden son:
 *  - Agregar peliculas nuevas
 *  - Agregar series nuevas
 *  - Poder sacar peliculas
 *  - Poder sacar series
 *  - Listar por categoria
 *  - Una funcion que te dice si existe el id de pelicula/serie
 * 
 * Las categorias se van a ir creando a medida que se agregan
 * peliculas o series, entonces si se agrega una serie con la
 * categoria "ciencia misteriosa" esta categoría empieza a
 * existir en ese momento.
 * 
 * Tendremos que pasar todos los tests y tratemos de quedar
 * bien porque es nuestro primer cliente importante!
 */

class CatalogoNetflix {
 private $catalogo = array();
  public function existeId($id) {
    if (isset ($this->catalogo[$id])){
    return true;
    }else{
    return false;
    }
  }

  public function agregarSerie($id, $nombre, $caps, $categoria) {
    if (isset ($this->catalogo[$id])){
      return false;
      }
      $this->catalogo[$id]=array(
        'id' => $id,
        'nombre' => $nombre,
        'caps' => $caps,
        'categoria' => $categoria,
      );
      return true;
  }

  public function agrearPelicula($id, $nombre, $tiempo, $categoria) {
    if (!isset ($this->catalogo[$id])){
      $this->catalogo[$id]=array(
        'id' => $id,
        'nombre' => $nombre,
        'tiempo' => $tiempo,
        'categoria' => $categoria,
      );
      return true;
      }else{
        return false;
      }
  }

  public function sacarSerie($id) {
    if (!isset ($this->catalogo[$id])){
      return false;
    }
    unset($this->catalogo[$id]);
    return true;
  }

  public function sacarPelicula($id) {
    if (!isset ($this->catalogo[$id])){
      return false;
    }
    unset($this->catalogo[$id]);
    return true;
  }

  public function listarContenidoDeLaCategoria($categoria) {
    $temp = array();
    foreach ($this->catalogo as $contenido) {
      if ($contenido['categoria'] == $categoria) {
        $temp[] = $contenido;
      }
    }
    return $temp;
  }

}