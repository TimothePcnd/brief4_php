<?php


require_once 'Database.php';
/* Class Produit
/* Caractéristiques : nom, prix et stock
* On utilise :
* des propriétés privées pour l'encapsulation
* un constructeur pour initialiser les objets
* des getters pour accéder aux données et des setters pour les modifier
* une méthode qui permet d'afficher les détails du produit
*/
class Produit {

    // propriétés privées
    private $id; // id unique de la base de données
    private $nom;
    private $prix;
    private $stock;


    // Constructeur : initialisation du produit
    public function __construct($nom, $prix, $stock, $id = null) {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->stock= $stock;
        $this->id = $id;
    }

    // Getter pour l'ID
    public static function loadProducts() {
        // On récupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();
        // Récupération des infos dans la BDD
        $stmt = $db->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function  getId() {
        return $this->id;
    }

    // Getter pour la marque
    public function  getNom() {
        return $this->nom;
    }

    // Getter pour l'année
    public function  getPrix() {
        return $this->prix;
    }

    // Getter pour l'état
    public function  getStock() {
        return $this->stock;
    }

    //GET des détails du produit
    public function getDetails() {
        return "Produit : " . $this->nom . " " . $this->prix . " " . $this->stock;
    }


    //Affichage des détails du produit
    public function afficherDetails() {
        echo "Produit : " . $this->nom . " " . $this->prix . " " . $this->stock . "<br>";
    }

    // Méthode pour sauvegarder du produit en BDD
    // SI l'id est null alors on fait une nouvelle insertion
    // Sinon, on met à jour l'enregistrement

    public function save() {
        // On récupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();

        if ($this->id === null){
            // Insertion
            $stmt = $db->prepare("INSERT INTO produits (nom, prix, stock) VALUES (?,?,?)");
            $stmt->execute([$this->nom, $this->prix, $this->stock]);

            // Récupération de l'ID généré par MySQL
            $this->id = $db->lastInsertId();

        } else {
            // Mise à jour si la voiture existe déjà
            $stmt = $db->prepare("UPDATE produits SET nom = ?, prix = ?, stock = ? WHERE id = ?");
            $stmt->execute([$this->nom, $this->prix, $this->stock, $this->id]);
        }
    }

    //Méthode pour charger la voiture provenant de la BDD
    /**
     * Charger un produit depuis la BDD via son ID
     * @param int $id id du produit
     * @return Produit|null retourne l'objet Produit (ou rien si non trouvé)
     */

    public static function loadById($id) {

        // On récupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();

        // Récupération des infos dans la BDD
        $stmt = $db->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function ajouter($nom, $prix, $stock){
        // Requete prepare
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO produits (nom, prix, stock) VALUES(?, ?, ?)");
        return $stmt->execute(array($nom, $prix, $stock));
    }

    // Function Modifier un produit
    public static function edit(string $nom, float $prix, int $stock, $id)
    {
        $db = Database::getInstance()->getConnection();
        // Mise à jour du produit dans la base de données
        $stmt = $db->prepare('UPDATE produits SET nom = ?, prix = ?, stock = ? WHERE id = ?');
        $stmt->execute([$nom, $prix, $stock, $id]);
    }
    /*public function supprimer(int $id){
        $stmt = $this ->pdo -> prepare("DELETE FROM produits WHERE id=?");
        return $stmt -> execute([$id]);
    }*/

    // Function Supprimer un produit
    public static function delete($id)
    {
        // Requête préparée
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('DELETE from produits where id = ?');
        return $stmt->execute([$id]);
    }

}