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
        'theme'  => [ 
            'text'  => 'Tema', 
            'url'   => 'theme.php', 
            'title' => 'Sida för tema' 
        ],

         // This is a menu item
        'source'  => [
            'text'  => 'Källa',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Visar källkoden för alla sidor'
        ],
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($this->di->get('request')->getCurrentUrl($url) == $this->di->get('url')->create($url)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
    */
];
