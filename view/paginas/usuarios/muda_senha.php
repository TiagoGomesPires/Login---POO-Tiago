<main>
    <form action="<?php echo HOME_URI;?>usuario/alterar" method="POST">
        <fieldset>

        <a href="<?php echo HOME_URI;?>usuario/criar" class="btn">Crie uma Conta aqui</a>

            <legend>Login de usuários</legend>
            <?php
                if(isset($_SESSION['alert'])){
                    echo  "<div>".$_SESSION['alert']."</div>";  
                    unset($_SESSION['alert']);
                }
            ?>

            <div class="form-control">
                <input type="email" name="email" placeholder="Email" class="form-control"required/>
            </div>

            <div class="form-control">
                <input type="password" name="senha" placeholder="Senha Alterada" class="form-control"required/>
            </div>

            <div class="form-control">
                <input type="password" name="senhaconf" placeholder="Confirme a Senha Alterada" class="form-control"required/>
            </div>
            
            <div class="form-control">
                <input type="submit" name="enviar" value="Enviar" class="form-control"/>
            </div>


        </fieldset>

    </form>
     
</main>