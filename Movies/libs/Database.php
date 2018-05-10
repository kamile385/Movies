<?php

/*
  class Database extends PDO {

  public function __construct() {
  parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  }

  }
 */
/*
  class Database{
  private $host;
  private $user;
  private $password;
  private $database;

  function __construct($filename) {
  if(is_file($filename)) include $filename;
  else throw new Exception ("Error!");

  $this->host = $host;
  $this->user = $user;
  $this->pasword = $password;
  $this->database = $database;

  $this->connect();
  }

  private function connect() {
  // Connect to server
  if(!mysqli_connect($this->host, $this->user, $this->password)){
  throw new Exception("Error: not connected to the server");
  }
  // Connect to database
  if(!mysqli_select_db($this->database)){
  throw new Exception("Error: no database selected");
  }
  }

  function close(){
  mysqli_close();
  }
  }
 */







/*
  class Database extends PDO {

  private static $instance = null;

  public function __construct() {
  //parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", DB_HOST, DB_NAME);
  $options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
  ];
  try {
  parent::__construct($dsn, DB_USER, DB_PASS, $options);
  } catch (PDOException $e) {
  die("Could not connect to the database!\n");
  }

  $query=$dsn->query('Select * FROM users');
  $r = $query->fetch();
  echo '<pre>', print_r($r), '</pre>';
  }

  public static function getInstance() {
  if (self::$instance === null)
  self::$instance = new mysql();

  return self::$instance;
  }

  } */








/*
  class Database {

  function __construct() {
  $this->connect();
  }

  private function connect(){
  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  }
  }
 */
/*
  class Database {

  function __construct() {
  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  }
  } */

class Database extends PDO {

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);

        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
    }

    /**
     * select
     * @param string $sql An SQL string
     * @param array $array Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }

        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data) {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where) {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}
