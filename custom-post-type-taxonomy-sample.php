<?php
function wpfo_register_books_taxonomy() { // A taxonómia regisztrálását végző függvény. Legyen egyedi mindig.

	$labels = array(
		'name'                       => 'Műfajok',                              // Többes számú név.
		'singular_name'              => 'Műfaj',                                // Egyes számú név.
		'search_items'               => 'Műfajok keresése',                     // Kereső felirata.
		'popular_items'              => 'Népszerű műfajok',                     // Népszerű elemek listája.
		'all_items'                  => 'Összes műfaj',                         // Az összes elem listája.
		'parent_item'                => 'Szülő műfaj',                          // Szülő elem neve.
		'parent_item_colon'          => 'Szülő műfaj:',                         // Szülő elem mezője.
		'edit_item'                  => 'Műfaj szerkesztése',                   // Elem szerkesztése.
		'view_item'                  => 'Műfaj megtekintése',                   // Elem megtekintése.
		'update_item'                => 'Műfaj frissítése',                     // Elem frissítése.
		'add_new_item'               => 'Új műfaj hozzáadása',                  // Új elem létrehozása.
		'new_item_name'              => 'Új műfaj neve',                        // Új elem neve.
		'separate_items_with_commas' => 'Műfajok vesszővel elválasztva',        // Nem hierarchikus taxonómiánál jelenik meg.
		'add_or_remove_items'        => 'Műfaj hozzáadása vagy eltávolítása',   // Nem hierarchikus taxonómiánál jelenik meg.
		'choose_from_most_used'      => 'Válassz a leggyakoribbak közül',       // Nem hierarchikus taxonómiánál jelenik meg.
		'not_found'                  => 'Nem található műfaj.',                 // Ha nincs találat.
		'no_terms'                   => 'Nincsenek műfajok.',                   // Ha nincs egyetlen elem sem.
		'filter_by_item'             => 'Szűrés műfaj szerint',                 // Gutenberg szűrő felirata.
		'items_list_navigation'      => 'Műfaj lista navigáció',                // Lista lapozása.
		'items_list'                 => 'Műfajok listája',                      // Lista címe.
		'most_used'                  => 'Leggyakrabban használt műfajok',       // Gyakori elemek.
		'back_to_items'              => 'Vissza a műfajokhoz',                  // Visszalépés a listához.
		'item_link'                  => 'Műfaj linkje',                         // Blokkszerkesztő link neve.
		'item_link_description'      => 'A műfaj közvetlen hivatkozása.',       // Link leírása.
	);

	$args = array(
		'labels'                => $labels,                              // A taxonómia feliratai.
		'public'                => true,                                 // Nyilvánosan használható.
		'publicly_queryable'    => true,                                 // URL-en lekérdezhető.
		'hierarchical'          => true,                                 // true = kategória, false = címke.
		'show_ui'               => true,                                 // Admin felület megjelenítése.
		'show_in_menu'          => true,                                 // Saját admin oldala legyen.
		'show_in_nav_menus'     => true,                                 // Hozzáadható navigációs menükhöz.
		'show_tagcloud'         => true,                                 // Címkefelhő widgetben megjelenhet.
		'show_in_quick_edit'    => true,                                 // Gyorsszerkesztésben is megjelenjen.
		'show_admin_column'     => true,                                 // Saját oszlop az admin listában.
		'show_in_rest'          => true,                                 // Gutenberg és REST API támogatás.
		'rest_base'             => 'genres',                             // REST API végpont neve.
		'rest_namespace'        => 'wp/v2',                              // REST API névtér.
		'rest_controller_class' => 'WP_REST_Terms_Controller',           // REST vezérlő osztály.
		'query_var'             => true,                                 // Lekérdezhető query változóval.
		'query_var'             => 'genre',                              // Egyedi query változó neve is megadható.
		'rewrite'               => array(
			'slug'         => 'mufaj',                            // URL slug.
			'with_front'   => true,                               // Permalink előtag használata.
			'hierarchical' => true,                               // Hierarchikus URL-ek használata.
			'ep_mask'      => EP_NONE,                            // Rewrite endpoint maszk.
		),
		'sort'                  => false,                     // A kiválasztási sorrendet nem tárolja.
		'default_term'          => array(                     // Alapértelmezett elem létrehozása.
			'name'        => 'Egyéb',                           // Alapértelmezett név.
			'slug'        => 'egyeb',                           // Alapértelmezett slug.
			'description' => 'Alapértelmezett műfaj.',          // Alapértelmezett leírás.
		),
		'capabilities'          => array(                     // Jogosultságok testreszabása.
			'manage_terms' => 'manage_categories',              // Létrehozás és kezelés.
			'edit_terms'   => 'manage_categories',              // Szerkesztés.
			'delete_terms' => 'manage_categories',              // Törlés.
			'assign_terms' => 'edit_posts',                     // Hozzárendelés a bejegyzésekhez.
		),
	);

	register_taxonomy( 'wpfo_genre', array( 'wpfo_book' ), $args ); // Taxonómia regisztrálása a wpfo_book CPT-hez.
}
add_action( 'init', 'wpfo_register_books_taxonomy' ); // Az init hook-on futtatja a regisztráló függvényt.
