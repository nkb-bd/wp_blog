<?php

if (! isset($selector)) {
	$selector = ':root';
}

$max_site_width = get_theme_mod( 'maxSiteWidth', 1290 );
$css->put(
	':root',
	'--container-max-width: ' . $max_site_width . 'px'
);

$narrowContainerWidth = get_theme_mod( 'narrowContainerWidth', 750 );
$css->put(
	':root',
	'--narrow-container-max-width: ' . $narrowContainerWidth . 'px'
);

$wideOffset = get_theme_mod( 'wideOffset', 130 );
$css->put(
	':root',
	'--wide-offset: ' . $wideOffset . 'px'
);

$contentSpacingMap = [
	'none' => '0',
	'compact' => '0.8em',
	'comfortable' => '1.5em',
	'spacious' => '2em',
];

$contentSpacing = get_theme_mod('contentSpacing', 'comfortable');

$contentSpacing = isset(
	$contentSpacingMap[$contentSpacing]
) ? $contentSpacingMap[$contentSpacing] : $contentSpacingMap['comfortable'];

$css->put(':root', '--content-spacing: ' . $contentSpacing);

blocksy_theme_get_dynamic_styles([
	'name' => 'admin/colors',
	'css' => $css,
	'mobile_css' => $mobile_css,
	'tablet_css' => $tablet_css,
	'context' => $context,
	'chunk' => 'admin',
	'selector' => $selector
]);

if (
	function_exists('get_current_screen')
	&&
	get_current_screen()
	&&
	get_current_screen()->is_block_editor()
) {
	if (get_current_screen()->base === 'post') {
		blocksy_theme_get_dynamic_styles([
			'name' => 'admin/editor',
			'css' => $css,
			'mobile_css' => $mobile_css,
			'tablet_css' => $tablet_css,
			'context' => $context,
			'chunk' => 'admin'
		]);
	}

	blocksy_theme_get_dynamic_styles([
		'name' => 'global/typography',
		'css' => $css,
		'mobile_css' => $mobile_css,
		'tablet_css' => $tablet_css,
		'context' => 'inline',
		'chunk' => 'admin'
	]);

	blocksy_output_responsive([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => ':root',
		'variableName' => 'buttonMinHeight',
		'value' => get_theme_mod('buttonMinHeight', 40)
	]);

	blocksy_output_spacing([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => ':root',
		'property' => 'buttonBorderRadius',
		'value' => get_theme_mod( 'buttonRadius',
			blocksy_spacing_value([
				'linked' => true,
				'top' => '3px',
				'left' => '3px',
				'right' => '3px',
				'bottom' => '3px',
			])
		)
	]);

	blocksy_output_spacing([
		'css' => $css,
		'tablet_css' => $tablet_css,
		'mobile_css' => $mobile_css,
		'selector' => ':root',
		'property' => 'button-padding',
		'value' => get_theme_mod( 'buttonPadding',
			blocksy_spacing_value([
				'linked' => false,
				'top' => '5px',
				'left' => '20px',
				'right' => '20px',
				'bottom' => '5px',
			])
		)
	]);
}
