<?php
/**
 * Custom dashboard page for Ready role
 */

if (!defined('ABSPATH')) {
    exit;
}

function digitalia_ready_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Bienvenido a Ready</h1>
        
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2>¡Hola! Bienvenido a tu espacio de trabajo</h2>
                <p class="about-description">Aquí podrás gestionar todo el contenido y recursos multimedia.</p>
                
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h3>Contenido Principal</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php'); ?>" class="welcome-icon welcome-write-blog">Gestionar Entradas</a></li>
                            <li><a href="<?php echo admin_url('upload.php'); ?>" class="welcome-icon welcome-add-page">Biblioteca de Medios</a></li>
                            <li><a href="<?php echo admin_url('edit-comments.php'); ?>" class="welcome-icon welcome-comments">Moderar Comentarios</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h3>Recursos Digitales</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=descargas'); ?>" class="welcome-icon welcome-add-page">Gestionar Descargas</a></li>
                            <li><a href="<?php echo admin_url('profile.php'); ?>" class="welcome-icon welcome-write-blog">Tu Perfil</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h3>Actividad Reciente</h3>
                        <ul>
                            <li>
                                <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 3,
                                    'post_status' => 'publish'
                                ));
                                
                                if (!empty($recent_posts)) {
                                    echo '<div class="welcome-icon welcome-learn-more">';
                                    echo 'Últimas publicaciones:<br>';
                                    foreach ($recent_posts as $recent) {
                                        echo '- ' . esc_html($recent['post_title']) . '<br>';
                                    }
                                    echo '</div>';
                                }
                                wp_reset_postdata();
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
