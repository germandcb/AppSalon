<?php 

namespace Model;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = "usuarios";
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;  
        $this->nombre = $args['nombre'] ?? '';  
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';    
        $this->token = $args['token'] ?? '';
    }
    

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido  es obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'El Teléfono es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El E-mail es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        // Verificar longitud mínima
        if (strlen($this->password) < 6 ) {
            self::$alertas['error'][] = 'El password debe contener almenos 6 caracteres';
        }
        // Verificar si contiene al menos una letra minúscula, una mayúscula, un número y un carácter especial
        if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password) ||
        !preg_match('/[0-9]/', $this->password) ||
        !preg_match('/[!@#$%^&*()_+{}":;<>,.?~\-]/', $this->password)) {
            self::$alertas['error'][] = 'El password debe contener una letra mayúscula, minúscula, un número y un carácter especial';
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        // Verificar longitud mínima
        if (strlen($this->password) < 6 ) {
            self::$alertas['error'][] = 'El password debe contener almenos 6 caracteres';
        }
        // Verificar si contiene al menos una letra minúscula, una mayúscula, un número y un carácter especial
        if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password) ||
        !preg_match('/[0-9]/', $this->password) ||
        !preg_match('/[!@#$%^&*()_+{}":;<>,.?~\-]/', $this->password)) {
            self::$alertas['error'][] = 'El password debe contener una letra mayúscula, minúscula, un número y un carácter especial';
        }

        return self::$alertas;
    }

    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email ='" . $this->email . "' LIMIT 1;";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }
        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password,PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password) {
        $resultado = password_verify($password, $this->password);
        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no esta confirmada';
        } else {
            return true;

        }
    }

}