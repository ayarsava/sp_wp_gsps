<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

get_header();
?>



<!-- hero -->
<div class="hero bg-gray-100 py-16 pt-32">
    <!-- container -->
    <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
        <!-- hero wrapper -->
        <div class="hero-wrapper">

            <!-- hero text -->
            <div class="hero-text col-span-12 text-center relative pt-10 mx-auto">
                <div class="relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/media/samples/people-01.png" class="w-full absolute z-10 left-0 right-0 top-20 mx-auto">
                    <h1 class="font-bold text-6xl md:text-8xl max-w-5xl text-gray-900 leading-none xl:leading-tight mx-auto text-teal">
                        <span class="md:bg-clip-text md:text-transparent md:bg-gradient-to-r md:from-teal md:to-teal-light">
                            Migration that works for everyone.
                        </span>
                    </h1>
                </div>
                <div class="relative">
                    <p class="text-md md:text-xl text-gray-800 text-base leading-relaxed mt-8 font-semibold max-w-3xl mx-auto">The Global Skill Partnership is a migration model that brings countries together to ensure migration contributes to development for all. In the model, both countries of origin and destination get new workers, with needed skills, to help businesses grow and thrive. But that’s not all.</p>
                    
                    <lottie-player id="people1Lottie" class="w-56 md:h-48 xl:h-60 absolute z-10 left-0  sm:top-10 md:top-10 lg:top-10 xl:top-0" src="<?php echo get_template_directory_uri(); ?>/media/samples/people-04.json">"></lottie-player>

                    <lottie-player id="people2Lottie" class="w-56 md:h-48 xl:h-60 absolute z-10 right-0  sm:top-10 md:top-10 lg:top-10 xl:top-0" src="<?php echo get_template_directory_uri(); ?>/media/samples/people-05.json">"></lottie-player>

                    <lottie-player id="people3Lottie" class="w-56 md:h-48 xl:h-60 absolute z-10 right-1/3  sm:top-10 md:top-10 lg:top-10 xl:top-14" src="<?php echo get_template_directory_uri(); ?>/media/samples/people-06.json">"></lottie-player>


                </div>
            </div>
        </div>
    </div>
</div><!-- end hero -->

<!-- hero 2 -->
<div class="bg-gray-100 pt-10 overflow-hidden">
    <!-- container -->
    <div class="container px-4 sm:px-8 lg:px-60 xl:px-80 mx-auto">
        <!-- lottie animantion 1 wrapper -->
        <div class="hero-wrapper flex flex-row space-x-8 items-center">
            <!-- lottie animantion 1 -->
            <div class="flex-1 hero-image max-w-xs relative">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" class="absolute opacity-20 w-96 md:w-96 lg:w-96 -inset-20"><path d="M81.77,83.39c-28.67,17.47-45.66,49.51-43,83C40.18,183.48,46.54,200,63.35,209c44.83,24,240.55,24.45,269.51-18s18.19-102.84-44.8-128C233.46,41.18,155.82,38.3,81.77,83.39Z" fill="#01697f" opacity="0.3"></path></svg>
                <lottie-player id="firstLottie"  data-aos="fade-right" data-aos-offset="100" class="relative w-60 md:w-60 lg:w-60" src="<?php echo get_template_directory_uri(); ?>/media/samples/ilustracion1.json" style="width:100%; max-height: 350px;">"></lottie-player>
            </div>
            <!-- lottie animantion 1 text -->
            <div class="flex-1 hero-text">
                <p class="text-md md:text-xl text-gray-800 leading-relaxed mt-8 font-semibold">Countries of origin get support for their broader development goals</p>
            </div>
        </div>

        <!-- lottie animantion 2 wrapper -->
        <div class="hero-wrapper flex flex-row space-x-8 items-center">
            <!-- lottie animantion 2 text -->
            <div class="flex-1 hero-text text-right">
                <p class="text-md md:text-xl text-gray-800 leading-relaxed mt-8 font-semibold">Countries of destination get to manage migration in a safe, legal, and ethical way</p>
            </div>
            <!-- lottie animantion 2 -->
            <div class="flex-1 hero-image max-w-xs relative">
                <lottie-player id="secondLottie" data-aos="fade-in" data-aos-offset="100" class="relative w-60 md:w-60 lg:w-60" src="<?php echo get_template_directory_uri(); ?>/media/samples/ilustracion2.json" style="width:100%; max-height: 350px;">"></lottie-player>
            </div>
        </div>

        <!-- lottie animantion 3 wrapper -->
        <div class="hero-wrapper flex flex-row space-x-8 items-center">
            <!-- lottie animantion 3 -->
            <div class="flex-1 hero-image max-w-xs relative">
                <lottie-player id="thirdLottie" data-aos="fade-right" data-aos-offset="100" class="relative w-60 md:w-60 lg:w-60" src="<?php echo get_template_directory_uri(); ?>/media/samples/ilustracion3.json" style="width:100%; max-height: 350px;">"></lottie-player>
            </div>
            <!-- lottie animantion 3 text -->
            <div class="flex-1 hero-text">
                <p class="text-md md:text-xl text-gray-800 leading-relaxed mt-8 font-semibold">And trainees get access to safe migration pathways, new opportunities, and better lives</p>
            </div>
        </div>
    </div>
</div><!-- end hero -->

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#f3f4f6" fill-opacity="1" d="M0,128L1440,96L1440,0L0,0Z"></path></svg>

<!-- hero 3 -->
<div class="bg-white pb-10">
    <!-- container -->
    <div class="container px-20 mx-auto">
        <p class="sm:px-8 lg:px-60 xl:px-60 mx-auto text-gray-800 font-semibold leading-relaxed  text-center text-md md:text-xl mb-20">Global Skill Partnerships meet global skill shortages by providing targeted training in countries of origin and helping some of the trainees move.</p>
        <!-- hero wrapper -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-28 gap-y-10 mb-20">
            <!-- hero image -->
            <div class="flex-1 hero-image text-center">
                <img class="w-24 md:w-24 lg:w-24 mx-auto mb-4" src="<?php echo get_template_directory_uri(); ?>/resources/images/icon-net.png">
                <div class="font-semibold mb-2">Flexible</div>
                <p class="text-gray-800 text-sm mb-2">They adapt to the needs of the cooperating countries, working around old structures and building new ones.</p>
            </div>
            <div class="flex-1 hero-image text-center">
                <img class="w-24 md:w-24 lg:w-24 mx-auto mb-4" src="<?php echo get_template_directory_uri(); ?>/resources/images/icon-target.png">
                <div class="font-semibold mb-2">Market-led</div>
                <p class="text-gray-800 text-sm mb-2">They are driven by the demands of employers and supply of employees, especially in mid-skill sectors like construction, healthcare, hospitality, and IT.</p>
            </div>
            <div class="flex-1 hero-image text-center">
                <img class="w-24 md:w-24 lg:w-24 mx-auto mb-4" src="<?php echo get_template_directory_uri(); ?>/resources/images/icono-fire.png">
                <div class="font-semibold mb-2">Proactive</div>
                <p class="text-gray-800 text-sm mb-2">They equip people with the skills they need before they move, making sure migration happens in a managed way while encouraging integration.</p>
            </div>
        </div>

        <div class="w-full px-10 text-center">
            <div class="md:flex md:justify-center mt-6">
                <a class="mb-3 px-4 py-3 md:mx-4 bg-teal text-gray-200 font-semibold hover:bg-gray-800 block" href="/start-a-gsp">START A GSP</a>
                <a class="mb-3 px-4 py-3 md:mx-4 bg-gray-300 text-gray-900 font-semibold hover:bg-gray-400 block" href="#">Learn More</a>
            </div>
        </div>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"><path fill="#f3f4f6" fill-opacity="1" d="M0,0L1440,32L1440,220L0,220Z"></path></svg>

<!-- GSP in Action-->
<div id="gsp-in-action" class="relative bg-gray-100  pb-20">
    <div class="text-center sm:mx-auto md:absolute md:transform md:-rotate-90 md:top-8 md:-left-2 mb-10">
        <div class="text-base font-semibold">GSP in Action</div>
    </div>

    <!-- container slider -->
    <div class="container">
        <div class="relative container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php wp_front_pilot(); ?>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

     <!-- container stories -->  
     <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mt-10">
        <div class="grid md:grid-cols-4 md:grid-rows-6 gap-4 fp-stories">
            <?php wp_front_posts_per_category(6,'gsp-in-action',0); ?>
            <div href="#" class="flex flex-col justify-between bg-teal-light p-8 grid-rows-auto" title="Join the linkedIn Group">
                <h4 class="text-large font-semibold text-gray-100 leading-tight">LinkedIn Group</h4>

                <a class="px-4 py-3 border border-light-blue-500 border-opacity-40 text-center text-gray-200 font-semibold hover:bg-yellow hover:text-gray-900" href="#">Join the conversation</a>
            </div>
        </div>
    </div>

</div>

<!-- Resources-->
<div id="resources" class="relative bg-white py-20 overflow-hidden">
    <div class="text-center sm:mx-auto md:absolute md:transform md:-rotate-90 md:top-28 md:left-0 mb-10">
        <div class="text-base font-semibold">Resources</div>
    </div>

     <!-- container stories -->  
     <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
        <div class="grid grid-cols-3 gap-4">
            <?php wp_front_resources(); ?>
        </div>
    </div>
</div>



<div id="migration-pathways" class="relative py-20 bg-brown">
    <div class="text-center sm:mx-auto md:absolute md:transform md:-rotate-90 md:top-36 md:-left-8 text-base text-white font-semibold">
        Migration pathways
    </div>

     <!-- container stories -->  
     <!--mapa-->
    <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
        <h3 class="text-md md:text-xl text-gray-200 leading-relaxed font-semibold">Lorem ipsum dolor sit</h3>
        <p class="w-7/12 text-sm md:text-normal text-gray-200 leading-relaxed mt-4 mb-8 font-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Eos, voluptatum dolorum! Laborum blanditiis consequatur, voluptates, sint enim fugiat saepe, dolor fugit, magnam explicabo eaque quas id</p>
        <div class="md:flex max-h-screen bg-no-repeat bg-center bg-cover rounded shadow-xl " style="background-image: url('<?php echo get_template_directory_uri(); ?>/media/samples/sample-mapa.png'); height:600px;">
        </div>
    </div>
</div>

<?php
get_footer();
