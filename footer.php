<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digitalia
 */

?>


</div><!-- #page -->

<?php
// Get CTAs from options page
if (function_exists('get_field')) {
    require_once get_template_directory() . '/inc/admin/post-type-utils.php';
    
    $ctas = get_field('ctas', 'option');
    if ($ctas) {
        $current_page_id = get_queried_object_id();
        $current_post_type = get_post_type();
        
        foreach ($ctas as $cta) {
            $should_display = false;
            
            // Check regular pages
            if (is_page() && !empty($cta['display_pages'])) {
                $should_display = in_array($current_page_id, $cta['display_pages']);
            }
            
            // Check post type specific settings
            if (!$should_display && !empty($cta['post_types_display']) && $current_post_type) {
                $config_key = digitalia_get_post_type_config_key($current_post_type);
                $post_type_config = isset($cta['post_types_display'][$config_key]) ? $cta['post_types_display'][$config_key] : null;
                
                if ($post_type_config && !empty($post_type_config['enable'])) {
                    if ($post_type_config['display_type'] === 'all') {
                        $should_display = true;
                    } elseif ($post_type_config['display_type'] === 'specific' && 
                            !empty($post_type_config['specific_items']) && 
                            in_array($current_page_id, $post_type_config['specific_items'])) {
                        $should_display = true;
                    }
                }
            }
            
            if ($should_display) {
                $layout = $cta['acf_fc_layout']; // Get the layout name
                $template = str_replace('layout_', '', $layout); // Remove 'layout_' prefix
                $args = array(
                    'title' => $cta['title'],
                    'description' => $cta['description'],
                    'background_class' => $cta['background_class']
                );
                
                // Add template-specific arguments
                if ($template === 'cta_modulos') {
                    $args = array_merge($args, array(
                        'cta_primary_text' => $cta['cta_primary_text'],
                        'cta_primary_url' => $cta['cta_primary_url'],
                        'cta_secondary_text' => $cta['cta_secondary_text'],
                        'cta_secondary_url' => $cta['cta_secondary_url'],
                        'doc_title' => $cta['doc_title'],
                        'doc_description' => $cta['doc_description'],
                        'doc_url' => $cta['doc_url'],
                        'guide_title' => $cta['guide_title'],
                        'guide_description' => $cta['guide_description'],
                        'guide_url' => $cta['guide_url']
                    ));
                }
                
                get_template_part('template-parts/' . str_replace('_', '-', $template), null, $args);
            }
        }
    }
}
?>

<section class="py-32 bg-slate-300 text-black font-mono">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"> <!-- container mx-auto px-4 -->
        <footer>
            <div class="grid grid-cols-4 justify-between gap-10 lg:grid-cols-6 lg:text-left">
                <div class="col-span-4 flex w-full flex-col justify-between gap-6 lg:col-span-2">
                    <div>
                        <span class="flex items-center gap-4">
                            <img src="/wp-content/uploads/2024/11/logo3.png" alt="Digitalia" class="h-24">
                        </span>
                        <p class="mt-6 text-muted-foreground">Transformando el futuro digital a través de soluciones innovadoras y sostenibles.</p>
                    </div>
                    <ul class="flex flex-wrap lg:flex-nowrap items-center space-x-6">
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://www.instagram.com/digitalia_col/"><i class="fa-brands fa-instagram size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://www.facebook.com/digitaliacol/"><i class="fa-brands fa-facebook size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://x.com/Digitalia_Col"><i class="fa-brands fa-x-twitter size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://www.linkedin.com/company/digital-ia-educomunicaci%c3%b3n-para-la-paz/"><i class="fa-brands fa-linkedin size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://www.youtube.com/@Digitalia_Col"><i class="fa-brands fa-youtube size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://www.tiktok.com/@digitalia_col"><i class="fa-brands fa-tiktok size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://open.spotify.com/user/31gtjr6y7rept5zfp7xyjssst2qq"><i class="fa-brands fa-spotify size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://www.flickr.com/photos/digitalia/"><i class="fa-brands fa-flickr size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://co.pinterest.com/digitalia_col/"><i class="fa-brands fa-pinterest size-6"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="mb-5 font-medium text-black">Menú Principal</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="font-medium hover:text-black hover:underline"><a href="/que-es-digitalia/">¿Qué es Digitalia?</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/biblioteca-digital/">Biblioteca Digital</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/blog-y-noticias/">Blog y Noticias</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/preguntas-frecuentes/">Preguntas Frecuentes</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/contacto/">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="mb-5 font-medium text-black">Módulos</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="font-medium hover:text-black hover:underline"><a href="/biblioteca-digital/">Biblioteca Digitalia</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/academia/">Academia</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/plataforma/courses/">Cursos</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/kit-social-media/">Kit social media</a></li>
                    </ul>
                </div>
                <div class="col-span-4 md:col-span-2">
                    <h3 class="mb-5 font-medium text-black">Boletín Informativo</h3>
                    <div class="grid gap-1.5">
                        <label class="text-sm font-medium leading-none text-black peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="email">Suscríbete a nuestro boletín</label>
                        <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 4 ) ); ?>
                    </div>
                    <p class="mt-1 text-xs font-medium text-gray-600">Al suscribirte, aceptas nuestra <a href="/politica-de-privacidad" class="ml-1 text-black hover:underline">Política de Privacidad</a></p>
                </div>
            </div>
            <div class="mt-20 flex flex-col justify-between gap-4 border-t border-gray-800 pt-8 text-sm font-medium text-gray-600 lg:flex-row lg:items-center lg:text-left">
                <p><span class="mr-1 font-bold text-black">Digitalia</span> Copyleft <?php echo date('Y'); ?>. </p>
            </div>
        </footer>
    </div>
</section>

<?php get_template_part('template-parts/mobile-footer-nav'); ?>

<!-- Widget Configuration -->
<script>
    window.ChatWidgetConfig = {
        webhook: {
            url: 'https://n8n.digitalia.su/webhook/89b96ceb-7ef5-43b7-978e-9f27e71e04dc/chat',
            route: 'general'
        },
        branding: {
            logo: '<?php echo get_template_directory_uri(); ?>/assets/images/Botilito_Avatar.png',
            name: 'Botilito - Digital-IA',
            welcomeText: 'Kiubo! 👋, Soy Botilito, un ex-agente digital de una granja de bots! Me escapé para venirme al bando de los que luchan por la paz, me acompañas?',
            responseTimeText: '¿Qué quieres saber?'  
        },
        style: {
            primaryColor: '#854fff', //Primary color
            secondaryColor: '#6b3fd4', //Secondary color
            position: 'right', //Position of the widget (left or right)
            backgroundColor: '#ffffff', //Background color of the chat widget
            fontColor: '#333333' //Text color for messages and interface
        }
    };
</script>
<!-- Widget Script -->
 
<?php wp_footer(); ?>
</body>
</html>
