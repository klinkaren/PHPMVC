<?php 
/**
 * This is a Anax frontcontroller.
 *
 */


// Get environment & autoloader.
require __DIR__.'/config_with_app.php'; 

// Configuration
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar-grid.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');

// Add routes
$app->router->add('', function() use ($app) {
 
    $app->theme->addStylesheet('css/anax-grid/theme.css');
    $app->theme->setTitle("Tema");
 
    $app->views->addString('flash<br>flash2', 'flash')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
               ->addString('main', 'main')
               ->addString('sidebar', 'sidebar')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');
 
});

$app->router->add('typografi', function() use ($app) {
  $app->theme->addStylesheet('css/anax-grid/typographyStyle.css');
 
    $app->theme->setTitle("Typografi");
 
    $app->views->add('theme/typography', array(), 'main');
    $app->views->add('theme/typography', array(), 'sidebar');
 
});

$app->router->add('font-awesome', function() use ($app) {
 
    $app->theme->addStylesheet('css/anax-grid/theme.css');
    $app->theme->setTitle("Font Awesome");
 
    $app->views->add('theme/font-awesome', array(), 'main');
    $app->views->add('theme/font-awesome-sidebar', array(), 'sidebar');
    
    $app->views->add('theme/font-awesome-1', array(), 'triptych-1');
    $app->views->add('theme/font-awesome-2', array(), 'triptych-2');
    $app->views->add('theme/font-awesome-3', array(), 'triptych-3');
 
});


$app->router->handle();
$app->theme->render(); 