<?php


class databaseConnection {

    private static $instance;
    private $pdo;

    private $host = "localhost";
    private $user = "root";

    // Décommente la ligne ci-dessous pour le dev
    private $password = "Azerty75*";

    // Décommente la ligne ci dessous pour la prod
   //private $password = "Bretzel*password93";

    private $dbName = "autoshop";


    // Fonction Construct
    private function __construct(){
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->password, $pdo_options);
           $this->db_error = "";
        } catch (PDOException $e) {
            die("Une erreur est survenue. Impossible d'établir la connection avec la base de données.");
        }
    }

    public function utf8()
    {
        $query = $this->pdo->exec("SET NAMES UTF8");
    }

    // Crée une instance PDO ou récupère l'actuelle
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new databaseConnection();
        }
        return self::$instance;
    }

    // Fonction pour l'authentification
    public function login($user, $password)
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username and password = :password");
        $query->execute(array(':username' => $user, ':password' => $password));
        $result = $query->fetch();
        if ($result) {
            return array($result["id"], $result["type"], $result['email'], $result["username"]);
        } else {
            return 0;
        }       
    }

    // Fonction pour récupérer le password d'un compte
    // Fonction pour l'authentification
    public function getUserPassword($user)
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT password FROM users WHERE id=:id");
        $query->execute(array(':id' => $user));
        $result = $query->fetch();
        if ($result) {
            return $result['password'];
        } else {
            return 0;
        }       
    }



    // Fonction pour récupérer la liste des cartes à afficher dans le shop
    public function isUsernameUsed($username)
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT id FROM users WHERE username = :username");
        $query->execute(array('username' => $username));
        $result = $query->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }       
    }


    // Fonction pour récupérer le name d'un vendeur avec son user id
    public function getSellerName($id){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT username FROM users WHERE id = :id");
        $query->execute(array(':id' => $id));
        $result = $query->fetch();
        if ($result) {
            return $result['username'];
        } else {
            return 0;
        }        
    }

    // Fonction pour récupérer le name d'un vendeur avec son user id
    public function getStatusTicket($id){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT status FROM tickets WHERE id = :id");
        $query->execute(array(':id' => $id));
        $result = $query->fetch();
        if ($result) {
            return $result['status'];
        } else {
            return 0;
        }        
    }
    

    // Fonction pour récupérer la liste des cartes à afficher dans le shop
    public function getCountTotalCardConfirmed()
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM cards WHERE sold = 0 AND seller != 'NULL' and confirmed = 1");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }



    // Fonction pour compter le nombre de tickets en cours pour la partie admin
    public function getCountTotalTicketsPending()
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM tickets WHERE status != 'Fixed'");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }

    // Fonction pour compter le nombre de reports en cours pour la partie admin
    public function getCountTotalReportsPending()
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM reports WHERE status != 'Fixed'");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }

    // Fonction pour compter le nombre de withdraws en cours pour la partie admin
    public function getCountTotalWithdrawsPending()
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM deposits WHERE status = 'Pending'");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }

        
    // Fonction pour compter le nombre de deposits en cours pour la partie admin
    public function getCountTotalDepositsPending()
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM withdrawals WHERE status = 'Pending'");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }

    // Fonction pour compter le nombre de cards en cours pour la partie admin
    public function getCountTotalUnconfirmedCards()
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM cards WHERE confirmed = 0");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }
    



    // Fonction pour compter le nombre de tickets d'un user
    public function getCountMyTickets($user)
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM tickets WHERE author_id = :user and status = 'Pending'");
        $query->execute(array(':user' => $user));
        $result = $query->fetch();

        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }
    

    // Fonction pour l'authentification
    public function getCountMyPurchases($user)
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM orders WHERE id_user = :user and hide = 0");
        $query->execute(array(':user' => $user));
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }

    public function getCountMyPurchasedCards($user){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM orders WHERE id_user = :user AND type_product = 1 and hide = 0");
        $query->execute(array(':user' => $user));
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }           
    }

    // Fonction pour l'authentification
    public function getCountMyProducts($user)
    {
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM cards WHERE seller = :user AND confirmed = 1 AND sold=0");
        $query->execute(array(':user' => $user));
        $result = $query->fetch();
        if ($result) {
            return $result['count(*)'];
        } else {
            return 0;
        }       
    }
    
    // Fonction pour l'inscription
    public function register($user, $password, $email){
        try {
        $this->utf8();
        $query = $this->pdo->prepare("INSERT INTO users (username, password, email) 
                                      VALUES (:username, :password, :email)
                                    ");
        $query->execute(array(':username' => $user, 
                              ':password' => $password, 
                              ':email' => $email, 
                              )
                            );
        return $this->getLastUserId();
        } catch (PDOException $e) {
            return $e;
        }
    }

    // Fonction pour récupérer le montant de la balance
    public function getLastUserId(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT id FROM users ORDER BY id DESC LIMIT 1");
        $query->execute();
        $result = $query->fetch();
        if ($result) {
            return $result["id"];
        } else {
            return 0;
        }       
    }

    // Fonction pour récupérer le montant de la balance
    public function getBalance($username){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT balance FROM users WHERE username = :username");
        $query->execute(array(':username' => $username));
        $result = $query->fetch();
        if ($result) {
            return $result["balance"];
        } else {
            return 0;
        }       
    }

    // Fonction pour récupérer le premier message d'un ticket
    public function getPremierMessageTicket($ticket){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT users.username as author, 
                                      users.type as user_role,
                                      tickets.text,
                                      tickets.date as date_ticket
                                      FROM tickets 
                                      JOIN users
                                      ON tickets.author_id = users.id
                                      WHERE tickets.id = :id_ticket");


        $query->execute(array(':id_ticket' => $ticket));

        $result = $query->fetch();

        if(strtoupper($result['user_role']) == "SELLER"){
            $role_color = "green";
            $type_user = "Seller";
        } else {
            $role_color = "info";
            $type_user = "Customer";
        }

        if ($result) {
            $html = "<div class='cntmsg'><div class='messages__item messages__item--right'>
                            <div class='messages__details '>
                                <p style='font-size:16px !Important; max-width:270px !Important;; overflow-wrap: break-word !Important;'>{$result['text']}<br><br>
                                    <small>
                                        <span class='badge bg-blue'>{$result['author']}</span> 
                                        <span class='badge bg-{$role_color}'>{$type_user}</span>
                                        <span class='badge bg-indigo'>{$result['date_ticket']}</span>
                                    </small><br><span style='display:none' class='badge bg-danger' style='cursor:pointer' onclick='remchat(9)'><i class='zmdi zmdi-close-circle'></i></span>
                    <span style='display: none' class='badge bg-warning' style='cursor:pointer' onclick='banchatuser(1146)'><i class='zmdi zmdi-volume-off'></i></span>
                                </p>
                            </div>
                        </div>
                    ";
        return $html;
        } else {
            return 0;
        }       
    }

    // Fonction pour récupérer la conv d'un ticket
    public function getFullConvTicket($ticket){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT users.username as author, 
                                      tickets_messages.text,
                                      tickets_messages.date as date_ticket,
                                      users.type as user_role
                                      FROM tickets_messages
                                      JOIN users
                                      ON tickets_messages.id_author = users.id
                                      WHERE tickets_messages.id_ticket = :id_ticket");


        $query->execute(array(':id_ticket' => $ticket));

        $results = $query->fetchAll();
        if ($results) {
            $html = "";

            foreach($results as $result){

                if(strtoupper($result['user_role']) == "ADMIN"){
                    $author_color = "red";
                    $is_admin = "";
                    $role_color = "";
                    $type_user = "";
                } else {
                    $author_color = "blue";
                    $is_admin = "messages__item--right";

                    if(strtoupper($result['user_role']) == "SELLER"){
                        $role_color = "green";
                        $type_user = "Seller";
                    } else {
                        $role_color = "info";
                        $type_user = "Customer";
                    }
                }

                $html .= "<div class='messages__item {$is_admin}'>
                        <div class='messages__details '>
                            <p style='font-size:16px !Important; max-width:270px !Important;; overflow-wrap: break-word !Important;'>{$result['text']}<br><br>
                                <small>
                                    <span class='badge bg-{$author_color}'>{$result['author']}</span> 
                                    <span class='badge bg-{$role_color}'>{$type_user}</span>
                                    <span class='badge bg-indigo'> {$result['date_ticket']}</span>
                                    </small><br><span style='display: none' class='badge bg-danger' style='cursor:pointer'></span>
                            </p>
                        </div>
                        </div>";
            }
            return $html;
        }  
    }

    // Fonction pour récupérer la conv d'un ticket
    public function getUserList(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from users ORDER BY balance DESC");
        $query->execute();
        $results = $query->fetchAll();

        $html = "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
        <thead>
            <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 65px;'>User Name</th>
            <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 56px;'>User type</th>
            <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Balance</th>
            <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 57px;'>State</th>
            <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>tools</th>
            </tr>
        </thead>";

        if ($results) {
            foreach($results as $result){
                $html .= "<tbody>
                <tr role='row' class='odd'>
                    <td class=' dt-center'>{$result['username']}</td>
                    <td class=' dt-center'>{$result['type']}</td>
                    <td class=' dt-center'>\${$result['balance']}</td>
                    <td class=' dt-center'>Actif</td>
                    <td style='display: flex; justify-content: center' class=' dt-center'>
                        <a style='display: flex; justify-content: center; align-items: center;' href='?user={$result['id']}#modale_edit_user' id='edit' type='button' class='btn btn-success btn--icon' data-id='1146'> <i class='fas fa-edit'></i></a> 
                        <a style='display: flex; justify-content: center; align-items: center;' href='?user={$result['id']}#modale_delete_user' id='del' type='button' class='btn btn-danger btn--icon' data-id='1146'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>
            </tbody>";
            }

            $html .= "</table>";

            return $html;
        } else {
            return 0;
        }       
    }
    

    // Fonction pour récupérer les tickets d'un user
    public function getUserTickets($id_user){
        echo "TODO";
    }

    // Fonction pour la création d'un ticket
    public function createTicket($user, $object, $message){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO tickets (author_id, object, text) 
                                          VALUES (:user, :object, :message)
                                        ");
            $query->execute(array(':user' => $user, 
                                  ':object' => $object, 
                                  ':message' => $message, 
                                  )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }

    // Fonction pour la création d'un ticket
    public function addNews($titre, $contenu){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO news (titre, contenu) 
                                          VALUES (:titre, :contenu)
                                        ");
            $query->execute(array(':titre' => $titre, 
                                  ':contenu' => $contenu
                                  )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }


    // Fonction pour l'ajout d'un withdraw
    public function sendWithdrawRequest($id_user, $amount, $wallet){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO withdrawals (id_user, amount, wallet) 
                                          VALUES (:id_user, :amount, :wallet)
                                        ");
            $query->execute(array(':id_user' => $id_user, 
                                  ':amount' => $amount,
                                  ':wallet' => $wallet
                                  )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }


    // Fonction pour l'ajout d'un wallet
    public function addWallet($wallet){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO wallets (wallet) 
                                          VALUES (:wallet)
                                        ");

            $query->execute(array(':wallet' => $wallet 
                                  )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }



    // Fonction pour la création d'un ticket
    public function sendTicketMessage($author, $message, $id_ticket){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO tickets_messages (id_author, text, id_ticket) 
                                            VALUES (:id_author, :text, :id_ticket)
                                        ");
            $query->execute(array(':id_author' => $author, 
                                  ':text' => $message,
                                  ':id_ticket' => $id_ticket
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }

    // Fonction pour l'ajout d'une cc
    public function addCard($numbers, 
                            $exp, 
                            $cvv,
                            $vbv,
                            $holder,
                            $address,
                            $zip,
                            $city,
                            $price,
                            $infos,
                            $seller
                            ){
        try {


            
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO cards (numeros, 
                                                                exp, 
                                                                cvv,
                                                                vbv,
                                                                holder,
                                                                address,
                                                                zip,
                                                                city,
                                                                country,
                                                                price,
                                                                supplement,
                                                                seller,
                                                                banque,
                                                                level) 
                                            VALUES (:numeros, 
                                                    :exp, 
                                                    :cvv,
                                                    :vbv,
                                                    :holder,
                                                    :address,
                                                    :zip,
                                                    :city,
                                                    :country,
                                                    :price,
                                                    :supplement,
                                                    :seller,
                                                    :banque,
                                                    :level)
                                        ");

            $query->execute(array(':numeros' => $numbers, 
                                    ':exp' => $exp, 
                                    ':cvv' => $cvv,
                                    ':vbv' => $vbv,
                                    ':holder' => $holder,
                                    ':address' => $address,
                                    ':zip' => $zip,
                                    ':city' => $city,
                                    ':country' => $country,
                                    ':price' => $price,
                                    ':supplement' => $infos,
                                    ':seller' => $seller,
                                    ':banque' => $banque,
                                    ':level' => $level
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }


    // Fonction pour l'ajout d'une cc par un admin
    public function addCardAdmin($numbers, 
                            $exp, 
                            $cvv,
                            $vbv,
                            $holder,
                            $address,
                            $zip,
                            $city,
                            $price,
                            $infos,
                            $seller
                            ){
        try {


            
            $this->utf8();
            $query = $this->pdo->prepare("INSERT INTO cards (numeros, 
                                                                exp, 
                                                                cvv,
                                                                vbv,
                                                                holder,
                                                                address,
                                                                zip,
                                                                city,
                                                                country,
                                                                price,
                                                                supplement,
                                                                seller,
                                                                banque,
                                                                level,
                                                                confirmed) 
                                            VALUES (:numeros, 
                                                    :exp, 
                                                    :cvv,
                                                    :vbv,
                                                    :holder,
                                                    :address,
                                                    :zip,
                                                    :city,
                                                    :country,
                                                    :price,
                                                    :supplement,
                                                    :seller,
                                                    :banque,
                                                    :level,
                                                    1)
                                        ");

            $query->execute(array(':numeros' => $numbers, 
                                    ':exp' => $exp, 
                                    ':cvv' => $cvv,
                                    ':vbv' => $vbv,
                                    ':holder' => $holder,
                                    ':address' => $address,
                                    ':zip' => $zip,
                                    ':city' => $city,
                                    ':country' => $country,
                                    ':price' => $price,
                                    ':supplement' => $infos,
                                    ':seller' => $seller,
                                    ':banque' => $banque,
                                    ':level' => $level
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }





    // Fonction pour récupérer toutes les cartes en vente
    public function getAllCards(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT cards.id as id_card,
                                      cards.numeros,
                                      cards.exp,
                                      cards.zip,
                                      cards.country,
				      cards.banque,
				      cards.level,
                                      cards.price,
                                      cards.seller,
                                      users.username,
                                      users.id as id_seller
                                      from cards join users
                                      ON cards.seller = users.id  
                                      WHERE sold = 0 AND confirmed = 1;                                
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                  <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 30px;'>BIN</th>
                  <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 30px;'>Exp</th>
                  <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 30px;'>Type</th>
                  <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 230px;'>Banque</th>
                  <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Pays</th>
                  <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 110px;'>Prix (€)</th>
                  <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 110px;'>Vendeur</th>
                  <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 20px;'>Acheter</th>
                </tr>

            </thead>
            
        <tbody>";
  

        if ($results) {
            foreach($results as $result){
                $bin = str_replace(" ", "", $result['numeros']);
                $bin = substr($bin, 0, 6);

                $good_reviews = $this->getSellerGoodReviews($result['seller']);
                $bad_reviews = $this->getSellerBadReviews($result['seller']);

                $html .= "<tr role='row' class='odd'>
                            <td style='width: 30px' class=' dt-center'>{$bin}</td>
                            <td style='width: 30px' class=' dt-center'>{$result['exp']}</td>
                            <td style='width: 30px' class=' dt-center' style=''>{$result['level']}</td>
                            <td class=' dt-center' style=''>{$result['banque']}</td>
                            <td class=' dt-center'><small>{$result['country']}<small></small></small></td>
                            <td class=' dt-center'>{$result['price']}</td>
                            <td class=' dt-center' style=''><a href='http://localhost/as_bretzel/main/store.php?id={$result['id_seller']}'>{$result['username']}</a><br><span class='badge badge-success'>{$good_reviews} </span> <span class='badge badge-danger'>{$bad_reviews}</span></td>
                            <td style='width: 20px' class=' dt-center'><a href='http://localhost/as_bretzel/action/add/buy.php?id={$result['id_card']}' id='buythis' type='button' class='btn btn-light btn--icon' data-id='8'><i class='fas fa-shopping-cart'></i></a></td>
                            </tr>";
            
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        if($results){
            return $html;
        } else {
            return "<br>Aucune carte n'est disponible pour le moment.";
        }
    }

    // Fonction pour récupérer toutes les cartes à valider coté admin
    public function getAllUnconfirmedCards(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT cards.id as id_card,
                                        cards.numeros,
                                        cards.exp,
                                        cards.zip,
                                        cards.country,
                                        cards.price,
                                        cards.seller,
                                        users.username,
                                        users.id as id_seller
                                        from cards join users
                                        ON cards.seller = users.id  
                                        WHERE sold = 0 AND confirmed = 0;                                
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 30px;'>BIN</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 20px;'>Exp</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 20px;'>Price ($)</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 30px;'>Seller</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 20px;'>Actions</th>
                </tr>

            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){
                $bin = str_replace(" ", "", $result['numeros']);
                $bin = substr($bin, 0, 6);

                $good_reviews = $this->getSellerGoodReviews($result['seller']);
                $bad_reviews = $this->getSellerBadReviews($result['seller']);

                $html .= "<tr role='row' class='odd'>
                            <td style='width: 30px' class=' dt-center'>{$bin}</td>
                            <td style='width: 20px' class=' dt-center'>{$result['exp']}</td>
                            <td style='width: 20px' class=' dt-center'>{$result['price']}</td>
                            <td style='width: 30px' class=' dt-center' style=''><a href='http://localhost/as_bretzel/main/store.php?id={$result['id_seller']}'>{$result['username']}</a><br><span class='badge badge-success'>{$good_reviews} </span> <span class='badge badge-danger'>{$bad_reviews}</span></td>
                            <td style='width: 20px' class=' dt-center'>
                                <a class='btn btn-info' href='?id={$result['id_card']}#modale_view_card'>View</a>
                            </tr>";
            
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        if($results){
            return $html;
        } else {
            return "<br>Aucune carte n'est disponible pour le moment.";
        }
    }

    public function checkAllUnconfirmedCards(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT cards.id as id_card,
                                        cards.numeros,
                                        cards.exp,
                                        cards.zip,
                                        cards.country,
                                        cards.price,
                                        cards.seller,
                                        users.username,
                                        users.id as id_seller
                                        from cards join users
                                        ON cards.seller = users.id  
                                        WHERE sold = 0 AND confirmed = 0;                                
                                    ");

        $query->execute();

        $results = $query->fetchAll();    

        if ($results) {
            foreach($results as $result){
                $bin = str_replace(" ", "", $result['numeros']);
                $bin = substr($bin, 0, 6);

                $json = file_get_contents('https://api.bincodes.com/bin/?format=json&api_key=8d5fdde0d467a1d7c5a92a5df6f5d23b&bin='. $bin);
                $obj = json_decode($json);
                if($obj->valid == "true"){
			$this->autocompleteCard($result['id_card'], $obj->bank, $obj->level, $obj->country);
			$this->confirmCard($result['id_card']);
		}
            }
        } 

        if($results){
            return 1;
        } else {
            return 0;
        }
    }



    public function checkLuxCard($numeros, $expm, $expy, $cvv){
        $url = 'https://luxchecker.pw/apiv2/ck.php?cardnum=' . $numeros . '&expm=' .$expm. '&expy='.$expy.'&cvv='.$cvv.'&key=ed6158932dc835664b45841ecf18b817&username=bretzel';

        $json = file_get_contents($url);
        $obj = json_decode($json);

        return $obj->error;
    }



    public function autocompleteCard($id_card, $banque, $level, $country){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE cards
                                            SET banque = :banque,
                                            level = :level,
                                            country = :country 
                                            WHERE id = :id_card
                                        ");
            $query->execute(array(':id_card' => $id_card,
                                  ':banque' => $banque,
                                  ':level' => $level,
                                  ':country' => $country
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }


    // Fonction pour récupérer toutes les cartes en vente
    public function getSellerCards($seller, $current_user){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from cards join users
                                        ON cards.seller = users.id  
                                        WHERE sold = 0 AND confirmed = 1
                                        AND users.id = :seller;                                
                                    ");

        $query->execute(array(":seller" => $seller));

        $results = $query->fetchAll();

        $html = "";

        if($seller == $current_user){

        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>Seller</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 230px;'>Bank</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 44px;'>BIN</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Expir</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Zip</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Country</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 110px;'>Price ($)</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 53px;'>Buy</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 104px;'>tools</th>
                </tr>

            </thead>
            
        <tbody>";

        } else {
            $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>Seller</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 230px;'>Bank</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 44px;'>BIN</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Expir</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Zip</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Country</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 110px;'>Price ($)</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 53px;'>Buy</th>
                </tr>

            </thead>
            
        <tbody>";
        }
    

        if ($results) {
            foreach($results as $result){
                $bin = str_replace(" ", "", $result['numeros']);
                $bin = substr($bin, 0, 6);

                $good_reviews = $this->getSellerGoodReviews($result['seller']);
                $bad_reviews = $this->getSellerBadReviews($result['seller']);
                
                if($seller == $current_user){
                    $html .= "<tr role='row' class='odd'>
                                <td class=' dt-center' style=''>{$result['username']}<br><span class='badge badge-success'>{$good_reviews} </span> <span class='badge badge-danger'>{$bad_reviews}</span></td>
                                <td class=' dt-center' style=''>Bank</td>
                                <td class=' dt-center'>{$bin}</td>
                                <td class=' dt-center'>{$result['exp']}</td>
                                <td class=' dt-center'>{$result['zip']}</td>
                                <td class=' dt-center'><small>{$result['country']}<small></small></small></td>
                                <td class=' dt-center'>{$result['price']}</td>
                                <td class=' dt-center'><button id='buythis' type='button' class='btn btn-light btn--icon' data-id='8' onclick='buyboob('cards',8);'><i class='fas fa-shopping-cart'></i></button></td>
                                <td class=' dt-center' style=''><button id='edit' type='button' class='btn btn-light btn--icon' data-id='8' onclick='editboob('cards',8);'><i class='fas fa-edit'></i></button> 
                                <button id='del' type='button' class='btn btn-light btn--icon' data-id='8'><i class='fas fa-trash'></i></button></td>
                                </tr>";
                } else {
                    $html .= "<tr role='row' class='odd'>
                                <td class=' dt-center' style=''>{$result['username']}<br><span class='badge badge-success'>{$good_reviews} </span> <span class='badge badge-danger'>{$bad_reviews}</span></td>
                                <td class=' dt-center' style=''>Bank</td>
                                <td class=' dt-center'>{$bin}</td>
                                <td class=' dt-center'>{$result['exp']}</td>
                                <td class=' dt-center'>{$result['zip']}</td>
                                <td class=' dt-center'><small>{$result['country']}<small></small></small></td>
                                <td class=' dt-center'>{$result['price']}</td>
                                <td class=' dt-center'><button id='buythis' type='button' class='btn btn-light btn--icon' data-id='8' onclick='buyboob('cards',8);'><i class='fas fa-shopping-cart'></i></button></td>
                                </tr>";
                }
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        if($results){
            return $html;
        } else {
            return "Aucune carte n'est disponible pour le moment.";
        }
    }
    


    // Fonction pour récupérer mes cartes achetées
    public function getMyPurchasedCards($id_user){
        $this->utf8();

        $query = $this->pdo->prepare("SELECT cards.id as id_card,
                                        cards.banque,
                                        cards.numeros,
                                        cards.seller,
                                        cards.exp,
                                        cards.cvv,
                                        cards.checked,
                                        orders.id as id_order,
                                        orders.date,
                                        orders.type_product,
                                        orders.reviewed
                                        FROM cards 
                                        JOIN users
                                        JOIN orders
                                        ON orders.id_user = users.id 
                                        AND orders.id_product = cards.id
                                        WHERE orders.type_product = 1
                                        AND users.id = :id_user
                                        AND orders.hide = 0;                                
                                    ");

        $query->execute(array(":id_user" => $id_user));

        $results = $query->fetchAll();

        $html = "";

        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 215px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 30px;'>Banque</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 24px;'>Vendeur</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 45px;'>Feed</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 120px;'>Actions</th>
                </tr>

            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){
                $bin = str_replace(" ", "", $result['numeros']);
                $bin = substr($bin, 0, 6);

                $expm = explode("/", $result['exp'])[0];
                $expy = explode("/", $result['exp'])[1];

                $seller = $this->getSellerName($result['seller']);

                $good_reviews = $this->getSellerGoodReviews($result['seller']);
                $bad_reviews = $this->getSellerBadReviews($result['seller']);

                $current_hour = date('H:i:s');
                $purchase_hour = explode(" ", $result['date'])[1];

                $delai = $this->diff_time($current_hour , $purchase_hour);

                $is_in_delay = explode(":", $delai)[1] <= 10 && explode(":", $delai)[0] == "00" ;

                if(!$is_in_delay || $result["checked"] == "1"){
                    $display_check = "display:none;";
                    $display_refund = "display:none";
                } 

                if($is_in_delay){
                    if ($result['checked'] == "0"){
                        $display_check = "";
                        $display_refund = "display:none";
                        $time_left = 10 - explode(":", $delai)[1];
                    } 
                    
                    if ($result['checked'] == "2"){
                        $time_left = 10 - explode(":", $delai)[1];
                        $display_check = "display:none;";
                        $display_refund = "";
                    }
                } else {
                    $display_check = "display:none";
                    $display_refund = "display:none";
                }


                if($result['reviewed'] == 0) {             
                    $html .= "<tr role='row' class='odd'>
                                    <td style='width: 30px; class=' dt-center'>{$result['date']}</td>
                                    <td class=' dt-center' style='width: 30px;'>{$result['banque']}</td>
                                    <td style='width: 24px' class=' dt-center'>{$seller}</td>
                                    <td style='width: 35px' class=' dt-center'>
                                        <a href='../action/add/good_review.php?seller={$result['seller']}&type_product={$result['type_product']}&id_product={$result['id_card']}&id_order={$result['id_order']}' style='margin-right: 10px; font-weight: bold; background:#28a745!important;' class='btn btn-success'>+</a>
                                        <a href='../action/add/bad_review.php?seller={$result['seller']}&type_product={$result['type_product']}&id_product={$result['id_card']}&id_order={$result['id_order']}' style='font-weight: bold;' class='btn btn-danger'>-</a>
                                    </td>
                                    <td style='width: 24px' class=' dt-center'>
                                        <a style='color: #333;{$display_refund}' class='btn btn-warning'>Demande de refund ({$time_left} min restantes)</a>
                                        <a href='http://localhost/as_bretzel/action/update/check_lux_card.php?numeros={$result['numeros']}&expm={$expm}&expy={$expy}&cvv={$result['cvv']}&card={$result['id_card']}' style='color: #333;{$display_check}' class='btn btn-warning'>Check ({$time_left} min restantes)</a>
                                        <a href='?id={$result['id_card']}#modale_view_purchased_card' style='color: #fff;' class='btn btn-info'>Voir</a>
                                        <a href='../action/delete/delete_purchased_card.php?order={$result['id_order']}' style='color: #fff;' class='btn btn-danger'>Supprimer</a>
                                    </td>
                                </tr>";
                } else {
                    $html .= "<tr role='row' class='odd'>
                                    <td style='width: 30px; class=' dt-center'>{$result['date']}</td>
                                    <td class=' dt-center' style='width: 30px;'>Bank</td>
                                    <td style='width: 24px' class=' dt-center'>{$seller}</td>
                                    <td style='width: 35px' class=' dt-center'><span class='badge badge-primary'>Déjà feed</span></td>
                                    <td style='width: 120px' class=' dt-center'>
                                        <a style='color: #333;{$display_refund}' class='btn btn-warning'>Demande de refund ({$time_left} min restantes)</a>
                                        <a href='http://localhost/as_bretzel/action/update/check_lux_card.php?numeros={$result['numeros']}&expm={$expm}&expy={$expy}&cvv={$result['cvv']}&card={$result['id_card']}' style='color: #333;{$display_check}' class='btn btn-warning'>Check ({$time_left} min restantes)</a>
                                        <a href='?id={$result['id_card']}#modale_view_purchased_card' style='color: #fff;' class='btn btn-info'>Voir</a>
                                        <a href='../action/delete/delete_purchased_card.php?order={$result['id_order']}' style='color: #fff;' class='btn btn-danger'>Supprimer</a>
                                    </td>
                                </tr>";   
                }
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }




    // Fonction pour récupérer tous les deposits
    public function getAllDeposits(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from deposits                                 
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 44px;'>User</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Amount (BTC)</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Amount ($)</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>Wallet</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>Status</th>
                </tr>
            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){                
                $html .= "<tr role='row' class='odd'>
                            <td class=' dt-center'><small><small></small></small></td>
                            <td class=' dt-center'>4111</td>
                            <td class=' dt-center'></td>
                            <td class=' dt-center'></td>
                            <td class=' dt-center' style=''><br><span class='badge badge-success'>2 </span> <span class='badge badge-danger'>2</span></td>
                            <td class=' dt-center' style=''><br><span class='badge badge-success'>2 </span> <span class='badge badge-danger'>2</span></td>
                            </tr>";
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        if($results){
            return $html;
        } else {
            return "<br>No deposits.";
        }
    }    

    // Fonction pour récupérer tous les withdraws
    public function getAllWithdrawals(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from withdrawals                                 
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 44px;'>User</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Amount (BTC)</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Amount ($)</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>Wallet</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 82px;'>Status</th>
                </tr>
            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){                
                $html .= "<tr role='row' class='odd'>
                            <td class=' dt-center'><small><small></small></small></td>
                            <td class=' dt-center'>4111</td>
                            <td class=' dt-center'></td>
                            <td class=' dt-center'></td>
                            <td class=' dt-center' style=''><br><span class='badge badge-success'>2 </span> <span class='badge badge-danger'>2</span></td>
                            <td class=' dt-center' style=''><br><span class='badge badge-success'>2 </span> <span class='badge badge-danger'>2</span></td>
                            </tr>";
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }    


    // Fonction pour récupérer toutes les ventes
    public function getAllSales(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT orders.date,
                                      users.username,
                                      cards.price
                                      FROM cards
                                      JOIN orders
                                      JOIN users
                                      ON orders.id_user = users.id   
                                      AND orders.id_product = cards.id                           
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 44px;'>User</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Item type</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Item price</th>
                </tr>
            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){                
                $html .= "<tr role='row' class='odd'>
                            <td style='width: 174px;' class=' dt-center'>{$result['date']}</td>
                            <td style='width: 44px;' class=' dt-center'>{$result['username']}</td>
                            <td style='width: 47px;' class=' dt-center'>Card</td>
                            <td style='width: 29px;' class=' dt-center'>{$result['price']}</td>
                            </tr>";
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    } 
    
    // Fonction pour récupérer tous mes tickets
    public function getMyTicketList($user){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from tickets WHERE author_id = :user 
                                      ORDER BY status DESC, date DESC                                
                                    ");

        $query->execute(array(":user" => $user));

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 250px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Subject</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Status</th>
                </tr>
            </thead>
            
        <tbody>";


        if ($results) {
            foreach($results as $result){ 
                if($result["status"] == "Pending"){
                    $badge = "badge badge-warning";
                } else {
                    $badge = "badge badge-success";
                }
                               
                $html .= "<tr role='row' class='odd'>
                            <td style='width: 250px;' class=' dt-center'>{$result['date']}</td>
                            <td class=' dt-center'><a class='btn btn-light' href=' http://localhost/as_bretzel/main/tickets.php?id={$result['id']}'>{$result['object']}</a></td>
                            <td style='width: 29px;' class=' dt-center'><span class='{$badge}'>{$result['status']}</span></td>
                            </tr>";
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }  

    // Fonction pour récupérer tous les tickets pour la partie admin
    public function getAllTicketsList(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT tickets.date,
                                      tickets.author_id,
                                      tickets.id,
                                      tickets.status,
                                      tickets.object,
                                      users.username
                                      FROM tickets 
                                      JOIN users
                                      ON tickets.author_id = users.id
                                      WHERE status != 'Fixed' 
                                      ORDER BY tickets.date DESC                             
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 174px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Author</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Subject</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 29px;'>Status</th>
                </tr>
            </thead>
            
        <tbody>";


        if ($results) {
            foreach($results as $result){ 
                if($result["status"] == "Pending"){
                    $badge = "badge badge-warning";
                } else {
                    $badge = "badge badge-success";
                }
                               
                $html .= "<tr role='row' class='odd'>
                            <td class=' dt-center'>{$result['date']}</td>
                            <td class=' dt-center'><span class='badge badge-info'>{$result['username']}</span></td>
                            <td class=' dt-center'><a class='btn btn-light' href=' http://localhost/as_bretzel/main/tickets.php?id={$result['id']}'>{$result['object']}</a></td>
                            <td class=' dt-center'><span class='{$badge}'>{$result['status']}</span></td>
                          </tr>";
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }  


    // Fonction pour récupérer les good reviews du vendeur
    public function getSellerGoodReviews($seller){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM reviews WHERE id_seller=:seller AND value = '1'");
        $query->execute(array(':seller' => $seller));
        $result = $query->fetch();
        if ($result) {
            return $result["count(*)"];
        } else {
            return 0;
        }                 
    }

    // Fonction pour récupérer les bad reviews du vendeur
    public function getSellerBadReviews($seller){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT count(*) FROM reviews WHERE id_seller=:seller AND value = '0'");
        $query->execute(array(':seller' => $seller));
        $result = $query->fetch();
        if ($result) {
            return $result["count(*)"];
        } else {
            return 0;
        }         
    }

    // Fonction pour récupérer infos d'une carte
    public function getCardInfos($id_card){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * FROM cards WHERE id=:id_card");
        $query->execute(array(':id_card' => $id_card));
        $result = $query->fetch();
        if ($result) {
            return $result;
        } else {
            return 0;
        }         
    }

    // Fonction pour récupérer les news
    public function getNews(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * FROM news order by date desc");
        $query->execute();
        $results = $query->fetchAll();

        $html = "";

        $compteur = 1;

        if ($results) {
            $html .= "<div class='bloc-all-news'>";
            foreach($results as $result){
                if($compteur == 1){
                    $html .= "<div class='bloc-news-un'>";
                    $html .= "<div class='news-div first-new'>";
                        $html .= "<div class='header-new'>";
                            $html .= "<h5>{$result['titre']}<div class='rond-bleu'></div></h5>";
                            $html .= "<h6>{$result['date']}</h6>";
                        $html .= "</div>";
                        $html .= "<p>{$result['contenu']}</p>";
                    $html .= "</div>"; 
                } else {
                    $html .= "<div class='news-div'>";
                        $html .= "<div class='header-new'>";
                            $html .= "<h5>{$result['titre']}<div class='rond-bleu'></div></h5>";
                            $html .= "<h6>{$result['date']}</h6>";
                        $html .= "</div>";
                                 
                        $html .= "<p>{$result['contenu']}</p>";
                    $html .= "</div>"; 
                    if($compteur == 2){
                        $html .= "</div>";
                        $html .= "<div class='bloc-news-deux'>";
                    }
                }
                $compteur ++;
            }

            $html .= "</div>";
            //$html .= "</div>";
            return $html;
        } else {
            return $html;
        }         
    }


    // Fonction pour récupérer les infos d'un user
    public function getUserInfos($id_user){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id=:id_user");
        $query->execute(array(':id_user' => $id_user));
        $result = $query->fetch();
        if ($result) {
            return $result;
        } else {
            return 0;
        }         
    }
    

    // Fonction pour l'update de la balance apres un achat ou un dépot
    public function updateBalance($username, $balance){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE users 
                                          SET balance = :balance
                                          WHERE username=:username
                                        ");
            $query->execute(array(':balance' => $balance, 
                                  ':username' => $username
                                 )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }
    

    // Fonction pour l'update de la balance apres un achat ou un dépot
    public function updateUser($type, $balance, $username){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE users 
                                          SET balance = :balance,
                                          type = :type                                        
                                          WHERE username=:username
                                        ");
            $query->execute(array(':balance' => $balance, 
                                  ':type' => $type,
                                  ':username' => $username
                                 )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }
    
    
    // Fonction pour la création d'un ticket
    public function buy($id_user, $id_product, $type_product){
        try {
            $this->utf8();

            $this->sellCard($id_product);

            $query = $this->pdo->prepare("INSERT INTO orders (id_user, id_product, type_product) 
                                            VALUES (:id_user, :id_product, :type_product)
                                        ");
            $query->execute(array(':id_user' => $id_user, 
                                    ':id_product' => $id_product, 
                                    ':type_product' => $type_product, 
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }    
    }

    // Fonction pour update la colonne sold à 1 et indiquer à la base
    // que la carte est vendue
    public function sellCard($id_card){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE cards
                                          SET sold = 1
                                          WHERE id=:id_card
                                        ");
            $query->execute(array(':id_card' => $id_card
                                 )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }

    // Fonction pour récupérer côté admin les news, pour pouvoir éditer supprimer
    // Fonction pour récupérer toutes les cartes en vente
    public function getAdminNews(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from news;                               
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 100px;'>Date</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Titre</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 20px;'>Actions</th>
                </tr>

            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){
                $html .= "<tr role='row' class='odd'>
                            <td style='width: 360px' class=' dt-center'>{$result['date']}</td>
                            <td class=' dt-center'>{$result['titre']}</td>
                            <td class=' dt-center' style='display: flex; justify-content: center'>
                            <a href='../action/delete/delete_news.php?news={$result['id']}' style='display: flex; justify-content: center; align-items: center; background: darkred; color: #ccc' id='del' type='button' class='btn btn-light btn--icon' data-id='8'><i class='fas fa-trash'></i></a></td>
                            </tr>";
            
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        if($results){
            return $html;
        } else {
            return "There are no news available.";
        }
    }


    // Fonction pour récupérer la liste des wallets de deposit coté admin
    public function getAdminWallets(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from wallets;                               
                                    ");

        $query->execute();

        $results = $query->fetchAll();

        $html = "";


        $html .= "<table class='table dataTable no-footer dtr-inline collapsed' id='BoobsTable' role='grid' aria-describedby='BoobsTable_info' style='width: 100%;'>
            <thead>
                <tr role='row'>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 100px;'>Wallet</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Affecté</th>
                    <th class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 47px;'>Status</th>
                    <th data-priority='1' class='sorting_disabled dt-center' rowspan='1' colspan='1' style='width: 20px;'>Actions</th>
                </tr>

            </thead>
            
        <tbody>";
    

        if ($results) {
            foreach($results as $result){
                if($result["owner_id"] == 0){
                    $affected = "Non affecté";
                }else {
                    $affected = "Affecté";
                }

                if($result["used"] == 0){
                    $status = "Non payé";
                }else {
                    $status = "Payé";
                }

                $html .= "<tr role='row' class='odd'>
                            <td style='width: 360px' class=' dt-center'>{$result['wallet']}</td>
                            <td class=' dt-center'>{$affected}</td>
                            <td class=' dt-center'>{$status}</td>
                            <td class=' dt-center' style='display: flex; justify-content: center'>
                                <a href='../action/delete/delete_wallet.php?wallet={$result['id']}' style='display: flex; justify-content: center; align-items: center; background: darkred; color: #ccc' id='del' type='button' class='btn btn-light btn--icon' data-id='8'><i class='fas fa-trash'></i></a>
                            </td>
                            </tr>";
            
            }
        } 

        $html .= "</tbody>";
        $html .= "</table>";

        if($results){
            return $html;
        } else {
            return "There are no wallets available.";
        }
    }

    // Fonction pour récupérer la liste des wallets de deposit coté admin
    public function getAvailableWallet(){
        $this->utf8();
        $query = $this->pdo->prepare("SELECT * from wallets where owner_id = 0 LIMIT 1;                               
                                    ");

        $query->execute();

        $result = $query->fetch();

        return $result;
    }

    
    // Fonction pour confirmer une carte pour la partie admin
    public function setDepositWallet($hash, $id_wallet, $owner_id){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE wallets
                                          SET wallet = :hash,
                                          owner_id = :owner_id
                                          WHERE id=:id_wallet
                                        ");
            $query->execute(array(':hash' => $hash,
                                  ':owner_id' => $owner_id,
                                  ':id_wallet' => $id_wallet
                                 )
                                );

            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }


    // Fonction pour confirmer une carte pour la partie admin
    public function confirmCard($id_card){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE cards
                                          SET confirmed = 1
                                          WHERE id=:id_card
                                        ");
            $query->execute(array(':id_card' => $id_card
                                 )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }

    // Fonction pour indiquer qu'une carte a validé le check luxchecker
    public function checkCard($id_card){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE cards
                                            SET checked = 1
                                            WHERE id=:id_card
                                        ");
            $query->execute(array(':id_card' => $id_card
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }
    
    // Fonction pour indiquer qu'une carte n'a pas validé le check luxchecker
    public function uncheckCard($id_card){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE cards
                                            SET checked = 2
                                            WHERE id=:id_card
                                        ");
            $query->execute(array(':id_card' => $id_card
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }


    // Fonction pour mettre à jour le password 
    public function updatePassword($user, $new_pwd){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE users
                                            SET password = :password 
                                            WHERE id=:user
                                        ");
            $query->execute(array(':password' => $new_pwd,
                                  ':user' => $user
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }
    
    
    // Fonction pour mettre à jour le wallet de withdraw
    public function updateWithdrawWallet($user, $wallet){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE users
                                            SET wallet = :wallet 
                                            WHERE id=:user
                                        ");
            $query->execute(array(':wallet' => $wallet,
                                  ':user' => $user
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }



    // Fonction pour update le status reviewed d'un achat 
    // pour ne pas qu'il soit possible de donner plusieurs review
    // pour le meme achat
    public function reviewOrder($id_order){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE orders
                                            SET reviewed = 1
                                            WHERE id=:id_order
                                        ");
            $query->execute(array(':id_order' => $id_order
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }
    

    // Fonction pour supprimer une carte de sa liste de cartes achetées
    public function deletePurchasedCard($id_order){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE orders
                                            SET hide = 1
                                            WHERE id=:id_order
                                        ");
            $query->execute(array(':id_order' => $id_order
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }

   
    // Fonction pour supprimer un user
    public function deleteUser($id_user){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("DELETE FROM users
                                            WHERE id=:id_user
                                        ");
            $query->execute(array(':id_user' => $id_user
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }

    // Fonction pour supprimer une new
    public function deleteNews($id_new){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("DELETE FROM news
                                            WHERE id=:id_new
                                        ");
            $query->execute(array(':id_new' => $id_new
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }

    // Fonction pour supprimer un wallet
    public function deleteWallet($id_wallet){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("DELETE FROM wallets
                                            WHERE id=:id_wallet
                                        ");
            $query->execute(array(':id_wallet' => $id_wallet
                                    )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }


    // Fonction pour confirmer une carte pour la partie admin
    public function closeTicket($id_ticket){
        try {
            $this->utf8();
            $query = $this->pdo->prepare("UPDATE tickets
                                          SET status = 'Fixed'
                                          WHERE id=:id_ticket
                                        ");
            $query->execute(array(':id_ticket' => $id_ticket
                                 )
                                );
            return 1;
            } catch (PDOException $e) {
                return $e;
        }       
    }

    // Fonction pour donner un good review
    public function goodReview($id_seller, $value, $id_type, $id_product, $id_author){
        try {
        $this->utf8();
        $query = $this->pdo->prepare("INSERT INTO reviews (id_seller, value, product_type, product_id, author_id) 
                                        VALUES (:id_seller, :value, :id_type, :id_product, :id_author)
                                    ");
        $query->execute(array(':id_seller' => $id_seller, 
                                ':value' => $value, 
                                ':id_type' => $id_type, 
                                ':id_product' => $id_product,
                                ':id_author' => $id_author
                                )
                            );
        return 1;
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    // Fonction pour donner un bad review
    public function badReview($id_seller, $value, $id_type, $id_product, $id_author){
        try {
        $this->utf8();
        $query = $this->pdo->prepare("INSERT INTO reviews (id_seller, value, product_type, product_id, author_id) 
                                        VALUES (:id_seller, :value, :id_type, :id_product, :id_author)
                                    ");
        $query->execute(array(':id_seller' => $id_seller, 
                                ':value' => $value, 
                                ':id_type' => $id_type, 
                                ':id_product' => $id_product,
                                ':id_author' => $id_author
                                )
                            );
        return 1;
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    public function diff_time($t1 , $t2){
        //Heures au format (hh:mm:ss) la plus grande puis le plus petite         
        $tab=explode(":", $t1); 
        $tab2=explode(":", $t2); 
        
        $h=$tab[0]; 
        $m=$tab[1]; 
        $s=$tab[2]; 
        $h2=$tab2[0]; 
        $m2=$tab2[1]; 
        $s2=$tab2[2];  
        
        if ($h2>$h) { 
        $h=$h+24; 
        }  
        if ($m2>$m) { 
        $m=$m+60; 
        $h2++; 
        } 
        if ($s2>$s) { 
        $s=$s+60; 
        $m2++; 
        } 
        
        $ht=$h-$h2; 
        $mt=$m-$m2; 
        $st=$s-$s2; 
        if (strlen($ht)==1) { 
        $ht="0".$ht; 
        }  
        if (strlen($mt)==1) { 
        $mt="0".$mt; 
        }  
        if (strlen($st)==1) { 
        $st="0".$st; 
        }  
        return $ht.":".$mt.":".$st;        
    }

}
?>
