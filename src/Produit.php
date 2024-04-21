<?php 

namespace App;

class Produit
{
	/**
	 * Nom du produit
	 *
	 * @var string
	 **/
	public string $nom;

	/**
	 * Prix du produit
	 *
	 * @var int
	 **/
	public int $prix;

	/**
	 * Manager permettant de faire les traitements avec la BD
	 *
	 * @var ProduitManager
	 **/
	protected static ProduitManager $manager;

	/**
	 * Constructeur permettant de charger le nom et le prix d'un produit
	 *
	 * @return void
	 * @param string $n 
	 * @param int $p 
	 **/
	public function __construct(string $n, int $p)
	{
		$this->nom = $n;
		$this->prix = $p;
	}

	/**
	 * Methode pour convertir nos objets en chaine de caracteres et les afficher
	 *
	 * @return string
	 *  
	 **/
	public function __toString() : string
	{
		return "Produit => Nom : $this->nom \n           Prix : $this->prix ";
	}

	/**
	 * Methode pour creer un produit en BD
	 *
	 * @return Produit|null
	 * @author 
	 **/
	public static function create(array $attributes) : ?Produit
	{
		static::$manager = new ProduitManager(DB::mysql_connector());
	 	if (!(isset($attributes["nom"]) || !(isset($attributes["prix"]))))
	 	{
	 		die("Veuillez envoyer des donnees valides");
			return null;
	 	} 
	 	else
	 	{
	 		$produit = new Produit($attributes["nom"], $attributes["prix"]);
	 		static::$manager->add($produit);
	 		return $produit;
	 	}
	 	
 	}	

	/**
	 * Fonction pour rechercher un produit en BD a partir de son id
	 *
	 * Undocumented function long description
	 *
	 * @param int $id id du produit
	 * @return Produit|null
	 * @throws id n'exixte pas en BD
	 **/
	public static function find(int $id): ?Produit
	{
		static::$manager = new ProduitManager(DB::mysql_connector());

		return static::$manager->find($id);
	}

	public static function all() : Array
	{
		static::$manager = new ProduitManager(DB::mysql_connector());
		return static::$manager->all();
	}

	/* Accesseurs */
	public function getNom() : string
	{
		return $this->nom;
	}

	public function getPrix() : int
	{
		return $this->prix;
	}

	/* Mutateurs */
	public function setPrix(int $p) : void
	{
		$this->prix = $p;
	}

	public function setNom(string $n) : void
	{
		$this->prix = $n;
	}
}