<?php

namespace Model;

class Propiedad extends ActiveRecord
{
  protected static $table = "propiedades";
  protected static $columnsDB = [
    "id",
    "titulo",
    "precio",
    "imagen",
    "descripcion",
    "habitaciones",
    "wc",
    "estacionamiento",
    "creado",
    "vendedores_id"
  ];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? "";
    $this->precio = $args['precio'] ?? "";
    $this->imagen = $args['imagen'] ?? "";
    $this->descripcion = $args['descripcion'] ?? "";
    $this->habitaciones = $args['habitaciones'] ?? "";
    $this->wc = $args['wc'] ?? "";
    $this->estacionamiento = $args['estacionamiento'] ?? "";
    $this->creado = date('Y/m/d');
    $this->vendedores_id = $args['vendedores_id'] ?? '';
  }

  public function validate()
  {
    if (!$this->titulo) {
      self::$errors[] = "Titulo: Campo oblicatorio, debes añadir un titulo.";
    }

    if (!$this->precio) {
      self::$errors[] = "Precio: Campo obligatorio, debes añadir un precio.";
    }

    if (strlen($this->descripcion) < 50) {
      self::$errors[] = "Descripción: Campo obligatorio, debes añadir una descripción y debe tener almenos 50 caracteres.";
    }

    if (!$this->habitaciones) {
      self::$errors[] = "Habitaciones: El número de habitaciones es obligatorio.";
    }

    if (!$this->wc) {
      self::$errors[] = "Baños: El número de baños es obligatorio.";
    }

    if (!$this->estacionamiento) {
      self::$errors[] = "Estacionamiento: El número de estacionamiento es obligatorio.";
    }

    if (!$this->vendedores_id) {
      self::$errors[] = "Vendedor: Debes elegir a un vendedor.";
    }

    if (!$this->imagen) {
      self::$errors[] = "Imagen: La imagen es obligatoria.";
    }

    return self::$errors;
  }
}
