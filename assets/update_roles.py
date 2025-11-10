#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Script para actualizar ROLES de personas según lista proporcionada
Solo renombra carpetas cuando hay cambio de rol
Análisis manual por Claude basado en la lista del usuario
"""

import shutil
from pathlib import Path

BASE_DIR = Path("/Users/testuser/Herd/digitalia/wp-content/themes/digitalia/assets/personas")

# ===========================================================================
# DICCIONARIO MANUAL DE ACTUALIZACIÓN DE ROLES
# Mapeo: 'carpeta_actual' → 'carpeta_con_rol_actualizado'
# ===========================================================================

ROLES_UPDATE = {
    # ========== DIRECCIÓN TRANSVERSAL ==========

    'farith_amed_hernández_-_direccion_transversal_-_líder_transversal_del_programa_digital-ia':
        'farith_amed_hernández_-_direccion_transversal_-_creador_del_programa_digital-ia',

    # Lucy ya tiene rol correcto: dirección_transversal_digital-ia ✓

    'camila_zambrano_-_direccion_transversal_-_coordinadora_administrativa':
        'camila_zambrano_-_direccion_transversal_-_gestora_de_proyectos',

    'humberto_suarez_-_direccion_transversal_-_asesor_estrategico':
        'humberto_suarez_-_direccion_transversal_-_gestor_de_politica_publica',

    # maria_fernanda_guarin_romero ya tiene rol correcto: apoyo_juridico ✓

    'maria_paula_gonzalez_cuellar_-_direccion_transversal_-_apoyo_administrativo_para_la_gestion':
        'maria_paula_gonzalez_cuellar_-_direccion_transversal_-_apoyo_administrativo',

    'sara_colmenares_-_direccion_transversal_-_asesora_de_comunicaciones':
        'sara_colmenares_-_direccion_transversal_-_administrativo_de_gestion_documental',

    'luz_andrea_sotelo_trujillo_-_direccion_transversal_-_administradora':
        'luz_andrea_sotelo_trujillo_-_direccion_transversal_-_administrador',

    'leandro_diaz_rivera_-_direccion_transversal_-_apoyo_administrativo_para_la_gestion':
        'leandro_diaz_rivera_-_direccion_transversal_-_apoyo_administrativo',

    'zuky_echeverry_jimenez_-_direccion_transversal_-_presentadora_actriz':
        'zuky_echeverry_jimenez_-_direccion_transversal_-_apoyo_administrativo_junior',

    'ruth_pilar_lazaro_gomez_-_direccion_transversal_-_coordinadora_de_proyectos':
        'ruth_pilar_lazaro_gomez_-_direccion_transversal_-_apoyo_administrativo_junior',

    'karen_julieth_camacho_moyano_-_direccion_transversal_-_coordinadora_de_comunicaciones':
        'karen_julieth_camacho_moyano_-_direccion_transversal_-_prensa',

    # bertha ya tiene rol correcto: orientadora_salud_mental_y_enfoque_diferencial ✓

    # ========== EN LÍNEA ==========

    'ivan_dario_alba_-_en_linea_-_editor_efectos_especiales':
        'ivan_dario_alba_-_en_linea_-_director',

    'liza_lorena_quitian_-_en_linea_-_presentadora':
        'liza_lorena_quitian_-_en_linea_-_productora',

    'victoria_paez_-_en_linea_-_investigadora':
        'victoria_paez_-_en_linea_-_asistente_de_produccion',

    # eduali ya tiene rol correcto: director_de_fotografía ✓

    'alvaro_duque_-_en_linea_-_director_de_fotografia':
        'alvaro_duque_-_en_linea_-_investigador',

    'carlos_augusto_rojas_galindo_-_en_linea_-_guionista':
        'carlos_augusto_rojas_galindo_-_en_linea_-_guionista', # Ya correcto ✓

    # angello ya tiene rol correcto: asistente_tecnico ✓

    'juan_sebastián_martínez_duica_-_en_linea_-_sonidista':
        'juan_sebastián_martínez_duica_-_en_linea_-_sonidista_disenador_de_sonido',

    'adolfo_castillo_pardo_-_en_linea_-_editor_efectos_especiales':
        'adolfo_castillo_pardo_-_en_linea_-_montajista_editor',

    'william_eduardo_sanabria_cendales_-_en_linea_-_disenador_animador':
        'william_eduardo_sanabria_cendales_-_en_linea_-_disenador_animador', # Ya correcto ✓

    'oscar_danilo_florez_choconta_-_total_transmedia-_copywriting_y_corrector_de_estilo':
        'oscar_danilo_florez_choconta_-_en_linea_-_narrador_voz_en_off',

    'juan_prado_-_en_linea_-_colorista':
        'juan_prado_-_en_linea_-_dit_colorista',

    # ========== TOTAL TRANSMEDIA ==========

    'luis_javier_hernandez_vasquez_-_total_transmedia_-_investigador':
        'luis_javier_hernandez_vasquez_-_total_transmedia_-_lider_transmedia',

    'camilo_galeano_-_total_transmedia_-_disenador_grafico':
        'camilo_galeano_-_total_transmedia_-_productor',

    'diana_socha_-_total_transmedia_-_coordinadora_digital':
        'diana_socha_-_total_transmedia_-_copywriting_y_corrector_de_estilo',

    'sergio_alvarado_vivas_-_total_transmedia_-_investigacion_y_guion_transmedia':
        'sergio_alvarado_vivas_-_total_transmedia_-_investigador',

    'tomas_duran_becerra_-_en_linea_-_investigador':
        'tomas_duran_becerra_-_total_transmedia_-_investigador_ami',

    'heidy_ashley_vergara_moreno_-_direccion_transversal_-_community_manager':
        'heidy_ashley_vergara_moreno_-_total_transmedia_-_marketing_y_analitica_community_manager',

    'oscar_eduardo_figueroa_carrizosa_-_total_transmedia_-_realizador_audiovisual_drones':
        'oscar_eduardo_figueroa_carrizosa_-_total_transmedia_-_creador_de_contenido_con_equipo',

    'sebastian_chingate_sanchez_-_total_transmedia_-_investigador':
        'sebastian_chingate_sanchez_-_total_transmedia_-_creador_de_contenido_con_equipo',

    'laura_paola_gomez_barros_-_total_transmedia_-_presentadora_actriz':
        'laura_paola_gomez_barros_-_total_transmedia_-_presentadora_actriz', # Ya correcto ✓

    'viviana_moreno_gonzales_-_total_transmedia_-_productora_audiovisual':
        'viviana_moreno_gonzales_-_total_transmedia_-_produccion_grafica',

    'andres_felipe_pinzon_cubides_-_total_transmedia_-_productor_grafico':
        'andres_felipe_pinzon_cubides_-_total_transmedia_-_produccion_grafica',

    'maria_camila_sanabria_moreno_-_total_transmedia_-_marca_y_comunicaciones':
        'maria_camila_sanabria_moreno_-_total_transmedia_-_apoyo_produccion_grafica',

    'carolina_ramírez_páez_-_total_transmedia_-_fotografa':
        'carolina_ramírez_páez_-_total_transmedia_-_fotografia_con_equipo',

    'andres_santiago_munoz_contreras_-_total_transmedia_-_editor_audiovisual':
        'andres_santiago_munoz_contreras_-_total_transmedia_-_realizador_audiovisual_con_equipo',

    'juan_pablo_linares_-_total_transmedia_-_productor_de_contenidos':
        'juan_pablo_linares_-_total_transmedia_-_edicion_conceptual_con_equipo',

    'luis_fernando_garcia_-_total_transmedia_-_interprete_de_senas':
        'luis_fernando_garcia_-_total_transmedia_-_interprete_de_senas', # Ya correcto ✓

    # paula_jimena ya tiene rol correcto: storytelling ✓

    'daniel_andres_sanabria_cendales_-_en_linea_-_disenador_animador':
        'daniel_andres_sanabria_cendales_-_total_transmedia_-_graficador_con_equipo',

    'sebastian_herrera_aranguren_-_en_linea_-_analista_de_coyuntura':
        'sebastian_herrera_aranguren_-_total_transmedia_-_investigador_comunicacion_politica',

    'santiago_torres_rincon_-_total_transmedia_-_presentador':
        'santiago_torres_rincon_-_total_transmedia_-_presentador_actor',

    # ========== ACADEMIA ==========

    'diana_marcela_melo_solorzano_-_academia_-_coordinadora_pedagogica':
        'diana_marcela_melo_solorzano_-_academia_-_atencion_al_usuario',
}


def update_roles():
    """Actualiza los roles de las personas renombrando carpetas"""

    print("🔄 ACTUALIZACIÓN DE ROLES DE PERSONAS")
    print("=" * 70)
    print()

    print(f"📊 Total de cambios a aplicar: {len(ROLES_UPDATE)}")
    print()

    # Mostrar muestra de cambios
    print("📋 Muestra de cambios (primeros 5):")
    for i, (old, new) in enumerate(list(ROLES_UPDATE.items())[:5], 1):
        old_role = old.split('_-_')[-1]
        new_role = new.split('_-_')[-1]
        print(f"   {i}. {old_role} → {new_role}")
    print()

    response = input("¿Continuar con la actualización? (s/n): ").strip().lower()

    if response != 's':
        print("❌ Actualización cancelada")
        return

    print()
    print("🔄 Iniciando actualización de roles...")
    print()

    updated_count = 0
    skipped_count = 0
    error_count = 0

    for old_folder, new_folder in ROLES_UPDATE.items():
        old_path = BASE_DIR / old_folder
        new_path = BASE_DIR / new_folder

        if not old_path.exists():
            print(f"   ⚠️  No encontrada (omitiendo): {old_folder}")
            skipped_count += 1
            continue

        if new_path.exists() and old_path != new_path:
            print(f"   ⚠️  Destino ya existe (omitiendo): {new_folder}")
            skipped_count += 1
            continue

        try:
            # Renombrar carpeta
            old_path.rename(new_path)

            # Extraer solo el rol para mostrar
            old_role = old_folder.split('_-_')[-1]
            new_role = new_folder.split('_-_')[-1]
            person_name = old_folder.split('_-_')[0].replace('_', ' ').title()

            print(f"   ✅ {person_name}")
            print(f"      {old_role} → {new_role}")

            updated_count += 1

        except Exception as e:
            print(f"   ❌ Error: {old_folder}")
            print(f"      {str(e)}")
            error_count += 1

    print()
    print("=" * 70)
    print("✅ ACTUALIZACIÓN COMPLETADA")
    print("=" * 70)
    print()
    print(f"📊 Resultado:")
    print(f"   • Carpetas actualizadas:  {updated_count}")
    print(f"   • Omitidas:               {skipped_count}")
    print(f"   • Errores:                {error_count}")
    print()
    print(f"📁 Directorio: {BASE_DIR}")
    print()


if __name__ == "__main__":
    update_roles()
