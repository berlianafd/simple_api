<?php

class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {

    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $nohp, $imei, $level) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($imei);
        $encrypted_imei = $hash["encrypted"]; // encrypted imei
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("INSERT INTO user(unique_id, level, name, nohp, encrypted_imei, salt, created_at) VALUES(?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssssss", $uuid, $level, $name, $nohp, $encrypted_imei, $salt);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE nohp = ?");
            $stmt->bind_param("s", $nohp);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    public function storeTransactionBuang($idUser, $noMesin, $jenisSampah, $beratSampah) {

        $stmt = $this->conn->prepare("INSERT INTO transaksisampah(idUser, noMesin, jenisSampah, beratSampah,created_at) VALUES(?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $idUser, $noMesin, $jenisSampah, $beratSampah);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM transaksisampah WHERE idUser = ?");
            $stmt->bind_param("s", $idUser);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    public function storeTotalPoinUser($idUser, $totalBeratSampah, $totalBeratKertas, $totalBeratPlastik, $totalPoin) {

        $stmt = $this->conn->prepare("UPDATE totalpoinuser SET totalBeratSampah=$totalBeratSampah, totalBeratKertas=$totalBeratKertas, totalBeratPlastik=$totalBeratPlastik, totalPoin=$totalPoin WHERE idUser=$idUser");
        // $stmt->bind_param("sssss", $totalBeratSampah, $totalBeratKertas, $totalBeratPlastik, $totalPoin, $id);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM totalpoinuser WHERE idUser = ?");
            $stmt->bind_param("s", $idUser);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    public function getTotalPoinUser($idUser) {
        $stmt = $this->conn->prepare("SELECT * FROM totalpoinuser WHERE idUser = ?");
            $stmt->bind_param("s", $idUser);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
    }





    /**
     * Get user by nohp and imei
     */
    public function getUserBynohpAndimei($nohp, $imei) {

        $stmt = $this->conn->prepare("SELECT * FROM user WHERE nohp = ?");

        $stmt->bind_param("s", $nohp);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user imei
            $salt = $user['salt'];
            $encrypted_imei = $user['encrypted_imei'];
            $hash = $this->checkhashSSHA($salt, $imei);
            // check for imei equality
            if ($encrypted_imei == $hash) {
                // user authentication details are correct
                return $user;
            } else{
                //jika nohp sama dan imei berbeda, maka mengeluarkan pertanyaan. jika ya imei akan diupdate. jika no tidak bisa masuk.
             $response["error"] = TRUE;
               $response["error_msg"] = "Perangkat berbeda. Yakin ingin meneruskan?"; //belum selesai
               echo json_encode($response);
           }
       } else {
        return NULL;
    }
}


    /**
     * Check user is existed or not
     */
    public function isUserExisted($nohp) {
        $stmt = $this->conn->prepare("SELECT nohp from user WHERE nohp = ?");

        $stmt->bind_param("s", $nohp);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }


    /**
     * Encrypting imei
     * @param imei
     * returns salt and encrypted imei
     */
    public function hashSSHA($imei) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($imei . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting imei
     * @param salt, imei
     * returns hash string
     */
    public function checkhashSSHA($salt, $imei) {

        $hash = base64_encode(sha1($imei . $salt, true) . $salt);

        return $hash;
    }

    /**
     * Get point user by idUser
     */
    public function getUserPoint($idUser) {

        $stmt = $this->conn->prepare("SELECT * FROM totalpoinuser WHERE idUser = ?");

        $stmt->bind_param("s", $idUser);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // user points details
            return $user;
        } else {
            return NULL;
        }
    }

    /**
     * Get transaction user membuang sampah by idUser
     */
    public function getUserTransactionBuangSampah($idUser) {

        $stmt = $this->conn->prepare("SELECT * FROM transaksisampah WHERE idUser = ?");

        $stmt->bind_param("s", $idUser);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // user points details
            return $user;
        } else {
            return NULL;
        }
    }


    /**
     * Get transaction user menukar poin by idUser
     */
    public function getUserTransactionTukarPoin($idUser) {

        $stmt = $this->conn->prepare("SELECT * FROM transaksitukarpoin WHERE idUser = ?");

        $stmt->bind_param("s", $idUser);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // user points details
            return $user;
        } else {
            return NULL;
        }
    }

     /**
     * Get id user by nohp
     */
     public function getUserId($nohp) {

        $stmt = $this->conn->prepare("SELECT * FROM user WHERE nohp = ?");

        $stmt->bind_param("s", $nohp);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // user points details
            return $user;
        } else {
            return NULL;
        }
    }
}

?>
