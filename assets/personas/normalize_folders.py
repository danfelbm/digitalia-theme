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

def rename_folders(directory):
    # Get all directories first
    all_dirs = []
    for root, dirs, files in os.walk(directory, topdown=False):
        for dir_name in dirs:
            if not dir_name.startswith('.'):  # Skip hidden directories
                full_path = os.path.join(root, dir_name)
                all_dirs.append(full_path)
    
    # Sort directories by depth (deepest first)
    all_dirs.sort(key=lambda x: x.count(os.sep), reverse=True)
    
    # Rename directories
    for dir_path in all_dirs:
        dir_name = os.path.basename(dir_path)
        parent_dir = os.path.dirname(dir_path)
        new_name = normalize_string(dir_name)
        
        if new_name != dir_name:
            new_path = os.path.join(parent_dir, new_name)
            try:
                os.rename(dir_path, new_path)
                print(f"Renamed folder:\n{dir_name}\nto:\n{new_name}\n{'-'*50}")
            except Exception as e:
                print(f"Error renaming directory {dir_name}: {str(e)}")

if __name__ == "__main__":
    root_directory = os.path.dirname(os.path.abspath(__file__))
    rename_folders(root_directory)
    print("Folder renaming complete!")
