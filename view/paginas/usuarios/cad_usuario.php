<main>
    <form action="<?php echo HOME_URI;?>usuario/registrar" method="POST" class="porcent">
        <fieldset>

            <h1>Cadastrar</h1>



            <?php
                if(isset($_SESSION['alert'])){
                    echo  "<div>".$_SESSION['erro']."</div>";  
                    unset($_SESSION['alert']);
                }
            ?>

        <p>Já possui uma conta? <a href="<?php echo HOME_URI;?>usuario/logar" class="btn">Logue-se</a></p>

            <div class="form-control">
                <input type="name" name="name" placeholder="Nome" class="form-control"required/>
            </div>

            <div class="form-control">
                <input type="email" name="email" placeholder="Email" class="form-control"required/>
            </div>
            
            <div class="form-control">
                <input type="submit" name="enviar" value="Enviar" class="form-control"/>
            </div>
            


        </fieldset>
    </form>
    
</main>