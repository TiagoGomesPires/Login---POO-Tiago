<?php
class Usuario{
    private $email;
    private $id;
    private $nome;
    private $senha;

    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    public function getSenha(){
        return $this->senha;
    }


    public function index(){
        if(isset($_SESSION['nome'])){
            $this->list();
        }
        else{
            $this->criar();
        }     
    }

    public function list(){
        include HOME_DIR."view/paginas/usuarios/list.php";
    }
    
    public function alterar(){
        
        $login = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
        if($login){ 
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            $senhaconf = filter_input(INPUT_POST, 'senhaconf', FILTER_SANITIZE_STRING);
                if((!empty($email)) AND (!empty($senha)) AND (!empty($senhadnv)) ){

                    //Encriptar Senha
                    $senha = md5($senha);
                    $senhadnv = md5($senhadnv);


                    if($senha == $senhadnv and $senha != '202cb962ac59075b964b07152d234b70' ){

                        $conexao=Conexao::getConexao();

                        $alterar = "UPDATE usuario SET senha = '$senha' where email='$email'";
                        $resultado = $conexao->prepare($alterar);
    
                        if($resultado->execute()){
                             

                            $conexao=Conexao::getConexao();
                            $sql = $conexao->query(
                                "SELECT nome FROM usuario WHERE email='$email' AND senha='$senha'"
                            );
    
                            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
                            var_dump($resultado);

                            $_SESSION['nome'] = $resultado['nome'];
                            $_SESSION['email'] = $email;
                            $this->list();
                        }else{
                            $_SESSION['alert'] = "Erro na alteração, favor repita!";
                            include HOME_DIR."view/paginas/usuarios/muda_senha.php";  
                        } 


                    }
                    else{
                        $_SESSION['alert'] = "Senhas diferentes ou valor inalterado!";
                        include HOME_DIR."view/paginas/usuarios/muda_senha.php";
                    }

                }
        } 
    }

public function validar(){
        
        $login = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


        if($login){ 
                if((!empty($email)) AND (!empty($password))){


                  $password = md5($password);   

                    if($password == '202cb962ac59075b964b07152d234b70'){
                    $_SESSION['alert'] = "Senha padrão, redefina";
                    include HOME_DIR."view/paginas/usuarios/muda_senha.php"; 
                    }
                    else{

                        //Pesquisar no Bando de Dados

                        $conexao=Conexao::getConexao();
                                
                        $sql = $conexao->query(
                            "SELECT id, nome, email FROM usuario WHERE email='$email' AND senha='$password'"
                        );

                        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
                        // var_dump($resultado);


                        // $conexao=Conexao::getConexao();
                        // $result_usuario = "SELECT  id, nome, email, senha FROM usuario WHERE email='$email' LIMIT 1";
                        // $resultado_usuario = mysqli_query($conexao, $result_usuario);
                        if($resultado){

                                $_SESSION['nome'] = $resultado['nome'];
                                $_SESSION['email'] = $resultado['email'];
                                //var_dump($_SESSION);
                                $this->list();
                        }else{
                            $_SESSION['alert'] = "Email e/ou senha incorreto!";
                            include HOME_DIR."view/paginas/usuarios/form_usuario.php"; 
                        }

                    }


                }else{
                    $_SESSION['alert'] = "Email e/ou senha incorreto!";
                    include HOME_DIR."view/paginas/usuarios/form_usuario.php";
                }
        }
        else{
            $_SESSION['alert'] = "Página não encontrada";
            include HOME_DIR."view/paginas/usuarios/form_usuario.php";
        }


    }

    public function register(){
        var_dump($_POST);
        $login = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


        if($login){ 
            
                if((!empty($name)) AND (!empty($email))){
 

                    $conexao=Conexao::getConexao();

                    $inserir = "INSERT INTO usuario (id, nome, email) VALUES (0, :name, :email)";
                    $resultado = $conexao->prepare($inserir);
                    $resultado->bindParam(':name',$name);
                    $resultado->bindParam(':email',$email);

                    if($resultado->execute()){
                        $_SESSION['nome'] = $name;
                        $_SESSION['email'] = $email;
                        $this->list(); 
                    }else{
                        $_SESSION['alert'] = "Erro no cadastramento, repita o processo!";
                        include HOME_DIR."view/paginas/usuarios/cad_usuario.php";  
                    }
                
                }else{
                    $_SESSION['alert'] = "Erro no cadastramento, repita o processo!!";
                    include HOME_DIR."view/paginas/usuarios/cad_usuario.php";
                }
        }
        else{
            $_SESSION['alert'] = "Infelizmente a página não foi encontrada";
            include HOME_DIR."view/paginas/usuarios/cad_usuario.php";
        }


    }

    
    public function logar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

    public function criar(){
        session_destroy();
        include HOME_DIR."view/paginas/usuarios/cad_usuario.php";
    }

    public function deslogar(){
        session_destroy();
        $this->logar();
    }

    public function exibir($id){
        echo "O id do usuario é".$id;
    }



    public function autenticar(){
      
        
    }
}