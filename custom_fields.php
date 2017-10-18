<?php
/*
Custom fields
*/

add_action('add_meta_boxes_abv_portfolio', 'abv_add_metabox');

function abv_add_metabox($post) {
    add_meta_box(
        'abv-portfolio-fields',
        __( 'Portfolio Info', 'abv-portfolio' ),
        'abv_render_metabox',
        'abv_portfolio',
        'side',
        'default'
    );
}

function abv_render_metabox($post) {
    $date   = get_post_meta($post->ID, '_abv_portfolio_date', true);
    $url    = get_post_meta($post->ID, '_abv_portfolio_url', true);

    ?>

    <p>
        <label for="_abv_portfolio_date"><?=__('Creation date', 'abv-portfolio')?></label><br>
        <input type="text" name="_abv_portfolio_date" id="_abv_portfolio_date" value="<?=$date;?>">
    </p>

    <p>
        <label for="_abv_portfolio_url"><?=__('Url', 'abv-portfolio')?></label><br>
        <input type="text" name="_abv_portfolio_url" id="_abv_portfolio_url" value="<?=$url;?>">
    </p>

    <?php
}

add_action('save_post', 'abv_portfolio_save');

function abv_portfolio_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    $date   = isset($_POST['_abv_portfolio_date']) ? sanitize_text_field( $_POST['_abv_portfolio_date'] ) : '';
    $url    = isset($_POST['_abv_portfolio_url']) ? sanitize_text_field( $_POST['_abv_portfolio_url'] ) : '';

    // Update the meta field.
    update_post_meta( $post_id, '_abv_portfolio_date', $date );
    update_post_meta( $post_id, '_abv_portfolio_url', $url );
}

add_filter( 'manage_abv_portfolio_posts_columns' , 'abv_show_posts_columns', 10 );

function abv_show_posts_columns( $columns ) {
    $columns['date_column'] = __( 'Portfolio Date', 'abv-portfolio' );
    $columns['url_column'] = __( 'Portfolio Url', 'abv-portfolio' );

    return $columns;
}

add_action( 'manage_abv_portfolio_posts_custom_column' , 'abv_posts_columns_content1', 10, 2 );

function abv_posts_columns_content1( $column, $post_id ) {
    if ($column == 'date_column') {
        echo get_post_meta($post_id, '_abv_portfolio_date', true);
    }
}
