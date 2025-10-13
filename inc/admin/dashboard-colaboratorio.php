<?php
/**
 * Custom dashboard page for Colaboratorio role
 */

if (!defined('ABSPATH')) {
    exit;
}

function digitalia_colaboratorio_dashboard_page() {
    ?>
    <div class="wrap">
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2><i class="bi bi-house-heart-fill me-2"></i>¡Hola! Bienvenido a tu espacio colaborativo</h2>
                <p class="about-description">Gestiona contenido, transmisiones y espacios desde un solo lugar. Todo lo que necesitas está a un clic de distancia.</p>
                
                <div class="welcome-panel-column">
                    <h3><i class="bi bi-pencil-square"></i>Gestión de Contenido</h3>
                    <ul>
                        <li>
                            <a href="<?php echo admin_url('edit.php'); ?>">
                                <i class="bi bi-file-text"></i>
                                Gestionar Entradas
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('post-new.php'); ?>">
                                <i class="bi bi-plus-circle"></i>
                                Crear Nueva Entrada
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('upload.php'); ?>">
                                <i class="bi bi-images"></i>
                                Biblioteca de Medios
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="welcome-panel-column">
                    <h3><i class="bi bi-broadcast"></i>Transmisiones</h3>
                    <ul>
                        <li>
                            <a href="<?php echo admin_url('edit.php?post_type=transmision'); ?>">
                                <i class="bi bi-camera-video"></i>
                                Ver Transmisiones
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('post-new.php?post_type=transmision'); ?>">
                                <i class="bi bi-plus-circle"></i>
                                Nueva Transmisión
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="welcome-panel-column">
                    <h3><i class="bi bi-building"></i>Espacios</h3>
                    <ul>
                        <li>
                            <a href="<?php echo admin_url('edit.php?post_type=espacio'); ?>">
                                <i class="bi bi-grid"></i>
                                Ver Espacios
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('post-new.php?post_type=espacio'); ?>">
                                <i class="bi bi-plus-circle"></i>
                                Nuevo Espacio
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo admin_url('profile.php'); ?>">
                                <i class="bi bi-person-circle"></i>
                                Editar Perfil
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="welcome-panel-column">
                    <h3><i class="bi bi-clock-history"></i>Actividad Reciente</h3>
                    <?php
                    $args = array(
                        'post_type' => array('post', 'transmision', 'espacio'),
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $recent_items = new WP_Query($args);
                    
                    if ($recent_items->have_posts()) :
                        echo '<div class="activity-list">';
                        while ($recent_items->have_posts()) :
                            $recent_items->the_post();
                            $post_status = get_post_status();
                            $status_class = $post_status === 'publish' ? 'published' : 'draft';
                            ?>
                            <div class="activity-item">
                                <i class="bi bi-dot"></i>
                                <span><?php echo get_the_title(); ?></span>
                                <small class="text-muted ms-2">(<?php echo get_post_type(); ?>)</small>
                                <span class="status-badge <?php echo $status_class; ?> ms-2">
                                    <?php echo $post_status === 'publish' ? 'Publicado' : 'Borrador'; ?>
                                </span>
                            </div>
                            <?php
                        endwhile;
                        echo '</div>';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
