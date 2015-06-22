<?
include_once 'languages/' . LANGUAGE . '.common.php';
$user = LoadPlugin('User');
$events = LoadPlugin('events');
$graduates = LoadPlugin('Graduates');
?>
<!DOCTYPE html>
<html>
<head lang="<?= LANGUAGE ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $meta['title'] ?></title>
    <link rel="stylesheet" href="/templates/chnu/css/style.css">
    <script src="/templates/chnu/js/script.js"></script>
</head>
<body>
<div class="header-image"></div>

<div class="container">
    <nav class="navbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="glyphicon glyphicon-collapse-down"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?
                $menuBuilder = LoadPlugin('MenuBuilder');
                require_once 'menu.php';
                $menuBuilder->build($menu);
                ?>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/language/ua"><img src="/languages/ua.png"></a></li>
                    <li><a href="/language/en"><img src="/languages/en.png" width="24"></a></li>

                    <?
                    if (!$user->isAuth()) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"><?= PERSONAL ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/account/login"><?= SIGN_IN ?></a></li>
                                <li><a href="/account/registration"><?= REGISTRATION ?></a></li>
                            </ul>
                        </li>
                    <? } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"><?= WELCOME ?> <?= $user->user->login ?> <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/messages"><?= MESSAGES ?></a></li>
                                <li><a href="/account"><?= PROFILE ?></a></li>
                                <li><a href="/account/sign_out"><?= SIGN_OUT ?></a></li>
                            </ul>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="col-md-12">
        <!-- Main content -->
        <div class="col-md-8 wow fadeIn">
            <? LoadView($module, $view, $data, $data1) ?>
        </div>
        <!-- End main content -->

        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="panel wow fadeIn">
                <div class="panel-heading">
                    <div class="panel-title">Гордість ЧНУ</div>
                </div>
                <div class="panel-body">
                    <img src="images/baner.png" class="thumbnail">
                </div>
            </div>

            <div class="panel wow fadeIn">
                <div class="panel-heading">
                    <div class="panel-title"><?= GRADUATE ?></div>
                </div>
                <div class="panel-body" align="center">
                    <? $graduates->get(); ?>
                </div>
            </div>

            <div class="panel wow fadeIn">
                <div class="panel-heading">
                    <div class="panel-title"><?= EVENTS ?></div>
                </div>
                <div class="panel-body">
                    <? $events->get() ?>
                </div>
            </div>


        </div>
        <!-- End sidebar -->

        <!-- Footer -->
        <footer class="footer wow fadeIn">
            ЧНУ &copy; 2015

            <a href="#">Виконали студенти групи 343-ск</a>
        </footer>
    </div>
</div>
<div id="up_button"></div>
<script>
    new WOW().init();
</script>
<script>
    $(function () {

        var defaults = {
            containerID: 'up_button', // fading element id
            containerHoverID: 'body', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop(defaults);

        $('#up_button').html('');

    });
</script>
</body>
</html>