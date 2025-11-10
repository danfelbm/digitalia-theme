#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Script para CORREGIR equipos y roles según lista oficial
Análisis MANUAL por Claude comparando tree con lista oficial

ERRORES DETECTADOS:
- Personas en equipo incorrecto
- Roles con nombres incorrectos
- Formato inconsistente
"""

import shutil
from pathlib import Path

BASE_DIR = Path("/Users/testuser/Herd/digitalia/wp-content/themes/digitalia/assets/personas")

# ===========================================================================
# DICCIONARIO MANUAL DE CORRECCIONES
# Formato: 'carpeta_actual' → 'carpeta_correcta'
# ===========================================================================

CORRECTIONS = {
    # ========== CAMBIOS DE EQUIPO ==========

    # María Paula González: EN_LINEA → DIRECCION_TRANSVERSAL
    'maria_paula_gonzalez_cuellar_-_en_linea_-_apoyo_administrativo_para_la_gestion':
        'maria_paula_gonzalez_cuellar_-_direccion_transversal_-_apoyo_administrativo',

    # Leandro Díaz: TOTAL_TRANSMEDIA → DIRECCION_TRANSVERSAL
    'leandro_diaz_rivera_-_total_transmedia_-_apoyo_administrativo_para_la_gestion':
        'leandro_diaz_rivera_-_direccion_transversal_-_apoyo_administrativo',

    # Zuky Echeverry: EN_LINEA → DIRECCION_TRANSVERSAL
    'zuky_echeverry_jimenez_-_en_linea_-_presentadora_actriz':
        'zuky_echeverry_jimenez_-_direccion_transversal_-_apoyo_administrativo_junior',

    # Luis Javier Hernández: EN_LINEA → TOTAL_TRANSMEDIA (y cambiar rol)
    'luis_javier_hernandez_vasquez_-_en_linea_-_investigador':
        'luis_javier_hernandez_vasquez_-_total_transmedia_-_lider_transmedia',

    # Oscar Figueroa: EN_LINEA → TOTAL_TRANSMEDIA (y cambiar rol)
    'oscar_eduardo_figueroa_carrizosa_-_en_linea_-_realizador_audiovisual_drones_detras_de_camara':
        'oscar_eduardo_figueroa_carrizosa_-_total_transmedia_-_creador_de_contenido_con_equipo',

    # Laura Paola: EN_LINEA → TOTAL_TRANSMEDIA
    'laura_paola_gomez_barros_-_en_linea_-_presentadora_actriz':
        'laura_paola_gomez_barros_-_total_transmedia_-_presentadora_actriz',

    # Santiago Torres: EN_LINEA → TOTAL_TRANSMEDIA (y cambiar rol)
    'santiago_torres_rincon_-_en_linea_-_presentador':
        'santiago_torres_rincon_-_total_transmedia_-_presentador_actor',

    # ========== CORRECCIONES DE FORMATO ==========

    # Luz Andrea: falta guion bajo antes de administradora
    'luz_andrea_sotelo_trujillo_-_direccion_transversal_-administradora':
        'luz_andrea_sotelo_trujillo_-_direccion_transversal_-_administrador',

    # Sergio Alvarado: falta guion bajo y simplificar rol
    'sergio_alvarado_vivas_-_total_transmedia_-investigacion_y_guion_transmedia':
        'sergio_alvarado_vivas_-_total_transmedia_-_investigador',

    # ========== CORRECCIONES DE ROLES ==========

    # Álvaro Duque: "investigador" → "investigacion"
    'alvaro_duque_-_en_linea_-_investigador':
        'alvaro_duque_-_en_linea_-_investigacion',

    # Carlos Rojas: añadir "1"
    'carlos_augusto_rojas_galindo_-_en_linea_-_guionista':
        'carlos_augusto_rojas_galindo_-_en_linea_-_guionista_1',

    # Heidy Vergara: ampliar rol
    'heidy_ashley_vergara_moreno_-_total_transmedia_-_community_manager':
        'heidy_ashley_vergara_moreno_-_total_transmedia_-_marketing_y_analitica_community_manager',

    # Julián Hernández (no está en carpetas actuales, probablemente como "andres_pinzon")
    # Verificaremos si existe

    # Juan Carlos Prado: formato completo
    'juan_prado_-_en_linea_-_dit_colorista':
        'juan_carlos_prado_ramirez_-_en_linea_-_dit_colorista',

    # Karina Victoria (está como "victoria_paez")
    'victoria_paez_-_en_linea_-_asistente_de_produccion':
        'karina_victoria_paez_doria_-_en_linea_-_asistente_de_produccion',
}


def fix_teams_and_roles():
    """Corrige equipos y roles renombrando carpetas y archivos"""

    print("🔧 CORRECCIÓN DE EQUIPOS Y ROLES")
    print("=" * 70)
    print()

    print(f"📊 Total de correcciones a aplicar: {len(CORRECTIONS)}")
    print()

    # Mostrar muestra de cambios
    print("📋 Muestra de cambios (primeros 8):")
    for i, (old, new) in enumerate(list(CORRECTIONS.items())[:8], 1):
        old_parts = old.split('_-_')
        new_parts = new.split('_-_')

        if len(old_parts) >= 2 and len(new_parts) >= 2:
            old_team = old_parts[1] if len(old_parts) > 1 else "?"
            new_team = new_parts[1] if len(new_parts) > 1 else "?"

            if old_team != new_team:
                print(f"   {i}. {old_parts[0].replace('_', ' ').title()}")
                print(f"      EQUIPO: {old_team} → {new_team}")
            else:
                old_role = old_parts[2] if len(old_parts) > 2 else "?"
                new_role = new_parts[2] if len(new_parts) > 2 else "?"
                print(f"   {i}. {old_parts[0].replace('_', ' ').title()}")
                print(f"      ROL: {old_role} → {new_role}")
    print()

    response = input("¿Continuar con las correcciones? (s/n): ").strip().lower()

    if response != 's':
        print("❌ Corrección cancelada")
        return

    print()
    print("🔄 Iniciando correcciones...")
    print()

    corrected_count = 0
    skipped_count = 0

    for old_folder, new_folder in CORRECTIONS.items():
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
            # Renombrar archivos dentro ANTES de renombrar carpeta
            old_name_base = old_folder
            new_name_base = new_folder

            for file in old_path.glob("*.jpg"):
                # Construir nuevo nombre de archivo
                file_num = file.name.split('_')[-1]  # Obtener el número (ej: "1.jpg")
                new_file_name = f"{new_name_base}_{file_num}"
                new_file_path = old_path / new_file_name

                if file.name != new_file_name:
                    file.rename(new_file_path)

            # Renombrar carpeta
            old_path.rename(new_path)

            # Extraer info para mostrar
            old_parts = old_folder.split('_-_')
            new_parts = new_folder.split('_-_')
            person_name = old_parts[0].replace('_', ' ').title()

            old_team = old_parts[1] if len(old_parts) > 1 else ""
            new_team = new_parts[1] if len(new_parts) > 1 else ""

            if old_team != new_team:
                print(f"   ✅ {person_name}")
                print(f"      EQUIPO: {old_team} → {new_team}")
            else:
                old_role = old_parts[2] if len(old_parts) > 2 else ""
                new_role = new_parts[2] if len(new_parts) > 2 else ""
                print(f"   ✅ {person_name}")
                print(f"      ROL: {old_role} → {new_role}")

            corrected_count += 1

        except Exception as e:
            print(f"   ❌ Error: {old_folder}")
            print(f"      {str(e)}")

    print()
    print("=" * 70)
    print("✅ CORRECCIÓN COMPLETADA")
    print("=" * 70)
    print()
    print(f"📊 Resultado:")
    print(f"   • Carpetas corregidas:  {corrected_count}")
    print(f"   • Omitidas:             {skipped_count}")
    print()
    print(f"📁 Directorio: {BASE_DIR}")
    print()


if __name__ == "__main__":
    fix_teams_and_roles()
