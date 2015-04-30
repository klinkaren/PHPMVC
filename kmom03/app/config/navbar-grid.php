<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [


        // This is a menu item 
        'Me'  => [ 
            'text'  => 'Me', 
            'url'   => 'index.php', 
            'title' => 'Me' 
        ], 
        // This is a menu item
        'theme'  => [
            'text'  => 'Tema',
            'url'   => $this->di->get('url')->create('theme.php'),
            'title' => 'En testsida för temat'
        ],
        
        // This is a menu item
        'typografi'  => [
            'text'  => 'Typografi',
            'url'   => $this->di->get('url')->create('theme.php?typografi'),
            'title' => 'En testsida för typografi'
        ],
     
        // This is a menu item
        'font-awesome'  => [
            'text'  => 'Font Awesome',
            'url'   => $this->di->get('url')->create('theme.php?font-awesome'),
            'title' => 'En testsida för Font Awesome'
        ],
        
        
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getRoute()) {
                return true;
        }
    },

    // Callback to create the urls
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },


];
