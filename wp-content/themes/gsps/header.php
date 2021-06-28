<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GSPs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="text-gray-900 leading-tight">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?> x-data="{ isOpen : false, atTop: true, openSearch: false}" x-on:scroll.window="atTop = (window.pageYOffset > 100) ? false : true; ">

<?php wp_body_open(); ?>
	
<div id="page" class="site">
	<!-- header -->
	<header class="header px-0 fixed w-full z-50 bg-teal">
		<!-- container -->
		<div class="relative container mx-auto">
			<!-- header wrapper -->
				<div class="header-wrapper flex items-center transition-all duration-100 ease-in h-20" x-bind:class="{ 'h-16 shadow-lg': !atTop, 'h-20': atTop }">
				

					<!-- header logo -->
					<div class="header-logo flex-none mr-20 pl-8 lg:pl-10">
						<a href="<?php echo get_home_url(); ?>">
							<div class="text-3xl font-semibold text-gray-100">GSP</div>
							<p class="text-sm text-gray-100">Global Skill Partnerships</p>
						</a>
					</div>

					<!-- Navbar -->
					<navbar class="navbar flex-grow hidden lg:block flex-grow-0 p-4">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'container'		 => false,
								'menu_class'	 => 'flex space-x-8 text-sm font-semibold text-gray-100'
							)
						);
					?>
					</navbar>

					<!-- mobile toggle -->
					<div class="toggle lg:hidden ml-auto pr-8">
						<button @click=" isOpen = true" @keydown.escape=" isOpen = false">
							<svg 
								class="h-6 w-6 fill-current text-gray-100"
								fill="none" stroke-linecap="round" 
								stroke-linejoin="round" stroke-width="2" 
								viewBox="0 0 24 24" stroke="currentColor">
								<path d="M4 6h16M4 12h16M4 18h16"></path>
							</svg>
						</button>
					</div>

					<!-- Search & Logo -->
					<navbar class="navbar flex-none hidden lg:block ml-auto h-full">
						<ul class="flex items-center space-x-8 text-sm h-full pr-8 lg:pr-10">
							<li><a href="/learn-more" class="px-4 py-3 border-solid border border-gray-100 text-gray-100 font-semibold hover:text-gray-300">Learn More</a></li>
							<li><a href="/start-a-gsp" class="px-4 py-3 bg-yellow text-gray-800 font-semibold hover:bg-yellow-300">Start a GSP</a></li>
							<li class="text-gray-100 font-semibold h-full flex items-center">
								<button @click=" openSearch = true" @keydown.escape=" openSearch = false" class="text-teal">
									<svg class="h-5 w-5 text-gray-100 hover:text-gray-300" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
									</svg>
								</button>
							</li>
							<li><a href="#"><img class="w-24 md:w-24 lg:w-24" src="<?php echo get_template_directory_uri(); ?>/resources/img/logo-cgd-white.png"></a></li>
						</ul>
					</navbar>

					
					

				</div>
				
		</div>

	</header><!-- end header -->
	
	<!-- mobile navbar -->
	<div class="mobile-navbar">         

		<!-- navbar wrapper -->
		<div style="display:none;" class="navbar-wrapper fixed top-0 left-0 h-full bg-white z-50 w-64 shadow-lg p-5" 
			x-show="isOpen" 
			@click.away=" isOpen = false"
			x-transition:enter="transition duration-300 -ml-64" 
			x-transition:enter-start=""
			x-transition:enter-end="transform translate-x-64"
			x-transition:leave="transition duration-300"
			x-transition:enter-start=""
			x-transition:leave-end="transform -translate-x-64">
			<div class="close">
				<button class="absolute top-0 right-0 mt-4 mr-4" @click=" isOpen = false">
					<svg 
						class="w-6 h-6"
						fill="none" stroke-linecap="round" 
						stroke-linejoin="round" stroke-width="2" 
						viewBox="0 0 24 24" stroke="currentColor">
						<path d="M6 18L18 6M6 6l12 12"></path>
				</svg>
				</button>
			</div>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'mobile_nav',
						'menu_id'        => 'mobile',
						'container'		 => false,
						'menu_class'	 => 'divide-y'
					)
				);
			?>
		</div>
	</div><!-- end mobile navbar -->

	<div style="display:none;" class="fixed z-50 h-screen w-screen opacity-90 bg-teal text-white toggle pr-8" x-show="openSearch" 
	@click.away=" openSearch = false"
	x-transition:enter="transition ease-in-out duration-300" 
	x-transition:enter-start="opacity-0 transform scale-y-0 -translate-y-1/2" 
	x-transition:enter-end="opacity-90 transform scale-y-100 translate-y-0" 
	x-transition:leave="transition" 
	x-transition:leave-start="opacity-100 transform scale-y-100 translate-y-0" 
	x-transition:leave-end="opacity-0 transform scale-y-0 -translate-y-1/2">
	<div class="close">
		<button class="fixed top-0 right-0 mt-4 mr-4" @click=" openSearch = false">
			<svg 
				class="w-24 h-24"
				fill="none" stroke-linecap="round" 
				stroke-linejoin="round" stroke-width="2" 
				viewBox="0 0 24 24" stroke="currentColor">
				<path d="M6 18L18 6M6 6l12 12"></path>
		</svg>
		</button>
	</div>
	<div class="flex justify-center items-center align-center h-full w-full">
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
				<input type="search" class="search-field placeholder-white bg-transparent border-0 border-b border-white text-white md:text-5xl"
					placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
					value="<?php echo get_search_query() ?>" name="s"
					title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
			</label>
			<input type="submit" class="search-submit cursor-pointer bg-transparent border-0 md:text-5xl md:w-24"
				value="<?php echo esc_attr_x( '>', 'submit button' ) ?>" />
		</form>
	</div>
	
	</div>