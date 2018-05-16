<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <div class="card m50">
                <h4 class="card-header">Login</h4>
                <div class="card-block">
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                        </div>
                        <div class="form-group text-danger">
                            <?php if(isset($_SESSION['loginError'])){
                                echo '<span>Wrong email/password</span><br/><span>Please try again.</span>';
                                session_unset();
                                session_destroy();
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>