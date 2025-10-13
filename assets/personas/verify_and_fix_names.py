import os
import unicodedata
import re

def normalize_string(text):
    # Remove accents and convert to ASCII
    text = unicodedata.normalize('NFKD', text).encode('ASCII', 'ignore').decode('ASCII')
    # Convert to lowercase
    text = text.lower()
    # Replace spaces and multiple spaces with single underscore
    text = re.sub(r'\s+', '_', text)
    # Remove any non-alphanumeric characters (except underscores and hyphens)
    text = re.sub(r'[^\w\-]', '', text)
    # Replace multiple underscores with single underscore
    text = re.sub(r'_+', '_', text)
    return text

def rename_files(directory):
    for root, dirs, files in os.walk(directory):
        folder_name = os.path.basename(root)
        if folder_name.startswith('.'):  # Skip hidden folders
            continue
            
        for filename in files:
            if filename.startswith('.') or not filename.lower().endswith(('.jpg', '.jpeg')):
                continue
                
            old_path = os.path.join(root, filename)
            
            # Extract number from original filename
            number_match = re.search(r'\d+', filename)
            number = number_match.group() if number_match else '1'
            
            # Get the extension
            _, ext = os.path.splitext(filename)
            
            # Create new filename using folder name and number
            new_filename = f"{folder_name}_{number}{ext.lower()}"
            new_path = os.path.join(root, new_filename)
            
            if filename.lower() != new_filename.lower():
                try:
                    os.rename(old_path, new_path)
                    print(f"Renamed in {folder_name}:\n{filename}\nto:\n{new_filename}\n{'-'*50}")
                except Exception as e:
                    print(f"Error renaming {filename}: {str(e)}")

if __name__ == "__main__":
    current_dir = os.path.dirname(os.path.abspath(__file__))
    rename_files(current_dir)
    print("Verification and renaming complete!")
