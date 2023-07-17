<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Page Options
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Page Options')
  ->where('post_type', '=', 'page')
  ->set_context('side')
  ->add_fields(
    array(
      Field::make('select', 'page_theme', 'Page Theme')
        ->set_options(
          array(
            'background-body'  => 'Light',
            'background-black' => 'Dark',
          )
        ),
      Field::make('select', 'header_type', 'Header Type')
        ->set_options(
          array(
            'background-white'       => 'Light',
            'background-black'       => 'Dark',
            'background-transparent' => 'Transparent',
          )
        ),




      //Field::make('checkbox', 'hide_page_banner', 'Hide Page Banner'),
    )
  );