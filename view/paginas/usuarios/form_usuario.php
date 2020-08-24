<main>
    <form action="<?php echo HOME_URI;?>usuario/validar" method="POST">
        <fieldset>
            <h1>Fazer Login</h1>
            <?php
                if(isset($_SESSION['alert'])){
                    echo  "<div>".$_SESSION['alert']."</div>";  
                    unset($_SESSION['alert']);
                }
            ?>

            <div class="form-control"> <input type="email" name="email" placeholder="Email" class="form-control"required/> </div>

            <div class="form-control"><input type="password" name="password" placeholder="Senha" class="form-control"required/></div>
            
            <div class="form-control"><input type="submit" name="enviar" value="Enviar" class="form-control"/></div>
        </fieldset>
    </form>
    <p>Não tem conta ainda? <a href="<?php echo HOME_URI;?>usuario/criar" class="btn">Cadastre-se</a></p>
</main>