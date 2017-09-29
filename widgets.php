<?php

class ABV_Portfolio_Widget extends WP_Widget {
  public function __construct() {
      $args = array(
          'classname' => 'abv_portfolio_widget',
          'description' => __('Displays latest Portfolio items', 'abv-portfolio'),
      );

      parent::__construct(
        'abv_portfolio_widget',
        __('Portfolio Items', 'abv-portfolio'),
        $args
      );
  }

  public function form($instance) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $num_items = ! empty( $instance['num_items'] ) ? $instance['num_items'] : 3;
    ?>
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'abv-portfolio' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'num_items' ) ); ?>"><?php esc_attr_e( 'Number of items:', 'abv-portfolio' ); ?></label>

        <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'num_items' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_items' ) ); ?>" >
          <?php for ($i = 1; $i <= 10; $i++): ?>
            <option <?php if ($num_items == $i) echo 'selected="selected"'?> ><?=$i?></option>
          <?php endfor; ?>
        </select>
    </p>
    <?php
  }

  public function widget($args, $instance) {
    echo $args['before_widget'];

    $title = ! empty( $instance['title'] ) ? $instance['title'] : __('Latest portfolio', 'abv-portfolio');
    $num_items = ! empty( $instance['num_items'] ) ? $instance['num_items'] : 3;

    if ( ! empty( $title ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
    }

    $params = [
      'post_type'   => 'abv_portfolio',
      'post_status' => 'publish',
      'orderby'     => 'date',
      'order'       => 'DESC',
      'posts_per_page' => $num_items,
    ];

    $query = new WP_Query($params);

    foreach ($query->posts as $portfolio) {
      ?>
      <p>
        <a href="<?=get_the_permalink($portfolio->ID);?>"><?=get_the_title($portfolio->ID);?></a>
      </p>
      <?php
    }

    echo $args['after_widget'];
  }
}


add_action( 'widgets_init', 'abv_register_widgets');

function abv_register_widgets() {
    register_widget( 'ABV_Portfolio_Widget' );
}
