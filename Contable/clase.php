<?php
//esta clase realiza la coneccion con la base de datos correspondiente
class coneccion{
    public $usuario;
    public $servidor;
    public $clave;
    public $base;
    public $dbconectar=0; 
    public $consulta=0;
   
    //constructor inicializa las variables del objeto que se cree
    function coneccion($base = "", $servidor = "", $usuario = "", $clave = ""){
        $this->ba=$base;
        $this->ser=$servidor;
        $this->usu=$usuario;
        $this->cla=$clave;
       
       
    }
    //metodo que se conecta con la bese de datos
    //se conecta con la base de datos Persona, en el servidor LOCALHOST con el nomber de usuario ROOT 
    function conectarBase(){
       //asigna a las variables del objeto actual las siguientes variables
       $this->ba=$base="contable";
       $this->ser=$servidor="localhost";
       $this->usu=$usuario="root";
       $this->cla=$clave;
       $this->dbconectar= mysql_connect($this->ser, $this->usu, $this->cla);
       //realiza la coneccion
       if (!$this->dbconectar){
          $this->Error="Ha fallado la conección";
       }
       //selecciona la base de datos
       if (!@mysql_select_db($this->ba, $this->dbconectar)){
          $this->Error = "Imposible abrir ".$this->ba ;
          return 0;

       }
        return $this->dbconectar;

        
    }
    function error(){
      if($this->connecctError){
         return true;
      }
      $error=mysql_error($this->dbconectar);
      trigger_error('Could not connect to server');
      $this->connectError = true;
    }
    //ejecuta la consulta pasandole como parametro una variable vacia 
    //cuando llama al metodo se la pasa una variable que contiene la base de datos
   

    //metodo que retorna la cantidas de campos 
    function numcampos() {
      return mysql_num_fields($this->consulta);
	}
	//metodo que retorna los nombres de los campos
	function nombrecampo($numcampo) {
      
      return mysql_field_name($this->consulta, $numcampo);
    }
             
}


?>


