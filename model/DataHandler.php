<?php


class DataHandler
{

    /**
     * The connection for this data handler.
     */
    public $conn;


    /**
     * Constructs a new datahandler by initializing the connection.
     */
    function __construct($dbtype,$servername,$dbname,$username, $password) {
        $this->conn = new PDO("$dbtype:host=$servername;dbname=$dbname", $username, $password);
    }

    /**
     * The method CreateData() insert data in your database.
     * @return the result of the query, the last insert id.
     */
    function CreateData($sql){
        try {
            $this->conn->exec($sql);
            return $this->conn->lastInsertId();
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    /**
     * The method ReadAllData() fetch all requested data from database.
     * @return the result of the query.
     */
    function readAllData($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function readData($sql){
        $this->query($sql);
        return $this->sth->fetch(PDO::FETCH_ASSOC);
    }


    public function updateData($sql){
        $this->query($sql);
        return $this->rowCount();
    }


    public function deleteData($sql){
        $this->query($sql);
        return $this->rowCount();
    }

}