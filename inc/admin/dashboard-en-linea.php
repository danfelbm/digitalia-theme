<?php
/**
 * Custom dashboard page for En Linea role
 */

if (!defined('ABSPATH')) {
    exit;
}

function digitalia_en_linea_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Bienvenido a En Línea</h1>
        
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2>¡Hola! Bienvenido a tu panel de control</h2>
                <p class="about-description">Aquí encontrarás acceso rápido a todas tus herramientas de contenido.</p>
                
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h3>Comenzar</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=personajes'); ?>" class="welcome-icon welcome-edit-page">Gestionar Personajes</a></li>
                            <li><a href="<?php echo admin_url('edit.php?post_type=actores'); ?>" class="welcome-icon welcome-add-page">Gestionar Actores</a></li>
                            <li><a href="<?php echo admin_url('edit.php?post_type=episodio'); ?>" class="welcome-icon welcome-write-blog">Gestionar Episodios</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h3>Próximos Pasos</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=series'); ?>" class="welcome-icon welcome-add-page">Gestionar Series</a></li>
                            <li><a href="<?php echo admin_url('profile.php'); ?>" class="welcome-icon welcome-write-blog">Editar tu Perfil</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h3>Más Acciones</h3>
                        <ul>
                            <li><div class="welcome-icon welcome-learn-more">¿Necesitas ayuda? Contacta al administrador</div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
