<?php
/**
 * Custom dashboard page for Total Transmedia role
 */

if (!defined('ABSPATH')) {
    exit;
}

function digitalia_total_transmedia_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Bienvenido a Total Transmedia</h1>
        
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2>¡Hola! Bienvenido a tu centro de control de contenido</h2>
                <p class="about-description">Gestiona todo tu contenido multimedia y descargas desde aquí.</p>
                
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h3>Gestión de Contenido</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php'); ?>" class="welcome-icon welcome-write-blog">Gestionar Entradas</a></li>
                            <li><a href="<?php echo admin_url('upload.php'); ?>" class="welcome-icon welcome-add-page">Biblioteca de Medios</a></li>
                            <li><a href="<?php echo admin_url('edit-comments.php'); ?>" class="welcome-icon welcome-comments">Gestionar Comentarios</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h3>Recursos</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=descargas'); ?>" class="welcome-icon welcome-add-page">Gestionar Descargas</a></li>
                            <li><a href="<?php echo admin_url('profile.php'); ?>" class="welcome-icon welcome-write-blog">Editar tu Perfil</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h3>Estado del Sistema</h3>
                        <ul>
                            <li>
                                <?php
                                $count_posts = wp_count_posts();
                                $count_media = wp_count_attachments();
                                echo '<div class="welcome-icon welcome-learn-more">';
                                echo 'Entradas publicadas: ' . $count_posts->publish . '<br>';
                                echo 'Archivos multimedia: ' . array_sum((array)$count_media);
                                echo '</div>';
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <h2>Descarga los Kits de Medios</h2>
                    <p class="text-muted mb-4">Descarga los recursos y materiales necesarios para tu trabajo.</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="https://digitalia.gov.co/wp-content/uploads/2025/02/RRSS-Recursos-20250204T205918Z-001.zip" 
                       class="btn btn-primary btn-lg d-flex align-items-center justify-content-center w-100 py-3">
                        <span class="dashicons dashicons-download me-2"></span>
                        Descargar Kit de Recursos RRSS
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="https://digitalia.gov.co/wp-content/uploads/2025/02/111924-Digital-IA-marca-3-4.pdf" 
                       class="btn btn-primary btn-lg d-flex align-items-center justify-content-center w-100 py-3">
                        <span class="dashicons dashicons-download me-2"></span>
                        Descargar Digital IA Marca
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
