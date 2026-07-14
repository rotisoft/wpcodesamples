<?php
function wpfo_register_books_cpt() { // A CPT regisztrálását végző függvény. Mindig legyen egyedi neve, jelen esetben wpfo_register_books_cpt.

	$labels = array(
		'name'                     => 'Könyvek',                           // Többes számú név.
		'singular_name'            => 'Könyv',                             // Egyes számú név.
		'menu_name'                => 'Könyvek',                           // Admin menü neve.
		'name_admin_bar'           => 'Könyv',                             // Admin felső sáv neve.
		'add_new'                  => 'Új hozzáadása',                     // Új elem létrehozása.
		'add_new_item'             => 'Új könyv hozzáadása',               // Új elem szerkesztő címe.
		'edit_item'                => 'Könyv szerkesztése',                // Elem szerkesztése.
		'new_item'                 => 'Új könyv',                          // Új elem neve.
		'view_item'                => 'Könyv megtekintése',                // Egy elem megtekintése.
		'view_items'               => 'Könyvek megtekintése',              // Több elem megtekintése.
		'search_items'             => 'Könyvek keresése',                  // Kereső felirata.
		'not_found'                => 'Nem található könyv.',              // Nincs találat.
		'not_found_in_trash'       => 'Nincs könyv a lomtárban.',          // Lomtár üres.
		'parent_item_colon'        => 'Szülő könyv:',                      // Hierarchikus típusnál jelenik meg.
		'all_items'                => 'Összes könyv',                      // Minden elem listája.
		'archives'                 => 'Könyv archívum',                    // Archívum neve.
		'attributes'               => 'Könyv attribútumai',                // Attribútum panel címe.
		'insert_into_item'         => 'Beszúrás a könyvbe',                // Média beszúrásakor jelenik meg.
		'uploaded_to_this_item'    => 'Ehhez a könyvhöz feltöltve',        // Média feltöltési szöveg.
		'featured_image'           => 'Kiemelt kép',                       // Kiemelt kép neve.
		'set_featured_image'       => 'Kiemelt kép beállítása',            // Kiemelt kép kiválasztása.
		'remove_featured_image'    => 'Kiemelt kép eltávolítása',          // Kiemelt kép törlése.
		'use_featured_image'       => 'Használat kiemelt képként',         // Kiválasztott kép használata.
		'filter_items_list'        => 'Lista szűrése',                     // Lista szűrése.
		'filter_by_date'           => 'Szűrés dátum szerint',              // Dátum szerinti szűrés.
		'items_list_navigation'    => 'Lista navigáció',                   // Lista lapozása.
		'items_list'               => 'Könyvek listája',                   // Lista címe.
		'item_published'           => 'Könyv közzétéve.',                  // Közzététel üzenete.
		'item_published_privately' => 'Könyv privátként közzétéve.',       // Privát közzététel üzenete.
		'item_reverted_to_draft'   => 'Könyv visszaállítva piszkozatnak.', // Piszkozattá alakítás üzenete.
		'item_scheduled'           => 'Könyv időzítve.',                   // Időzített közzététel üzenete.
		'item_updated'             => 'Könyv frissítve.',                  // Frissítés üzenete.
		'item_link'                => 'Könyv linkje',                      // Blokkszerkesztő link neve.
		'item_link_description'    => 'A könyv közvetlen hivatkozása.',    // Link leírása.
	);

	$args = array(
		'labels'                => $labels,                           // A CPT feliratai.
		'description'           => 'Minta egyedi bejegyzéstípus.',    // Rövid leírás.
		'public'                => true,                              // Nyilvánosan elérhető.
		'hierarchical'          => false,                             // A false = bejegyzés, true = oldal.
		'exclude_from_search'   => false,                             // Megjelenjen a WP core keresőben.
		'publicly_queryable'    => true,                              // URL-en lekérdezhető.
		'show_ui'               => true,                              // Admin felület megjelenítése hozzá.
		'show_in_menu'          => true,                              // Megjelenjen az admin menüben.
		'show_in_nav_menus'     => true,                              // Hozzáadható menükhöz.
		'show_in_admin_bar'     => true,                              // Megjelenjen az admin sávban.
		'show_in_rest'          => true,                              // Gutenberg és REST API támogatás.
		'rest_base'             => 'books',                           // REST végpont neve. Mindig legyen egyedi.
		'rest_namespace'        => 'wp/v2',                           // REST névtér.
		'rest_controller_class' => 'WP_REST_Posts_Controller',        // REST vezérlő osztály.
		'menu_position'         => 20,                                // Admin menü pozíciója.
		'menu_icon'             => 'dashicons-book',                  // Admin ikon.
		'capability_type'       => 'post',                            // Jogosultság alapja.
		'capabilities'          => array(),                           // Egyedi jogosultságok.
		'map_meta_cap'          => true,                              // Automatikus jogosultság-kezelés.
		'supports'              => array(                       // Azokat adjuk hozzá, amire szükségünk van.
			'title',                                              // Cím.
			'editor',                                             // Tartalomszerkesztő.
			'author',                                             // Szerző.
			'thumbnail',                                          // Kiemelt kép.
			'excerpt',                                            // Kivonat.
			'trackbacks',                                         // Trackback.
			'custom-fields',                                      // Egyedi mezők.
			'comments',                                           // Hozzászólások.
			'revisions',                                          // Verziókövetés.
			'page-attributes',                                    // Sorrend és szülő.
			'post-formats',                                       // Bejegyzésformátumok.
		),
		'taxonomies'            => array(
			'category',                                           // Kategóriák.
			'post_tag',                                           // Címkék.
		),
		'has_archive'           => true,                              // Legyen archívum oldala.
		'rewrite'               => array(
			'slug'       => 'konyvek',                          // URL slug.
			'with_front' => true,                               // Permalink előtag használata.
			'feeds'      => true,                               // RSS feed engedélyezése.
			'pages'      => true,                               // Lapozott archívum.
			'ep_mask'    => EP_PERMALINK,                       // Rewrite endpoint maszk.
		),
		'query_var'             => true,                              // Lekérdezhető query változóval.
		'can_export'            => true,                              // Exportálható.
		'delete_with_user'      => null,                              // Felhasználó törlésekor alapértelmezett működés.
		'template'              => array(),                           // Alapértelmezett blokk sablon.
		'template_lock'         => false,                             // Blokkok zárolása.
		'_builtin'              => false,                             // Belső WordPress post type jelzője.
		'_edit_link'            => 'post.php?post=%d',                // Admin szerkesztési URL.
	);

	register_post_type( 'wpfo_book', $args ); // Regisztrálja az egyedi bejegyzéstípust. Ez is legyen egyedi, felismerhető.
}
add_action( 'init', 'wpfo_register_books_cpt' ); // Az init hook-on futtatja a regisztráló függvényt.
