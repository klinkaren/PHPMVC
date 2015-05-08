<?php 
/**
 * This is a Anax frontcontroller.
 *
 */


// Get environment & autoloader.
require __DIR__.'/config_with_app.php'; 


// Create services and inject into the app.  
$di  = new \Anax\DI\CDIFactoryDefault(); 


// Database
$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_sqlite.php');
    $db->connect();
    return $db;
});

// Users
$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});


$di->set('CommentController', function() use ($di) { 
    $controller = new Phpmvc\Comment\CommentController(); 
    $controller->setDI($di); 
    return $controller; 
}); 

$app = new \Anax\Kernel\CAnax($di);

// Start session
$app->session;

// Configuration
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');


// URL-cleaner
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);



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
 
    $app->theme->setTitle("Kmom01: Rapport");
 
    $content = $app->fileContent->get('kmom01.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action' => 'view',
        'params' => ['kmom01'],
    ]);
    
    $app->views->add('comment/form', [
        'mail' => null,
        'web' => null,
        'name' => null,
        'content' => null,
        'output' => null,
        'key' => 'kmom01',
    ]);
 
});

$app->router->add('kmom02', function() use ($app) {
 
    $app->theme->setTitle("Kmom02: Rapport");
 
    $content = $app->fileContent->get('kmom02.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action' => 'view',
        'params' => ['kmom02'],
    ]);
    
    $app->views->add('comment/form', [
        'mail' => null,
        'web' => null,
        'name' => null,
        'content' => null,
        'output' => null,
        'key' => 'kmom02',
    ]);
 
});

$app->router->add('kmom03', function() use ($app) {
 
    $app->theme->setTitle("Kmom03: Rapport");
 
    $content = $app->fileContent->get('kmom03.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action' => 'view',
        'params' => ['kmom03'],
    ]);
    
    $app->views->add('comment/form', [
        'mail' => null,
        'web' => null,
        'name' => null,
        'content' => null,
        'output' => null,
        'key' => 'kmom03',
    ]);
 
});

$app->router->add('kmom04', function() use ($app) {
 
    $app->theme->setTitle("Kmom04: Rapport");
 
    $content = $app->fileContent->get('kmom04.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action' => 'view',
        'params' => ['kmom04'],
    ]);
    
    $app->views->add('comment/form', [
        'mail' => null,
        'web' => null,
        'name' => null,
        'content' => null,
        'output' => null,
        'key' => 'kmom04',
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

$app->router->add('test-as-array', function() use ($app) {
 
    $app->theme->setTitle("Test as array!!");
 
    $form = new \Mos\HTMLForm\CForm(array(), array(
    'name' => array(
      'type'        => 'text',
      'label'       => 'Name of contact person:',
      'required'    => true,
      'validation'  => array('not_empty'),
    ),        
    'email' => array(
      'type'        => 'text',
      'required'    => true,
      'validation'  => array('not_empty', 'email_adress'),
    ),        
    'phone' => array(
      'type'        => 'text',
      'required'    => true,
      'validation'  => array('not_empty', 'numeric'),
    ),        
    'submit' => array(
      'type'      => 'submit',
      'callback'  => function($form) {
        $form->AddOutput("<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>");
        $form->AddOutput("<p><b>Name: " . $form->Value('name') . "</b></p>");
        $form->AddOutput("<p><b>Email: " . $form->Value('email') . "</b></p>");
        $form->AddOutput("<p><b>Phone: " . $form->Value('phone') . "</b></p>");
        $form->saveInSession = true;
        return true;
      }
    ),
    'submit-fail' => array(
      'type'      => 'submit',
      'callback'  => function($form) {
        $form->AddOutput("<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>");
        return false;
      }
    ),
  )
);
 
    $app->views->add('me/source', [
        'content' => $form->View(),
    ]);
 
});

$app->router->add('users', function() use ($app) {

    $app->theme->setTitle("Users");

    $app->views->add('me/page', [
        'content' => "<h1>Användare</h1><p>Här kan du hantera användare i databasen.</p>",
    ]);
        
});




$app->router->handle();
$app->theme->addStylesheet('css/comments.css');
$app->theme->render();
