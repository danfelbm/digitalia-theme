from PIL import Image
import os

def resize_image(image_path, max_width=800):
    # Open the image
    with Image.open(image_path) as img:
        # Calculate aspect ratio
        width_percent = max_width / float(img.size[0])
        new_height = int(float(img.size[1]) * width_percent)
        
        # Resize image
        resized_img = img.resize((max_width, new_height), Image.Resampling.LANCZOS)
        
        # Save the resized image, overwriting the original
        resized_img.save(image_path, quality=90, optimize=True)
        
        # Print original and new sizes
        original_size = os.path.getsize(image_path) / (1024 * 1024)  # Convert to MB
        print(f"Resized: {os.path.basename(image_path)}")
        print(f"Original dimensions: {img.size}")
        print(f"New dimensions: {resized_img.size}")
        print(f"File size: {original_size:.2f}MB")
        print("-" * 50)

def process_directory(directory):
    # Walk through all subdirectories
    for root, dirs, files in os.walk(directory):
        for file in files:
            # Process only image files
            if file.lower().endswith(('.jpg', '.jpeg', '.png')):
                image_path = os.path.join(root, file)
                try:
                    resize_image(image_path)
                except Exception as e:
                    print(f"Error processing {file}: {str(e)}")

if __name__ == "__main__":
    # Get the directory where this script is located
    script_dir = os.path.dirname(os.path.abspath(__file__))
    # Target only the 'nuevo' directory
    target_directory = os.path.join(script_dir, 'nuevo')
    
    if os.path.exists(target_directory):
        print(f"Processing images in: {target_directory}")
        process_directory(target_directory)
        print("Resizing complete!")
    else:
        print(f"Error: Directory not found: {target_directory}")
