<?php

namespace finalprojekt;

class DB
{
    private $host;
    private $dbNazov;
    private $username;
    private $password;
    private $port;

    private $connection;

    public function __construct($host, $dbNazov, $username, $password, $port = '')
    {
        $this->host = $host;
        $this->dbNazov = $dbNazov;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;

        try {
            $this->connection = new \PDO("mysql:host=$host;dbname=$dbNazov;port=$port", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getMenuItems() {
        $menuItems = [];
        $sql = "SELECT * FROM menu";

        try {
            $query = $this->connection->query($sql);
            while ($row = $query->fetch()) {
                $menuItems[] = [
                    'nazov' => $row['zobrazene_nazov'],
                    'url' => $row['cesta']
                ];
            }
            return $menuItems;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getDovolenky() {
        $dovolenky = [];
        $sql = "SELECT d.id, d.dovolenka_nazov, d.datum, d.dovolenka_popis, d.obrazok, dad.nazov, da.atribut_hodnota FROM dovolenka as d INNER JOIN dovolenka_atributy AS da ON d.id = da.dovolenka_id 
        INNER JOIN dovolenka_atributy_definicia AS dad ON da.dovolenka_atribut_definicia_id = dad.id";

        try {
            $query = $this->connection->query($sql);
            while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
                if (isset($dovolenky[$row['dovolenka_nazov']])) {
                    $dovolenky[$row['dovolenka_nazov']]['atributy'][] = [
                        'atribut_nazov' => $row['nazov'],
                        'atribut_hodnota' => $row['atribut_hodnota']
                    ];
                } else {
                    $dovolenky[$row['dovolenka_nazov']] = [
                        'atributy' => [
                            0 => [
                                'atribut_nazov' => $row['nazov'],
                                'atribut_hodnota' => $row['atribut_hodnota'],
                            ]
                        ],
                        'obrazok' => $row['obrazok'],
                        'datum' => $row['datum'],
                        'popis' => $row['dovolenka_popis'],
                        'id' => $row['id'],
                    ];
                }
            }
            return $dovolenky;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function insertDovolenka($dovolenka_nazov, $datum, $dovolenka_popis, $obrazok,  $atribut1, $atribut2, $atributHodnota1, $atributHodnota2) {
        $sqlDovolenka = "INSERT INTO dovolenka(dovolenka_nazov, datum, dovolenka_popis, obrazok, vytvorene, upravene) 
                         VALUE ('".$dovolenka_nazov."', '".$datum."', '".$dovolenka_popis."', '".$obrazok."', NOW(), NOW())";

        try {
            $this->connection->query($sqlDovolenka);
            $dovolenkaId = $this->connection->lastInsertId();

            if($atribut1 === '1') {
                $sqlAtribut1 = "INSERT INTO dovolenka_atributy(atribut_hodnota, dovolenka_atribut_definicia_id, dovolenka_id, vytvorene, upravene)
                            VALUE ('".$atributHodnota1."', '".$atribut1."', '".$dovolenkaId."', NOW(), NOW())";
                $this->connection->query($sqlAtribut1);
            } else {
                $sqlAtribut2 = "INSERT INTO dovolenka_atributy(atribut_hodnota, dovolenka_atribut_definicia_id, dovolenka_id, vytvorene, upravene)
                            VALUE ('".$atributHodnota2."', '".$atribut2."', '".$dovolenkaId."', NOW(), NOW())";
                $this->connection->query($sqlAtribut2);
            }

            if($atribut2 === '1') {
                $sqlAtribut1 = "INSERT INTO dovolenka_atributy(atribut_hodnota, dovolenka_atribut_definicia_id, dovolenka_id, vytvorene, upravene)
                            VALUE ('".$atributHodnota1."', '".$atribut1."', '".$dovolenkaId."', NOW(), NOW())";
                $this->connection->query($sqlAtribut1);
            } else {
                $sqlAtribut2 = "INSERT INTO dovolenka_atributy(atribut_hodnota, dovolenka_atribut_definicia_id, dovolenka_id, vytvorene, upravene)
                            VALUE ('".$atributHodnota2."', '".$atribut2."', '".$dovolenkaId."', NOW(), NOW())";
                $this->connection->query($sqlAtribut2);
            }
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getDovolenka($id) {
        $sql = "SELECT * FROM dovolenka WHERE id = ".$id;
        $dovolenkyData = [];

        try {
            $query = $this->connection->query($sql);
            $dovolenkyData = $query->fetchAll(\PDO::FETCH_ASSOC);

            return $dovolenkyData;
        } catch (\PDOException $e) {
            return $dovolenkyData;
        }
    }

    public function deleteDovolenka($id) {
        $sqlAtributy = "DELETE FROM dovolenka_atributy WHERE dovolenka_id =".$id;
        $sqlDovolenka = "DELETE FROM dovolenka WHERE id =".$id;

        try {
            $this->connection->query($sqlAtributy);
            $this->connection->query($sqlDovolenka);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAttribute($id) {
        $sql = "SELECT * FROM dovolenka_atributy WHERE dovolenka_id = ".$id;
        $atributyData = [];

        try {
            $query = $this->connection->query($sql);
            $atributyData = $query->fetchAll(\PDO::FETCH_ASSOC);

            return $atributyData;
        } catch (\PDOException $e) {
            return $atributyData;
        }
    }

    public function updateDovolenka($id, $dovolenka_nazov, $datum, $dovolenka_popis, $obrazok, $atributHodnota1, $atributHodnota2) {
        $sql = "UPDATE dovolenka SET dovolenka_nazov = '".$dovolenka_nazov."', datum = '".$datum."', dovolenka_popis = '".$dovolenka_popis."', obrazok = '".$obrazok."', upravene = NOW() WHERE id =".$id;

        try {
            $this->connection->query($sql);

            $sqlAtribut1 = "UPDATE dovolenka_atributy SET atribut_hodnota = '".$atributHodnota1."', upravene = NOW() WHERE dovolenka_id =".$id." AND dovolenka_atribut_definicia_id = 1";

            $this->connection->query($sqlAtribut1);

            $sqlAtribut2 = "UPDATE dovolenka_atributy SET atribut_hodnota = '".$atributHodnota2."', upravene = NOW() WHERE dovolenka_id =".$id." AND dovolenka_atribut_definicia_id = 2";

            $this->connection->query($sqlAtribut2);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function login($meno, $heslo) {
        $hash = sha1($heslo);
        $sql = "SELECT COUNT(id) AS is_admin FROM user WHERE username = '".$meno."' AND password = '".$hash."'";

        try {
            $query = $this->connection->query($sql);
            $pouzivatelExistuje = $query->fetch(\PDO::FETCH_ASSOC);
            if(intval($pouzivatelExistuje['is_admin']) === 1) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getZamestnanci() {
        $zamestnanciData = [];
        $sql = "SELECT * FROM zamestnanci";

        try {
            $query = $this->connection->query($sql);
            while ($row = $query->fetch()) {
                $zamestnanciData[] = [
                    'meno' => $row['nazov'],
                    'popis' => $row['popis'],
                    'obrazok' => $row['fotka'],
                    'id' => $row['id'],
                ];
            }
            return $zamestnanciData;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getZamestnanec($id) {
        $sql = "SELECT * FROM zamestnanci WHERE id = ".$id;
        $zamestnanciData = [];

        try {
            $query = $this->connection->query($sql);
            $zamestnanciData = $query->fetchAll(\PDO::FETCH_ASSOC);

            return $zamestnanciData;
        } catch (\PDOException $e) {
            return $zamestnanciData;
        }
    }

    public function updateZamestnanec($id, $meno, $popis, $obrazok) {
        $sql = "UPDATE zamestnanci SET nazov = '".$meno."', popis = '".$popis."', fotka = '".$obrazok."' WHERE id =".$id;

        try {
            $this->connection->query($sql);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function insertZamestnanec($meno, $popis, $obrazok) {
        $sql = "INSERT INTO zamestnanci(nazov, popis, fotka) 
                         VALUE ('".$meno."', '".$popis."', '".$obrazok."')";

        try {
            $this->connection->query($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteZamestnanec($id) {
        $sql = "DELETE FROM zamestnanci WHERE id = ".$id;

        try {
            $this->connection->query($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}