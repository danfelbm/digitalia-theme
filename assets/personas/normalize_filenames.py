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
    # Remove any non-alphanumeric characters (except underscores)
    text = re.sub(r'[^\w\-]', '', text)
    # Replace multiple underscores with single underscore
    text = re.sub(r'_+', '_', text)
    return text

def rename_files(directory):
    for root, dirs, files in os.walk(directory):
        for filename in files:
            if filename.startswith('.'):  # Skip hidden files
                continue
                
            if filename.lower().endswith(('.jpg', '.jpeg')):
                old_path = os.path.join(root, filename)
                
                # Get the file extension
                _, ext = os.path.splitext(filename)
                
                # Normalize the filename
                new_filename = normalize_string(filename[:-len(ext)]) + ext.lower()
                new_path = os.path.join(root, new_filename)
                
                try:
                    os.rename(old_path, new_path)
                    print(f"Renamed:\n{filename}\nto:\n{new_filename}\n{'-'*50}")
                except Exception as e:
                    print(f"Error renaming {filename}: {str(e)}")

if __name__ == "__main__":
    root_directory = os.path.dirname(os.path.abspath(__file__))
    rename_files(root_directory)
    print("Renaming complete!")
