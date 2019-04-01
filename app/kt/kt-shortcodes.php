<?php

namespace Kt;

/**
 * Email [email]name@domain.com[/email]
 */
function sc_email( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}
	return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'email',  __NAMESPACE__ . '\\sc_email' );


/**
 * Button [button url="url-value" tip="primary"]Button content here[/button]
 */
function sc_button( $atts, $content = null ) {
    $button = shortcode_atts( array( 
        'url' => '',
        'tip' => 'primary',
        'size' => '',
    ), $atts );
    
    if ( $button['tip'] == 'primary' ) { $tip = 'btn-primary'; } elseif ( $button['tip'] == 'secondary' ) { $tip = 'btn-secondary'; } elseif ( $button['tip'] == 'success' ) { $tip = 'btn-success'; } elseif ( $button['tip'] == 'info' ) { $tip = 'btn-info'; } elseif ( $button['tip'] == 'warning' ) { $tip = 'btn-warning'; } elseif ( $button['tip'] == 'danger' ) { $tip = 'btn-danger'; } elseif ( $button['tip'] == 'link' ) { $tip = 'btn-link'; } ;
    if ( $button['size'] == '' ) { $size = ''; } elseif ( $button['size'] == 'sm' ) { $size = 'btn-sm'; } elseif ( $button['size'] == 'lg' ) { $size = 'btn-lg'; };
        
    if ( $button['url'] != '') {
        return '<a class="btn '.$tip.' '.$size.'" href="' . $button['url'] . '">' . $content . '</a>';
    } else {
        return '<button class="btn '.$tip.' '.$size.'">' . $content . '</button>';
    }
}
add_shortcode( 'button', __NAMESPACE__ . '\\sc_button' );


/**
 * Icons [i type="far fa-phone"]01 / 123 45 67[/i]
 */
function sc_icon( $atts, $content = null ) {
	$content = do_shortcode($content);
	$icon = shortcode_atts( array(
	'type' => '',
  ), $atts );
  return '<span class="icon-sc"><i class="' . $icon['type'] . '"></i><span class="icon-text">'  .$content . '</span></span>';
}
add_shortcode( 'i', __NAMESPACE__ . '\\sc_icon' );


/**
 * Accordion [accordion id="01" title="Some text goes in here"]In content bannner title here[/accordion]
 */
function sc_acc( $atts, $content = null ) {
    $content = do_shortcode($content);
    $accordion = shortcode_atts( array(
        'h' => 'h3',
        'id' => '01',
        'title' => '',
        'show' => '',
    ), $atts );

    return '<article class="article-acc">
                <a class="entry-tab collapsed" data-toggle="collapse" href="#collapse-'.$accordion['id'].'" aria-expanded="false" aria-controls="collapse-'.$accordion['id'].'"><'.$accordion['h'].' class="entry-acc no-sq"><span class="q-title">'.$accordion['title'].'</span><span class="oc pull-right"><span class="oc-plus">&plus;</span><span class="oc-minus">&minus;</span></span></'.$accordion['h'].'></a>
                <div class="collapse '.$accordion['show'].'" id="collapse-'.$accordion['id'].'">
                    <div class="entry-summary">' . $content . '</div>
                </div>
            </article>';
}
add_shortcode( 'accordion', __NAMESPACE__ . '\\sc_acc' );
