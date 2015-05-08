<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu structure
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => 'Hem',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Förstasidan presenterar webbmaster och ger en inblick i webbplatsens syfte'
        ],

        // This is a menu item
        'redovisning'  => [
            'text'  => 'Redovisning',
            'url'   => $this->di->get('url')->create('redovisning'),
            'title' => 'Redovisning',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [
                    'kmom04'  => [
                        'text'  => 'kmom04',
                        'url'   => $this->di->get('url')->create('kmom04'),
                        'title' => 'Redovisning för fjärde kursmomentet',
                    ],
                    'kmom03'  => [
                        'text'  => 'kmom03',
                        'url'   => $this->di->get('url')->create('kmom03'),
                        'title' => 'Redovisning för tredje kursmomentet',
                    ],
                    'kmom02'  => [
                        'text'  => 'kmom02',
                        'url'   => $this->di->get('url')->create('kmom02'),
                        'title' => 'Redovisning för andra kursmomentet',
                    ],
                    // This is a menu item of the submenu
                    'kmom01'  => [
                        'text'  => 'kmom01',
                        'url'   => $this->di->get('url')->create('kmom01'),
                        'title' => 'Redovisning för första kursmomentet',
                    ],

                ],
            ],
        ],

        // This is a menu item
        'users' => [
            'text'  =>'Användare', 
            'url'   =>'users',  
            'title' => 'Databas för användare',
        
            // Submenu
            'submenu' => [
                'items' => [
                    'setup' => [
                        'text'  => 'Initiera', 
                        'url'   => 'users/setup',  
                        'title' => 'Initiera databasen.'
                    ],
                    'add' => [
                        'text'  => 'Skapa användare', 
                        'url'   => 'users/add',  
                        'title' => 'Formulär för att skapa en ny användare.'
                    ],
                    'list'  => [
                        'text'  => 'Visa alla',   
                        'url'   => 'users/list',   
                        'title' => 'Visa alla användare i databasen.',
                    ],
                    'active'  => [
                        'text'  => 'Visa aktiva',   
                        'url'   => 'users/active',   
                        'title' => 'Visa alla aktiva medlemmar i databasen.',
                    ],
                    'inactive'  => [
                        'text'  => 'Visa inaktiva',   
                        'url'   => 'users/inactive',   
                        'title' => 'Visa alla inaktiva medlemmar i databasen.',
                    ],
                    'trash'  => [
                        'text'  => 'Papperskorg',   
                        'url'   => 'users/trash',   
                        'title' => 'Visar alla medlemmar som är "soft-deleted"',
                    ],
                ],
            ],
        ],

         // This is a menu item
        'source'  => [
            'text'  => 'Källa',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Visar källkoden för alla sidor'
        ],
    ],
 


    // Callback tracing the current selected menu item base on scriptname
    'callback' => function($url) {
        if ($url == $this->di->get('request')->getRoute()) {
            return true;
        }
    },

    // Callback to create the urls
    'create_url' => function($url) {
        return $this->di->get('url')->create($url);
    },

];

