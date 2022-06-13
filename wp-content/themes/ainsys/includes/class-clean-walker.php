<?php
/**
 * Menu walker with tabs.
 *
 * @package astrum
 */

/**
 * Menu walker with tabs.
 *
 * @package astrum
 */
class Clean_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string         $output Used to append additional content (passed by reference).
	 * @param int            $depth  Depth of menu item. Used for padding.
	 * @param stdClass|array $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		if ( isset( $args->tab_space ) && $args->tab_space > 0 ) {
			$depth = $depth + intval( $args->tab_space );
		}
		$depth++;
		$indent = str_repeat( $t, $depth );

		$output .= "{$n}{$indent}" . '<ul class="menu__submenu" aria-label="' . $this->aria_submenu_label . '">' . "{$n}";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string         $output Used to append additional content (passed by reference).
	 * @param int            $depth  Depth of menu item. Used for padding.
	 * @param stdClass|array $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		if ( isset( $args->tab_space ) && $args->tab_space > 0 ) {
			$depth = $depth + intval( $args->tab_space );
		}
		$depth++;

		$indent  = str_repeat( $t, $depth );
		$output .= "$indent</ul>{$n}";
	}

	/**
	 * Starts the element output.
	 *
	 * @param string         $output Used to append additional content (passed by reference).
	 * @param WP_Post        $item   Menu item data object.
	 * @param int            $depth  Depth of menu item. Used for padding.
	 * @param stdClass|array $args   An object of wp_nav_menu() arguments.
	 * @param int            $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		// to shift LI inside submenu.
		if ( $depth > 0 ) {
			$depth ++;
		}
		// to add starting space.
		if ( isset( $args->tab_space ) && $args->tab_space > 0 ) {
			$depth = $depth + intval( $args->tab_space );
		}

		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if ( false !== array_search( 'menu-item', $classes, true ) ) {
			$classes[] = 'menu__item';
		}
		if ( false !== array_search( 'menu-item-has-children', $classes, true ) ) {
			$classes[] = 'menu__item--has-children';
		}
		if ( false !== array_search( 'current-menu-item', $classes, true ) ) {
			$classes[] = 'current';
		}





		$has_children = ( false !== array_search( 'menu-item-has-children', $classes, true ) || false !== array_search( 'menu__item--has-children', $classes, true ) );

		// remove unnecessary classes.
		$classes = array_filter(
			$classes,
			function( $class_name ) {



				if ('tooltips__item' === $class_name ||  'warning' === $class_name || 'beta' === $class_name ||  'menu__item' === $class_name || 'disabled' === $class_name || 'partner' === $class_name || 'developer' === $class_name || 'client'===$class_name || 'current' === $class_name || 'menu__item--has-children' === $class_name ) {
					return true;
				} else {

					return false;
				}


			}
		);

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

        $tooltip_text = get_field('tooltip_text', $item);
        if($tooltip_text != "") {
            $class_names = $class_names.' tooltips__item';
        }

		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$class_names = str_replace( 'menu-item', 'menu__item', $class_names );
		$class_names = str_replace( 'menu-item-has-children', 'menu__item--has-children', $class_names );


		

		$output .= $n . $indent . '<li' . $class_names . '>';


		//var_dump($tooltip_text);

		if($tooltip_text != "") {
            $output .= '<div class="tooltips tooltips__header">'.$tooltip_text.'</div>';
        }

		//$output .= '<div class="tooltips tooltips__header">Test tooltip</div>';

		$atts           = array();
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href'] = ! empty( $item->url ) ? $item->url : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		if ( $has_children ) {

			$this->aria_submenu_label = esc_attr( $title );

			if ( empty( $atts['href'] ) ) {
				$atts['href']       = '#';
				$atts['aria-label'] = 'Toggle ' . $this->aria_submenu_label;
			}
		}

		// <a>.
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output  = $n;
		$item_output .= $indent . $t;
		if ( isset( $args ) && is_object( $args ) ) {
			$item_output .= $args->before;
		}
		$item_output .= '<a class="menu__link"' . $attributes . '>';
		if ( isset( $args ) && is_object( $args ) ) {
			$item_output .= $args->link_before . $title . $args->link_after;
		}
		$item_output .= '</a>';
		if ( isset( $args ) && is_object( $args ) ) {
			$item_output .= $args->after;
		}
		$item_output .= $n;

		if ( $has_children ) {
			$item_output .= $indent . $t;
			$item_output .= '<a class="menu__submenu-toggler" href="#"  aria-label="Toggle ' . $this->aria_submenu_label . ' "></a>';

		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @param string         $output Used to append additional content (passed by reference).
	 * @param WP_Post        $item   Page data object. Not used.
	 * @param int            $depth  Depth of page. Not Used.
	 * @param stdClass|array $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$initial_depth = $depth;
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		// to shift LI in Submenu.
		if ( $depth > 0 ) {
			$depth ++;
		}
		// to add starting space.
		if ( isset( $args->tab_space ) && $args->tab_space > 0 ) {
			$depth = $depth + intval( $args->tab_space );
		}
		$indent = str_repeat( $t, $depth );

		$output .= $indent;
		$output .= "</li>{$n}";
		if ( $initial_depth < 1 ) {
			if ( $depth > 0 ) {
				$depth--;
			}
			$output .= str_repeat( $t, $depth );
		}

	}

} // Clean_Walker
