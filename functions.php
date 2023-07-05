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

	//投稿日：時計アイコン
	register_block_style(
		'core/post-date',
		array(
			'name' => 'clock-icon',
			'label' => '時計アイコン'
		)
	);

	//次の投稿：ラベル逆配置
	register_block_style(
		'core/post-navigation-link',
		array(
			'name' => 'reverse',
			'label' => 'ラベル逆配置'
		)
	);

	//テンプレートパーツ：上マージン削除
	register_block_style(
		'core/template-part',
		array(
			'name' => 're-margin-top',
			'label' => '上マージン削除'
		)
	);

	//段落：スクロールダウン
	register_block_style(
		'core/paragraph',
		array(
			'name' => 'scroll-down',
			'label' => 'スクロールダウン'
		)
	);

	//カラム：モバイル逆順
	register_block_style(
		'core/columns',
		array(
			'name' => 'reverse',
			'label' => 'モバイル逆順'
		)
	);
}
add_action( 'init', 'mytheme_register_block_styles' );
