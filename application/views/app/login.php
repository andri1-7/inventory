<a class="hiddenanchor" id="signup"></a>
<a class="hiddenanchor" id="signin"></a>
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form id="parsley-form" novalidate name="form_login">
                <h1>Login Form</h1>
                <div>
                    <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" name="passwd" required="" />
                </div>
                <div>
                    <button type="submit" class="btn btn-default">Log in</button>
                    <a class="reset_pass" href="#">Lost your password?</a>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">New to site?
                    <a href="#signup" class="to_register"> Create Account </a>
                    </p>
                    <div class="clearfix"></div>
                        <br />
                        <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
<script src="<?php echo base_url('vendors/parsleyjs/dist/parsley.min.js') ?>"></script>
<script>
    // To Validate Form
    $("#parsley-form").parsley().on('field:validated',function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('app/akses_login/') ?>",

            form_selector = "form[name='form_login']";

        submitForm(null, form_selector, link);
        return false;
    });
</script>