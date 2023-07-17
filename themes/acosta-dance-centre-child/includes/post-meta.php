<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

/*-----------------------------------------------------------------------------------*/
/* Product Category Options
/*-----------------------------------------------------------------------------------*/
Container::make('term_meta', __('Category Properties'))
  ->where('term_taxonomy', '=', 'product_cat')
  ->add_fields(
    array(
      Field::make('text', 'alt_title', __('Alt Title')),
      Field::make('checkbox', 'is_classes', __('Is Classes'))
        ->set_help_text('Check if this category is classes'),
    )
  );
/*-----------------------------------------------------------------------------------*/
/* Product Category Options
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Classes Settings'))
->set_page_parent('edit.php?post_type=product')
  ->add_fields(
    array(
      Field::make('association', 'featured_classes', __('FEATURED CLASSES'))
        ->set_types(
          array(
            array(
              'type'      => 'post',
              'post_type' => 'product',
            )
          )
        ),
    )
  );