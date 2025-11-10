#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Script de integración MANUAL de personas → nuevas_personas
Basado en análisis manual de ambas carpetas por Claude

OPERACIONES:
1. RENOVADAS: Copiar desde nuevas_personas → personas (reemplazar)
2. NUEVAS: Copiar desde nuevas_personas → personas (agregar)
3. SIN CAMBIO: Mantener en personas (no tocar)
"""

import shutil
from pathlib import Path

BASE_DIR = Path("/Users/testuser/Herd/digitalia/wp-content/themes/digitalia/assets")
PERSONAS_DIR = BASE_DIR / "personas"
NUEVAS_PERSONAS_DIR = BASE_DIR / "nuevas_personas"

# ===========================================================================
# DICCIONARIO MANUAL DE INTEGRACIÓN
# Analizado manualmente por Claude comparando ambas carpetas
# ===========================================================================

# CATEGORÍA 1: RENOVADAS (23 personas)
# Están en ambas carpetas - SE ACTUALIZARÁN
# Formato: 'carpeta_antigua': 'carpeta_nueva'
RENOVADAS = {
    # Mismos nombres en ambas carpetas
    'adolfo_castillo_pardo_-_en_linea_-_editor_efectos_especiales':
        'adolfo_castillo_pardo_-_en_linea_-_editor_efectos_especiales',

    'angello_eduardo_catano_goez_-_en_linea_-_asistente_tecnico':
        'angello_eduardo_catano_goez_-_en_linea_-_asistente_tecnico',

    'bertha_neris_sanchez_vasquez_-_direccion_transversal_-_orientadora_salud_mental_y_enfoque_diferencial':
        'bertha_neris_sanchez_vasquez_-_direccion_transversal_-_orientadora_salud_mental_y_enfoque_diferencial',

    'carlos_augusto_rojas_galindo_-_en_linea_-_guionista':
        'carlos_augusto_rojas_galindo_-_en_linea_-_guionista',

    # CONFLICTO DE ACENTOS: carolina_ramírez_páez vs carolina_ramirez_paez
    'carolina_ramírez_páez_-_total_transmedia_-_fotografa':
        'carolina_ramirez_paez_-_total_transmedia_-_fotografa',

    'daniel_andres_sanabria_cendales_-_en_linea_-_disenador_animador':
        'daniel_andres_sanabria_cendales_-_en_linea_-_disenador_animador',

    # CONFLICTO DE ACENTOS: eduali_gregorio_pirela_díaz vs eduali_gregorio_pirela_diaz
    'eduali_gregorio_pirela_díaz_-_en_linea_-_director_de_fotografía':
        'eduali_gregorio_pirela_diaz_-_en_linea_-_director_de_fotografia',

    # CAMBIO DE EQUIPO: total_transmedia → direccion_transversal
    'heidy_ashley_vergara_moreno_-_total_transmedia_-_community_manager':
        'heidy_ashley_vergara_moreno_-_direccion_transversal_-_community_manager',

    # CAMBIO DE EQUIPO: en_linea → academia
    'juan_carlos_morelo_mirla_-_en_linea_-_realizador_audiovisual':
        'juan_carlos_morelo_mirla_-_academia_-_realizador_audiovisual',

    # CONFLICTO DE ACENTOS: juan_sebastián_martínez_duica vs juan_sebastian_martinez_duica
    'juan_sebastián_martínez_duica_-_en_linea_-_sonidista':
        'juan_sebastian_martinez_duica_-_en_linea_-_sonidista',

    # CAMBIO DE EQUIPO: en_linea → total_transmedia
    'laura_paola_gomez_barros_-_en_linea_-_presentadora_actriz':
        'laura_paola_gomez_barros_-_total_transmedia_-_presentadora_actriz',

    # CAMBIO DE EQUIPO: total_transmedia → direccion_transversal
    'leandro_diaz_rivera_-_total_transmedia_-_apoyo_administrativo_para_la_gestion':
        'leandro_diaz_rivera_-_direccion_transversal_-_apoyo_administrativo_para_la_gestion',

    # CONFLICTO DE ACENTOS: lucy_estefany_pérez_romero vs lucy_estefany_perez_romero
    'lucy_estefany_pérez_romero_-_direccion_transversal_-_dirección_transversal_digital-ia':
        'lucy_estefany_perez_romero_-_direccion_transversal_-_direccion_transversal_digital-ia',

    'luis_fernando_garcia_-_total_transmedia_-_interprete_de_senas':
        'luis_fernando_garcia_-_total_transmedia_-_interprete_de_senas',

    # CAMBIO DE EQUIPO: en_linea → total_transmedia
    'luis_javier_hernandez_vasquez_-_en_linea_-_investigador':
        'luis_javier_hernandez_vasquez_-_total_transmedia_-_investigador',

    # DIFERENCIA DE FORMATO: falta guion bajo antes de "administradora"
    'luz_andrea_sotelo_trujillo_-_direccion_transversal_-administradora':
        'luz_andrea_sotelo_trujillo_-_direccion_transversal_-_administradora',

    'maria_fernanda_guarin_romero_-_direccion_transversal_-_apoyo_juridico':
        'maria_fernanda_guarin_romero_-_direccion_transversal_-_apoyo_juridico',

    # CAMBIO DE EQUIPO: en_linea → direccion_transversal
    'maria_paula_gonzalez_cuellar_-_en_linea_-_apoyo_administrativo_para_la_gestion':
        'maria_paula_gonzalez_cuellar_-_direccion_transversal_-_apoyo_administrativo_para_la_gestion',

    # CAMBIO DE EQUIPO Y ROL: en_linea → total_transmedia
    'oscar_eduardo_figueroa_carrizosa_-_en_linea_-_realizador_audiovisual_drones_detras_de_camara':
        'oscar_eduardo_figueroa_carrizosa_-_total_transmedia_-_realizador_audiovisual_drones',

    'paula_jimena_cadena_sanchez_-_total_transmedia_-_storytelling':
        'paula_jimena_cadena_sanchez_-_total_transmedia_-_storytelling',

    # CAMBIO DE EQUIPO: en_linea → total_transmedia
    'santiago_torres_rincon_-_en_linea_-_presentador':
        'santiago_torres_rincon_-_total_transmedia_-_presentador',

    # DIFERENCIA DE FORMATO: falta guion bajo antes de "investigacion"
    'sergio_alvarado_vivas_-_total_transmedia_-investigacion_y_guion_transmedia':
        'sergio_alvarado_vivas_-_total_transmedia_-_investigacion_y_guion_transmedia',

    # CAMBIO DE EQUIPO: en_linea → direccion_transversal
    'zuky_echeverry_jimenez_-_en_linea_-_presentadora_actriz':
        'zuky_echeverry_jimenez_-_direccion_transversal_-_presentadora_actriz',
}

# CATEGORÍA 2: NUEVAS (29 personas)
# Solo en nuevas_personas - SE AGREGARÁN
NUEVAS = [
    'alvaro_duque_-_en_linea_-_director_de_fotografia',
    'andres_diaz_-_academia_-_realizador_audiovisual_con_equipos',
    'andres_felipe_pinzon_cubides_-_total_transmedia_-_productor_grafico',
    'andres_santiago_munoz_contreras_-_total_transmedia_-_editor_audiovisual',
    'camila_zambrano_-_direccion_transversal_-_coordinadora_administrativa',
    'camilo_avila_-_academia_-_productor_audiovisual',
    'camilo_galeano_-_total_transmedia_-_disenador_grafico',
    'cristian_rincon_-_academia_-_asistente_de_produccion',
    'diana_marcela_melo_solorzano_-_academia_-_coordinadora_pedagogica',
    'diana_socha_-_total_transmedia_-_coordinadora_digital',
    'eduardo_sanabria_-_en_linea_-_asistente_de_produccion',
    'humberto_suarez_-_direccion_transversal_-_asesor_estrategico',
    'ivan_andres_rozo_congote_-_academia_-_realizador_audiovisual',
    'ivan_dario_alba_-_en_linea_-_editor_efectos_especiales',
    'juan_pablo_linares_-_total_transmedia_-_productor_de_contenidos',
    'juan_prado_-_en_linea_-_colorista',
    'karen_julieth_camacho_moyano_-_direccion_transversal_-_coordinadora_de_comunicaciones',
    'lina_maria_castillo_castaneda_-_direccion_transversal_-_apoyo_administrativo',
    'liza_lorena_quitian_-_en_linea_-_presentadora',
    'maria_camila_sanabria_moreno_-_total_transmedia_-_marca_y_comunicaciones',
    'maria_fernanda_silva_gonzalez_-_academia_-_produccion_de_campo',
    'maria_paula_alvarado_sanchez_-_academia_-_sonidista',
    'ruth_pilar_lazaro_gomez_-_direccion_transversal_-_coordinadora_de_proyectos',
    'sara_colmenares_-_direccion_transversal_-_asesora_de_comunicaciones',
    'sebastian_chingate_sanchez_-_total_transmedia_-_investigador',
    'sebastian_herrera_aranguren_-_en_linea_-_analista_de_coyuntura',
    'simon_federico_avila_alvarado_-_academia_-_coordinador_tecnico',
    'victoria_paez_-_en_linea_-_investigadora',
    'viviana_moreno_gonzales_-_total_transmedia_-_productora_audiovisual',
]

# CATEGORÍA 3: SIN CAMBIO (9 personas)
# Solo en personas - SE MANTIENEN (NO SE TOCAN)
SIN_CAMBIO = [
    'andres_dias_-_academia_-_realizador_audiovisual_con_equipos',
    'andres_pinzon_-_total_transmedia_-_productor_grafico',
    'botiliti0_-_academia_-_asistente_virtual',
    'farith_amed_hernández_-_direccion_transversal_-_líder_transversal_del_programa_digital-ia',
    'gloria_milena_urbina_acebedo_-_direccion_transversal_-_gestora_de_proyectos_transversales',
    'ivan_-_en_linea_-_editor_efectos_especiales',
    'oscar_danilo_florez_choconta_-_total_transmedia-_copywriting_y_corrector_de_estilo',
    'tomas_duran_becerra_-_en_linea_-_investigador',
    'william_eduardo_sanabria_cendales_-_en_linea_-_disenador_animador',
]


def integrate_personas():
    """Ejecuta la integración completa"""

    print("🔄 INTEGRACIÓN: nuevas_personas → personas")
    print("=" * 70)
    print()

    print(f"📊 Resumen:")
    print(f"   • Renovadas (actualizar):  {len(RENOVADAS)}")
    print(f"   • Nuevas (agregar):        {len(NUEVAS)}")
    print(f"   • Sin cambio (mantener):   {len(SIN_CAMBIO)}")
    print(f"   • TOTAL FINAL:             {len(RENOVADAS) + len(NUEVAS) + len(SIN_CAMBIO)}")
    print()

    response = input("¿Continuar con la integración? (s/n): ").strip().lower()

    if response != 's':
        print("❌ Integración cancelada")
        return

    print()
    print("🔄 Iniciando integración...")
    print()

    # PASO 1: Actualizar personas renovadas
    print("=" * 70)
    print("🔄 PASO 1: ACTUALIZANDO PERSONAS RENOVADAS")
    print("=" * 70)
    print()

    renovadas_count = 0
    for old_folder, new_folder in RENOVADAS.items():
        old_path = PERSONAS_DIR / old_folder
        new_path = NUEVAS_PERSONAS_DIR / new_folder

        if not new_path.exists():
            print(f"   ⚠️  Carpeta no encontrada: {new_folder}")
            continue

        # Eliminar carpeta antigua
        if old_path.exists():
            shutil.rmtree(old_path)
            print(f"   🗑️  Eliminada: {old_folder}")

        # Copiar carpeta nueva
        shutil.copytree(new_path, old_path)
        print(f"   ✅ Actualizada: {new_folder}")
        print()

        renovadas_count += 1

    print(f"✅ {renovadas_count} personas renovadas")
    print()

    # PASO 2: Agregar personas nuevas
    print("=" * 70)
    print("✨ PASO 2: AGREGANDO PERSONAS NUEVAS")
    print("=" * 70)
    print()

    nuevas_count = 0
    for folder_name in NUEVAS:
        source_path = NUEVAS_PERSONAS_DIR / folder_name
        dest_path = PERSONAS_DIR / folder_name

        if not source_path.exists():
            print(f"   ⚠️  Carpeta no encontrada: {folder_name}")
            continue

        if dest_path.exists():
            print(f"   ⚠️  Ya existe (omitiendo): {folder_name}")
            continue

        # Copiar carpeta nueva
        shutil.copytree(source_path, dest_path)
        print(f"   ✅ Agregada: {folder_name}")

        nuevas_count += 1

    print()
    print(f"✅ {nuevas_count} personas nuevas agregadas")
    print()

    # PASO 3: Verificar personas sin cambio
    print("=" * 70)
    print("📌 PASO 3: VERIFICANDO PERSONAS SIN CAMBIO")
    print("=" * 70)
    print()

    sin_cambio_count = 0
    for folder_name in SIN_CAMBIO:
        folder_path = PERSONAS_DIR / folder_name

        if folder_path.exists():
            print(f"   ✓ Mantenida: {folder_name}")
            sin_cambio_count += 1
        else:
            print(f"   ⚠️  No encontrada: {folder_name}")

    print()
    print(f"✅ {sin_cambio_count} personas sin cambio mantenidas")
    print()

    # RESUMEN FINAL
    print("=" * 70)
    print("✅ INTEGRACIÓN COMPLETADA")
    print("=" * 70)
    print()
    print(f"📊 Resultado:")
    print(f"   • Personas actualizadas:  {renovadas_count}")
    print(f"   • Personas agregadas:     {nuevas_count}")
    print(f"   • Personas mantenidas:    {sin_cambio_count}")
    print(f"   • TOTAL en 'personas':    {renovadas_count + nuevas_count + sin_cambio_count}")
    print()
    print(f"📁 Directorio: {PERSONAS_DIR}")
    print()


if __name__ == "__main__":
    integrate_personas()
