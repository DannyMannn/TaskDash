<!-- Modal SIGNIN-->
<div class="modal fade" id="staticBackdropSignin" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Task Dash Signin</h5>
            </div>
            <div class="modal-body">
            <!-- RECIBIR ERRORES DEL FORMULARIO-->
               
                <form action="../../server/php/forms/signin.php" method="POST"  >

                    <label class="col-6" for="email">Email: </label>
                    <input class="form-control col-6" type="email" name="email" placeholder="email@dominio.com" required>

                    <label class="col-6" for="password">Password: </label>
                    <input class="form-control col-6" type="password" name="password" required>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="submit" value="signin">Sign in</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>