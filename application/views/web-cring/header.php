<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#0844a5" />
        <title>Cring - Cring</title>
    <!-- <link rel="shortcut icon" href="<?php echo base_url('web/favicon.ico'); ?> "> -->
    <link rel="stylesheet" href="<?php echo base_url('web/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('web/css/stylesheet.css') ?>">
    
    <style>
        .border-bottom-shop{
            border-bottom-width: 1px; 
            border-bottom-style: solid; 
            border-bottom-color:gray;
        }

        .text-no-style{
            color:black;
        }

        .padding-bottom-10{
            padding-bottom: 10px;
        }

        .padding-top-10{
            padding-top:10px;
        }

    	.header-me{
    		background-color:#2d1e5f;
    		width:100%;
    		border-bottom: 2px solid #faa819;
            padding:0px;
            margin:0px;
            height: 13%;
    		padding:10px;
    	}

        .logo-header{
            margin-bottom:10px;   
        }

        .btn-primary{
            background-color:#faa819 !important;
            border-color:#faa819;
        }

        .navbar{
            background-color:#2d1e5f !important;
            border-radius: 0px !important;
            padding: 0px !important;
            margin:0px !important;
            border-bottom: 2px solid #faa819;
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
            background-color: #2d1e5f !important;
        }

        .navbar-default .navbar-brand{
            color:white;
        }

        .navbar-default .navbar-nav>li>a{
            color:white;
        }

        .btn{
            background-color:#faa819;
            border-color:#faa819;
        }
        #login-dp{
            min-width: 250px;
            padding: 14px 14px 0;
            overflow:hidden;
        }
        #login-dp .help-block{
            font-size:12px    
        }
        #login-dp .bottom{
            border-top:1px solid #ddd;
            clear:both;
            padding:14px;
        }
        #login-dp .social-buttons{
            margin:12px 0    
        }
        #login-dp .social-buttons a{
            width: 49%;
        }
        #login-dp .form-group {
            margin-bottom: 10px;
        }
        .btn-fb{
            color: #fff;
            background-color:#3b5998;
        }
        .btn-fb:hover{
            color: #fff;
            background-color:#496ebc 
        }
        .btn-tw{
            color: #fff;
            background-color:#55acee;
        }
        .btn-tw:hover{
            color: #fff;
            background-color:#59b5fa;
        }
        @media(max-width:768px){
            #login-dp{
                background-color: inherit;
                color: #fff;
            }
            #login-dp .bottom{
                background-color: inherit;
                border-top:0 none;
            }
        }

	</style>
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="">
                CRING-CRING
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">             
                <li><a href="#">Beranda</a></li>
                
                <li><a href="#" title="Thailand">Tentang Kami</a></li> 
                <li><a href="#">Kontak</a></li> 
                
            </ul>
            <form class="navbar-form navbar-left" role="search" method="POST" action="#">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="item-search">
                </div>
                <button type="submit" class="btn btn-default">Cari</button>
            </form>

            <!--isNotLoggedIn -->
            <?php if(!isset($this->session->userdata['user_info'])) : ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('cring/register/');?>"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
                    

                    <!-- login section -->
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Masuk</a> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                            
                                        <form id="form-login" role="form" method="post" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                 <label class="sr-only" for="email">Email address</label>
                                                 <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                 <label class="sr-only" for="password">Password</label>
                                                 <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                                 <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                 <button type="submit" id="submit" name="submit"  value="Submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <div style="text-align: center">or</div>
                                            <div class="form-group">
                                                 <button type="submit" style="background-color:#3B5998 !important; border-width: 0px !important" class="btn btn-primary btn-block">Facebook</button>
                                            </div>
                                            <div class="checkbox">
                                                 <label>
                                                 <input type="checkbox"> keep me logged-in
                                                 </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="#"><b>Join Us</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- end login section-->
                </ul>

            <!--isLoggedIn -->
            <?php else:?>
                <ul class="nav navbar-nav navbar-right">                    
                    <li><a href="<?php echo base_url('cring/my_cart');?>">
                        <div id="badges" style="display:inline">
                            <?php if(isset($this->session->userdata['user_info'])) :?> 
                                <?php echo $this->session->userdata['user_info']['count_cart']?>
                            <?php else:?>
                            <?php endif;?>
                        </div>
                        <span class="glyphicon glyphicon-shopping-cart"></span> 
                        </a>
                    </li>

                    <?php 
                        $shop_is_exist = 1;
                        $shop_not_exist = 0;
                    ?>

                    <!-- Jika user belum buka toko-->

                    <?php if( isset($this->session->userdata['user_info']) AND $this->session->userdata['user_info']['isOpenShop'] == $shop_not_exist):?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Toko
                        <span class="glyphicon glyphicon-home"> </span>
                        </a>
                        <ul class="dropdown-menu" style="background-color:white; padding:10px;">
                            <div style="text-align: center; ">
                                
                                <div style="text-decoration: none; color:gray;font-size:11px;">
                                    Anda Belum Memiliki Toko  
                                </div>
                                <button id="open-shop" style="width:100%; color:white; background-color:#2d1e5f; margin-top:10px; margin-bottom:10px;">Buka Toko</button><br/>
                                <a href="#" id="seller-information" style="font-size:11px;">Pelajari Lebih Lanjut >> </a>
                            </div> 
                        </ul>
                    </li>

                    <!--Jika user sudah punya toko -->
                    <?php elseif(isset($this->session->userdata['user_info']) && 
                    $this->session->userdata['user_info']['isOpenShop'] == $shop_is_exist):?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Toko
                            <span class="glyphicon glyphicon-home"> </span>
                            </a>
                            <ul class="dropdown-menu" style="background-color:white; padding:10px;">
                                <div style="text-align: center; ">
                                    <div id="shop-menu" href="#" style="text-decoration: none; color:gray;font-size:11px; text-align:left;">
                                        Toko Saya
                                    </div>

                                    <a href="#">
                                        <div style="text-align:left; color:#2d1e5f" class="border-bottom-shop padding-bottom-10">
                                            <?php echo $this->session->userdata['shop_information']->shop_name?> 
                                        </div>
                                    </a>
 
                                    <a href="#" style="text-decoration: none;">
                                        <div style="text-align:left; "
                                            class="border-bottom-shop padding-bottom-10 padding-top-10 text-no-style">
                                            Penjualan 
                                        </div>
                                    </a>

                                    <a href="<?php echo base_url('shop/add_product');?>" style="text-decoration: none;">
                                        <div style="text-align:left; "
                                            class="border-bottom-shop padding-bottom-10 padding-top-10 text-no-style">
                                            Tambah Produk 
                                        </div>
                                    </a>

                                    <a href="#" style="text-decoration: none;">
                                        <div style="text-align:left; "
                                            class="border-bottom-shop padding-bottom-10 padding-top-10 text-no-style">
                                            Daftar Produk 
                                        </div>
                                    </a>

                                </div> 
                                <button style="width:100%; font-size:11px; margin-top:10px; background-color:#faa819; color:white; height:5vh">Upgrade Ke Premium</button>
                            </ul>
                        </li>
                    <?php else:?>
                    <?php endif;?>                        

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Halo,
                        <?php if(isset($this->session->userdata['user_info'])) :?> 
                           <?php echo $this->session->userdata['user_info']['username']?>
                        <?php else: ?>
                        <?php endif;?>
                      </a>
                        <ul class="dropdown-menu" style="background-color:#faa819">
                            <div style="text-align: center; font-size:16px;">
                                <a id="logout-user" href="#" style="text-decoration: none; color:white">Keluar</a>
                            </div>     
                        </ul>
                    </li>
                </ul>
            <?php endif;?>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<script src="<?php echo base_url('sb-admin-v2/jquery/dist/jquery.min.js'); ?>"></script>
<script>
$(document).ready(function(){

    $("#form-login").submit(function(event){
        
        event.preventDefault();
        
        var url = "<?php echo base_url('cring/login') ?>";

        var email = $("input#email").val();
        var password = $("input#password").val();
        var submit = $("button#submit").val();

        var error = 0;
        var success = 1;
            
        $.ajax({
            type: "POST",
            url: url,
            data: {
                email: email, 
                password: password,
                submit: submit
            },
            success: function(data){
                console.log('data: ', data);
                if(data){
                    // console.log('data: ', data);
                    var res = JSON.parse(data);
                    
                    if(res.status == error){
                        alert(res.message);
                    }else{
                        alert(res.message);
                        window.location.href = "<?php echo base_url('cring/home') ?>";
                    }
                }      
            },
            error : function(data) {
                alert('Error!');
                
            }
            
        });

        // return false;  //stop the actual form post !important!

    });

    $("#logout-user").click(function(event){
        
        event.preventDefault();
        
        var url = "<?php echo base_url('cring/logout') ?>";

        var error = 0;
        var success = 1;
            
        $.ajax({
            url: url,
            success: function(data){
                if(data){
                    // console.log('data: ', data);
                    var res = JSON.parse(data);
                    
                    if(res.status == error){
                        alert(res.message);
                    }else{
                        alert(res.message);
                        window.location.href = "<?php echo base_url('cring/home') ?>";
                    }
                }      
            },
            error : function(data) {
                alert('Error!');
                
            }
            
        });

        // return false;  //stop the actual form post !important!

    });

    $("#open-shop").click(function(event){
        
        event.preventDefault();
        
        window.location.href = "<?php echo base_url('shop/open_shop_') ?>";

        return false;  //stop the actual form post !important!

    });

    $("#my-cart").click(function(event){
        
        event.preventDefault();
        
        var url = "<?php echo base_url('cring/my_cart') ?>";

        var error = 0;
        var success = 1;
            
        $.ajax({
            url: url,
            success: function(data){
                if(data){
                    // console.log('data: ', data);
                    var res = JSON.parse(data);
                    
                    if(res.status == error){
                        alert(res.message);
                    }else{
                        alert(res.message);
                        window.location.href = "<?php echo base_url('cring/home') ?>";
                    }
                }      
            },
            error : function(data) {
                alert('Error!');
                
            }
            
        });

        // return false;  //stop the actual form post !important!

    });

});
</script>