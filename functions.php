<?php

//概要の文字数
function my_length($length) {
	return 100;
}

add_filter('excerpt_mblength','my_length');

//概要（抜粋）の省略記号
function my_more($more) {
	return '…';
}

add_theme_support('post-thumbnails');



//コンテンツの横幅
if ( !isset( $content_width ) ) {

	$content_width = 840;

}


//デフォルトスクリプト
function my_scripts() {
	if ( is_single() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// ウィジェット
register_sidebar( array(
	'id' => 'column01',
	'name' => 'フッターカラム01',
	'description' => '１段目に表示するウィジェットを指定。',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h1 class="widgettitle">',
	'after_title'   => '</h1>'
) );

register_sidebar( array(
	'id' => 'column02',
	'name' => 'フッターカラム02',
	'description' => '２段目に表示するウィジェットを指定。',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h1 class="widgettitle">',
	'after_title'   => '</h1>'
) );

register_sidebar( array(
	'id' => 'column03',
	'name' => 'フッターカラム03',
	'description' => '３段目に表示するウィジェットを指定。',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h1 class="widgettitle">',
	'after_title'   => '</h1>'
) );

//functions.php
function register_my_menus() { 
	register_nav_menus( array( //複数のナビゲーションメニューを登録する関数
	//'「メニューの位置」の識別子' => 'メニューの説明の文字列',
	  'main-menu' => 'Main Menu',
	  'footer-menu'  => 'Footer Menu',
	) );
  }
  add_action( 'after_setup_theme', 'register_my_menus' );

/* カスタム投稿タイプを追加 */

add_action( 'init', 'create_post_type' );

function create_post_type() {

    register_post_type( 'orijinal_themes', //カスタム投稿タイプ名を指定

        array(

            'labels' => array(

            'name' => __( 'ポートフォリオ一覧' ),

            'singular_name' => __( 'ポートフォリオ一覧' )

        ),

        'public' => true,

        'has_archive' => true, /* アーカイブページを持つ */

        'menu_position' =>5, //管理画面のメニュー順位

        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ,'comments' ),

        )

    );

/* カテゴリタクソノミー(カテゴリー分け)を使えるように設定する */

  register_taxonomy(

    'orijinal_themes_cat', /* タクソノミーの名前 */

    'orijinal_themes', /* 使用するカスタム投稿タイプ名 */

    array(

      'hierarchical' => true, /* trueだと親子関係が使用可能。falseで使用不可 */

      'update_count_callback' => '_update_post_term_count',

      'label' => 'オリジナルテーマ作成カテゴリー',

      'singular_label' => 'オリジナルテーマ作成カテゴリー',

      'public' => true,

      'show_ui' => true

    )

  );

/* カスタムタクソノミー、タグを使えるようにする */

  register_taxonomy(

    'orijinal_themes_tag', /* タクソノミーの名前 */

    'orijinal_themes', /* 使用するカスタム投稿タイプ名 */

    array(

      'hierarchical' => false,

      'update_count_callback' => '_update_post_term_count',

      'label' => 'オリジナルテーマ作成タグ',

      'singular_label' => 'オリジナルテーマ作成タグ',

      'public' => true,

      'show_ui' => true

    )

  );

}



	