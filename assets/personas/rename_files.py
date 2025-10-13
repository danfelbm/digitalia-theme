import os
import re

def get_person_info(folder_name):
    # Split the folder name into components
    parts = folder_name.split(' - ')
    if len(parts) >= 3:
        name = parts[0]
        department = parts[1]
        role = parts[2]
        return name, department, role
    return None

def rename_files(root_dir):
    # Skip hidden files/folders
    if root_dir.startswith('.'):
        return
        
    # Iterate through all folders
    for folder_name in os.listdir(root_dir):
        folder_path = os.path.join(root_dir, folder_name)
        
        # Skip files and hidden folders
        if not os.path.isdir(folder_path) or folder_name.startswith('.'):
            continue
            
        # Get person's information from folder name
        person_info = get_person_info(folder_name)
        if not person_info:
            continue
            
        name, department, role = person_info
        
        # Process each file in the folder
        for idx, filename in enumerate(os.listdir(folder_path), 1):
            if filename.startswith('.'):
                continue
                
            # Get file extension
            _, ext = os.path.splitext(filename)
            
            # Create new filename
            new_filename = f"{name} - {department} - {role} ({idx}){ext}"
            
            # Full paths
            old_path = os.path.join(folder_path, filename)
            new_path = os.path.join(folder_path, new_filename)
            
            # Rename the file
            try:
                os.rename(old_path, new_path)
                print(f"Renamed: {filename} -> {new_filename}")
            except Exception as e:
                print(f"Error renaming {filename}: {str(e)}")

if __name__ == "__main__":
    root_directory = os.path.dirname(os.path.abspath(__file__))
    rename_files(root_directory)
    print("Renaming complete!")
