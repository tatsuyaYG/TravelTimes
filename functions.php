<?php

function mytheme_support() {

	// コアブロックの追加分のCSSを読み込む
	add_theme_support( 'wp-block-styles' );

	// テーマのCSS（style.css）をエディターに読み込む
	add_editor_style( 'style.css' );

}
add_action( 'after_setup_theme', 'mytheme_support' );


function mytheme_enqueue() {

	// テーマのCSS（style.css）をフロントに読み込む
	wp_enqueue_style(
		'mytheme-style',
		get_stylesheet_uri(),
		array(),
		filemtime( get_theme_file_path( 'style.css' ) )
	);

}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue' );

//ブロックスタイル
function mytheme_register_block_styles(){

	//見出し：丸付き飾り罫
	register_block_style(
		'core/heading',
		array(
			'name' => 'decoration-line',
			'label' => '丸付き飾り罫'
		)
	);

	//カテゴリー一覧：リストマークなし
	register_block_style(
		'core/categories',
		array(
			'name' => 'no-listmark',
			'label' => 'リストマークなし'
		)
	);
}
add_action( 'init', 'mytheme_register_block_styles' );
