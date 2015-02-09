<?php 
/**
 * This is a Anax frontcontroller.
 *
 */


// Get environment & autoloader.
require __DIR__.'/config_with_app.php'; 

// Configuration
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');


// Add routes
$app->router->add('', function() use ($app) {
    $app->theme->setTitle("ME");

    $content = $app->fileContent->get('me.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');

    $app->views->add('me/page', [
    	'content' => $content,
    	'byline' => $byline,
    ]);
});

$app->router->add('redovisning', function() use ($app) {
 
    $app->theme->setTitle("Redovisning");
 
    $content = $app->fileContent->get('redovisning.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
 
});

$app->router->add('kmom01', function() use ($app) {
 
    $app->theme->setTitle("Kmom01");
 
    $content = $app->fileContent->get('kmom01.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
 
});

$app->router->add('dice', function() use ($app) {
 
    $app->theme->setTitle("Tärningskast");
 
    $content = $app->fileContent->get('dice.php');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
 
});

$app->router->add('source', function() use ($app) {
 
    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");
 
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
 
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
 
});

$app->router->add('source', function() use ($app) {
 
});



$app->router->handle();
$app->theme->render();
