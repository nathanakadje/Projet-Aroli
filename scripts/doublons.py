import re

def remove_duplicates_from_file(file_path):
    """
    Supprime les doublons dans un fichier contenant des valeurs entre apostrophes
    """
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            content = file.read()
        
        # Trouver toutes les valeurs
        pattern = r"'([^']+)'"
        values = re.findall(pattern, content)
        
        # Supprimer les doublons
        seen = set()
        unique_values = []
        for value in values:
            cleaned_value = value.strip()
            if cleaned_value not in seen:
                seen.add(cleaned_value)
                unique_values.append(cleaned_value)
        
        # Recréer le contenu
        new_content = ",\n".join([f"    '{value}'" for value in unique_values])
        
        # Réécrire le fichier
        with open(file_path, 'w', encoding='utf-8') as file:
            file.write(new_content)
            
        print(f"✅ Doublons supprimés dans {file_path}")
        print(f"🔢 {len(values) - len(unique_values)} doublons trouvés et supprimés")
    
    except Exception as e:
        print(f"❌ Erreur: {str(e)}")

# Utilisation
remove_duplicates_from_file('/home/nathan/Projet-Aroli/resources/views/supprimercountries.blade.php')