<?php

register_activation_hook( plugin_dir_path(__FILE__) . 'abv-portfolio.php', 'abv_add_roles' );

function abv_add_roles() {
    global $wp_roles; // Глобальный объект, который хранит описание всех ролей

    $contributor = $wp_roles->get_role('contributor'); // Получить описание роли Contributor

    $role = $wp_roles->get_role('abv_trusted_users');

    if ( !is_a($role, 'WP_Role') ) {
      $role = add_role(
          'abv_trusted_users',
          __('Trusted Users', 'text_domain'),
          $contributor->capabilities // добавляем те же возможности, что и у роли Contributor
      );
    }

    $role->add_cap('publish_posts', true); // дополнительные возможности


    // Получить роль Администратора
    $administrator = $wp_roles->get_role('administrator'); // Получить описание роли Contributor


    $administrator->add_cap('edit_portfolio', true); // дополнительные возможности
    $administrator->add_cap('read_portfolio', true); // дополнительные возможности
    $administrator->add_cap('delete_portfolio', true); // дополнительные возможности
    $administrator->add_cap('edit_portfolio', true); // дополнительные возможности
    $administrator->add_cap('edit_others_portfolio', true); // дополнительные возможности
    $administrator->add_cap('publish_portfolio', true); // дополнительные возможности
    $administrator->add_cap('read_private_portfolio', true); // дополнительные возможности

    // Разрешить Подписчику работать с портфолио
    $subscriber = $wp_roles->get_role('subscriber'); // Получить описание роли Contributor

    $subscriber->add_cap('edit_portfolio', true); // дополнительные возможности
    $subscriber->add_cap('read_portfolio', true); // дополнительные возможности
    $subscriber->add_cap('delete_portfolio', true); // дополнительные возможности
    $subscriber->add_cap('edit_portfolio', true); // дополнительные возможности
    $subscriber->add_cap('edit_others_portfolio', true); // дополнительные возможности
    $subscriber->add_cap('publish_portfolio', true); // дополнительные возможности
    $subscriber->add_cap('read_private_portfolio', true); // дополнительные возможности
}
