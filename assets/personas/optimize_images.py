from PIL import Image
import os
import piexif

def optimize_image(image_path):
    # Get original file size
    original_size = os.path.getsize(image_path) / 1024  # Size in KB
    
    try:
        # Remove EXIF data to reduce file size (but save orientation)
        try:
            exif_dict = piexif.load(image_path)
            orientation = None
            if "0th" in exif_dict and piexif.ImageIFD.Orientation in exif_dict["0th"]:
                orientation = exif_dict["0th"][piexif.ImageIFD.Orientation]
        except:
            orientation = None
            
        # Open and process image
        with Image.open(image_path) as img:
            # Convert to RGB if necessary
            if img.mode in ('RGBA', 'P'):
                img = img.convert('RGB')
            
            # Apply orientation if it was saved
            if orientation:
                if orientation == 3:
                    img = img.rotate(180, expand=True)
                elif orientation == 6:
                    img = img.rotate(270, expand=True)
                elif orientation == 8:
                    img = img.rotate(90, expand=True)
            
            # Save with optimization
            img.save(
                image_path,
                'JPEG',
                quality=85,  # Slightly reduce quality but still maintain good visual fidelity
                optimize=True,  # Use adaptive optimization
                progressive=True,  # Make progressive JPEG
                subsampling='4:2:0'  # Use chroma subsampling
            )
    
        # Get new file size
        new_size = os.path.getsize(image_path) / 1024  # Size in KB
        
        # Calculate reduction percentage
        reduction = ((original_size - new_size) / original_size) * 100
        
        print(f"Optimized: {os.path.basename(image_path)}")
        print(f"Original size: {original_size:.2f}KB")
        print(f"New size: {new_size:.2f}KB")
        print(f"Reduction: {reduction:.1f}%")
        print("-" * 50)
        
    except Exception as e:
        print(f"Error processing {image_path}: {str(e)}")

def process_directory(directory):
    # Walk through all subdirectories
    for root, dirs, files in os.walk(directory):
        for file in files:
            # Process only JPEG files
            if file.lower().endswith(('.jpg', '.jpeg')):
                image_path = os.path.join(root, file)
                optimize_image(image_path)

if __name__ == "__main__":
    # Get the directory where this script is located
    script_dir = os.path.dirname(os.path.abspath(__file__))
    # Target only the 'nuevo' directory
    target_directory = os.path.join(script_dir, 'nuevo')
    
    if os.path.exists(target_directory):
        print(f"Processing images in: {target_directory}")
        process_directory(target_directory)
        print("Optimization complete!")
    else:
        print(f"Error: Directory not found: {target_directory}")
