      <main class="w-25">
        <section id="banner">
            <div id="title" class="title-section">
                <h1>Login</h1>
            </div>
        </section>
        <section class="frm-layout">
            <div id="login-request">
                <form name="frm-login" id="frm-login"  action="" method="POST">
                    <p class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</p>
                    <div class="mt-24">
                        <label for="login">Login</label><span class="red">*</span>
                        <input type="text" class="form-control" id="login" name="login" placeholder="login">
                    </div>
                    <div>
                        <label for="password">Password</label><span class="red">*</span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    
                    <input class="mt-24" type="submit" id="btn-login" name="btn-login" value="Login">
                    
                    <div class="error mt-16"><?php if(isset($error)) { echo $error; } ?></div>
                </form>
            </div>
        </section>
    </main>
    
    <?php require 'views/parts/footer.php';?>

