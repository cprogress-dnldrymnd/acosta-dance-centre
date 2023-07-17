<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Product Category Options
/*-----------------------------------------------------------------------------------*/
Container::make('term_meta', __('Category Properties'))
  ->where('term_taxonomy', '=', 'category')
  ->add_fields(
    array(
      Field::make('text', 'alt_title', __('Alt Title')),
      Field::make('checkbox', 'is_classes', __('Is Classes'))
      ->set_help_text('Check if this category is classes'),
    ));