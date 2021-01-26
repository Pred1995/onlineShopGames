<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<style>
    input[type="button"]:not(.default), input[type="submit"]:not(.default) {
        -webkit-border-radius: 3px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 3px;
        -moz-background-clip: padding;
        border-radius: 3px;
        background-clip: padding-box;
        -webkit-transition: color 0.2s ease, border 0.2s ease, background 0.2s ease, -webkit-box-shadow 0.2s ease;
        -moz-transition: color 0.2s ease, border 0.2s ease, background 0.2s ease, -moz-box-shadow 0.2s ease;
        -o-transition: color 0.2s ease, border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        transition: color 0.2s ease, border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        position: relative;
        margin: 0 7px;
        display: inline-block;
        min-width: 144px;
        max-width: 100%;
        padding: 15px 25px;
        font-family: "Arial", "Helvetica Neue", Arial, Helvetica, sans-serif;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        line-height: 1;
        border-width: 1px;
        border-style: solid;
        background-color: steelblue;
        color: #ddd;
    }
    .form {
        zoom: 1;
        display: block;
        width: auto;
        padding: 25px 0 0;
    }
    .form:before,
    .form:after {
        content: "";
        display: table;
    }
    .form:after {
        clear: both;
    }
    .form .form-group {
        zoom: 1;
        position: relative;
        margin-bottom: 25px;
    }
    .form .form-group:before,
    .form .form-group:after {
        content: "";
        display: table;
    }
    .form .form-group:after {
        clear: both;
    }
    .form .form-group:after {
        content: '';
        display: block;
        clear: both;
    }
    .form .form-group[class*="col-"] input[type=text],
    .form .form-group[class*="col-"] input[type=email],
    .form .form-group[class*="col-"] input[type=password] {
        display: inline-block;
        width: 100%;
        min-width: 0;
        max-width: 100%;
    }
    .form .form-control {
        -webkit-border-radius: 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0;
        -moz-background-clip: padding;
        border-radius: 0;
        background-clip: padding-box;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        height: auto;
        font-size: 17px;
        font-weight: 300;
        background-color: #ffffff;
        border-style: solid;
        border-width: 1px 1px 1px 3px;
        border-top-color: #d7d7d7;
        border-right-color: #d7d7d7;
        border-bottom-color: #d7d7d7;
    }
    input[type=text],
    input[type=email],
    input[type=password] {
        -webkit-transition: color 0.2s ease, background 0.3s ease;
        -moz-transition: color 0.2s ease, background 0.3s ease;
        -o-transition: color 0.2s ease, background 0.3s ease;
        transition: color 0.2s ease, background 0.3s ease;
        -webkit-border-radius: 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0;
        -moz-background-clip: padding;
        border-radius: 0;
        background-clip: padding-box;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        margin: 0;
        vertical-align: top;
        display: inline-block;
        width: 100%;
        font-size: 17px;
        color: #8d8d8d;
        background-color: #ffffff;
        border-style: solid;
        border-width: 1px 1px 1px 3px;
        border-top-color: #d7d7d7;
        border-right-color: #d7d7d7;
        border-bottom-color: #d7d7d7;
        outline: none;
    }
    input[type=text]:hover,
    input[type=email]:hover,
    input[type=password]:hover {
        color: #000000;
    }
    input[type=text]:focus,
    input[type=email]:focus,
    input[type=password]:focus {
        outline: none;
        border-left-color: steelblue;
    }
    .well h3 {
        text-shadow: -1px -1px #FFF, -2px -2px #FFF, -1px 1px #FFF, -2px 2px #FFF, 1px 1px #FFF, 2px 2px #FFF, 1px -1px #FFF, 2px -2px #FFF, -3px -3px 2px #BBB, -3px 3px 2px #BBB, 3px 3px 2px #BBB, 3px -3px 2px #BBB;
        color: steelblue;
        transition: all 1s;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <h3 class="text-center">Well Style Blue</h3>
            <form class="form" method="post" data-toggle="validator">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <input name="login" type="text" class="form-control" placeholder="Введите Логин" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : ''?>" required />
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input name="password" type="text" class="form-control" placeholder="Введите Пароль" value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : ''?>" data-error="Bruh, that email address is invalid" data-minlength="6" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors">Пароль должн включать не менее 6 символов</div>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input name="name" type="text" class="form-control" placeholder="Введите Имя" value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : ''?>" required/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input name="email" type="email" class="form-control" placeholder="Введите email" value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''?>" required />
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input name="address" type="text" class="form-control" placeholder="Введите адрес" value="<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : ''?>" required/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="text-center col-xs-12">
                    <input type="submit" class="btn btn-default" value="Submit" />
                </div>
            </form>
        <?php
        if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);
        ?>
        </div>
    </div>