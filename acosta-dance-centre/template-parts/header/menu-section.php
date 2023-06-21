<?php $doro_options = get_option('doro'); ?>
		<!-- Menu -->
		<nav id="doro-main-menu">
			<ul>
				<?php
					$defaults = array(
						'theme_location'  => 'main-menu',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'show_top_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '%3$s',
						'depth'           => 0,
						'walker'          => new Doro_Walker
						);

					$athers = array(
						'theme_location'  => 'top-menu',
						'menu'            => 'div',
						'container'       => 'ul',
						'container_class' => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'show_top_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '%3$s',
						'depth'           => 0,
						'walker'          => '',
						);					

				if(has_nav_menu('main-menu')) {
					wp_nav_menu( $defaults );
				}
				else if(has_nav_menu('top-menu')){
					wp_nav_menu( $athers );
				}
				?>			
			</ul>
		</nav>
