<?php
use \Shulha\Framework\Security\Security;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Simple App</title>
        <link rel="stylesheet" type="text/css" href="/uikit/css/uikit.min.css" />
        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/uikit/js/uikit.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li><a href="<?php echo route('root'); ?>" uk-icon="icon:home"></a></li>
                        <li><a href="<?php echo route('blog'); ?>">Blog</a></li>
                        <li><a href="<?php echo route('catalog'); ?>">Catalog</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-center">
                    <a href="<?php echo route('root'); ?>" class="uk-navbar-item uk-logo">
                        My Application
                    </a>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <?php if(Security::checkAuth()):?>
                        <li><a href="#"><i uk-icon="icon:user"></i> <?php echo Security::getUser()->login; ?></a></li>
                        <?php else: ?>
                        <li><a href="<?php echo route('registration'); ?>">Registration</a></li>
                        <li><a href="<?php echo route('login'); ?>">Login</a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="uk-container uk-container-expand uk-padding">
                @yield('content')
            </div>
        </main>
        <footer class="uk-padding uk-text-center">
            <span class="uk-text-muted">&copy; Author</span>
        </footer>
    </body>
</html>
