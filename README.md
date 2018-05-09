# WP Swift: Call to Actions

 * Plugin Name: WP Swift: Call to Actions
 * Plugin URI: https://github.com/wp-swift-wordpress-plugins/wp-swift-call-to-actions
 * Description: Placeholder description.
 * Version: 1
 * Author: Gary Swift
 * Author URI: https://github.com/wp-swift-wordpress-plugins
 * License: GPL2

## Features
Placeholder description.

## Usage

```php
if ( have_posts() ) : 
	$callout = false;
	if (function_exists("wp_swift_get_call_to_actions") && function_exists("wp_swift_get_show_at_count")) {
		$i = 0; 
		$call_to_actions = wp_swift_get_call_to_actions();
		$show_at_count = wp_swift_get_show_at_count();
		$callout = true;
	}
	/* Start the Loop */
	while ( have_posts() ) : 
		the_post(); 
		get_template_part( 'template-parts/content', get_post_format() );
		if ($callout) {
			$i++;
		 	wp_swift_callout($i, $show_at_count, $call_to_actions);
		} 
	endwhile;

endif; // End have_posts() check.
```

## Licence
This project is licensed under the MIT license.

Copyright 2017 Gary Swift https://github.com/GarySwift

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

https://opensource.org/licenses/MIT