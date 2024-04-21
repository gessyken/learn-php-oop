<?php

namespace App;
use PDO;
class ProduitManager
{
	/**
	 * Variable permettant la communication avec la BD
	 *
	 * @var PDO
	 **/
	protected PDO $db;


	/**
	 * Constructeur permettant de charger le driver PDO
	 *
	 * @return void
	 * @param PDO $d
	 **/
	public function __construct(PDO $d)
	{
		$this->db = $d;
	}

	/**
	 * Methode pour inserer un produit en BD
	 *
	 * @return void
	 * @param Produit $produit
	 **/
	public function add(Produit $produit) : void
	{
		$sql = "INSERT INTO produits (nom, prix) VALUES ('$produit->nom', '$produit->prix');";

		try {
			$this->db->exec($sql);
			echo "Produit ajoute avec succes\n";
		} catch (Exception $e) {
			$e->getMessage();
		}
	}

	/**
	 * Methode pour recuperer un produit en BD grace a son id 
	 *
	 * @return Produit|null
	 * @param int $id
	 **/
	public function find(int $id) : ?Produit
	{
		$sql = "SELECT * FROM produits WHERE id = $id LIMIT 1;";

		try {
			$stmt = $this->db->query($sql);
			
			if ($stmt->rowCount() < 1) 
			{
				return null;
			} 
			else 
			{
				$produit = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
				return ( $produit = new Produit($produit->nom, $produit->prix) );
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 * Methode pour supprimer un article en BD
	 *
	 * @return void
	 * @param Produit $produit 
	 **/
	public function delete(Produit $produit) : void
	{
		$sql = "DELETE FROM produits WHERE nom='$produit->nom' AND prix = $produit->prix ;";

		try {
			$this->db->exec($sql);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	/**
	 * Methode pour recuperer tous les articles en BD
	 *
	 * @return array
	 **/
	public function all() : Array
	{
		$sql = "SELECT * FROM produits ;";

		try {
			$stmt = $this->db->query($sql);
			$data = $stmt->fetchAll(PDO::FETCH_OBJ);

			$produits = [];

			foreach ($data as $produit) {
				$produits[] = new Produit($produit->nom, (int) $produit->prix);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}

		return $produits;
	}

}
