#!/usr/bin/env python3
"""
Optimización y renombrado de imágenes de Total Transmedia
- Renombra: nombre_carpeta + incrementador (ami1.jpg, ami2.jpg, etc.)
- Optimiza: max 1600px, calidad JPEG 85%
"""

import os
import subprocess
from pathlib import Path

# Configuración
BASE_DIR = Path('/Users/testuser/Herd/digitalia/wp-content/themes/digitalia/assets/images/tt-images')
MAX_WIDTH = 1600
JPEG_QUALITY = 85

# Extensiones de imagen válidas
IMAGE_EXTENSIONS = {'.jpg', '.jpeg', '.png', '.JPG', '.JPEG', '.PNG'}


def get_image_files(folder_path):
    """Obtiene todas las imágenes en una carpeta, ordenadas alfabéticamente"""
    images = []
    for item in folder_path.iterdir():
        if item.is_file() and item.suffix in IMAGE_EXTENSIONS:
            images.append(item)
    return sorted(images)


def optimize_image(image_path, max_width, quality):
    """Optimiza una imagen usando sips (macOS)"""
    try:
        # Redimensionar manteniendo aspect ratio
        subprocess.run([
            'sips',
            '--resampleHeightWidthMax', str(max_width),
            '--setProperty', 'formatOptions', str(quality),
            str(image_path)
        ], check=True, capture_output=True)
        return True
    except subprocess.CalledProcessError as e:
        print(f"  ❌ Error optimizando {image_path.name}: {e}")
        return False


def process_folder(folder_path, folder_name):
    """Procesa todas las imágenes de una carpeta"""
    images = get_image_files(folder_path)

    if not images:
        print(f"⚠️  Carpeta vacía: {folder_name}")
        return

    print(f"\n📁 Procesando: {folder_name} ({len(images)} imágenes)")

    # Normalizar nombre de carpeta a lowercase
    normalized_folder_name = folder_name.lower()

    # Renombrar y optimizar cada imagen
    for index, image_path in enumerate(images, start=1):
        old_name = image_path.name

        # Nuevo nombre: carpeta + número + extensión
        # Mantener la extensión original (jpg, jpeg, png)
        extension = image_path.suffix.lower()
        if extension == '.jpeg':
            extension = '.jpg'  # Normalizar .jpeg a .jpg

        new_name = f"{normalized_folder_name}{index}{extension}"
        new_path = image_path.parent / new_name

        # Si el archivo ya tiene el nombre correcto, solo optimizar
        if image_path.name == new_name:
            print(f"  ✓ {old_name} (ya tiene nombre correcto, optimizando...)")
            optimize_image(image_path, MAX_WIDTH, JPEG_QUALITY)
        else:
            # Renombrar primero
            try:
                image_path.rename(new_path)
                print(f"  ✓ {old_name} → {new_name}")

                # Luego optimizar
                optimize_image(new_path, MAX_WIDTH, JPEG_QUALITY)

            except Exception as e:
                print(f"  ❌ Error renombrando {old_name}: {e}")


def main():
    """Procesa todas las carpetas en tt-images"""
    print("=" * 60)
    print("OPTIMIZACIÓN Y RENOMBRADO DE IMÁGENES TOTAL TRANSMEDIA")
    print("=" * 60)
    print(f"Directorio base: {BASE_DIR}")
    print(f"Max ancho: {MAX_WIDTH}px")
    print(f"Calidad JPEG: {JPEG_QUALITY}%")
    print("=" * 60)

    # Obtener todas las carpetas
    folders = [f for f in BASE_DIR.iterdir() if f.is_dir()]
    folders = sorted(folders, key=lambda x: x.name)

    print(f"\n📊 Total de carpetas a procesar: {len(folders)}")

    # Procesar cada carpeta
    for folder in folders:
        process_folder(folder, folder.name)

    print("\n" + "=" * 60)
    print("✅ PROCESO COMPLETADO")
    print("=" * 60)


if __name__ == "__main__":
    main()
