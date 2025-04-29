import re

def transform_options_to_list(file_path):
    """
    Transforme les balises <option> en liste de chaînes entre apostrophes.
    Exemple : <option value="1">Algeria Djezzy</option> → 'Algeria Djezzy',
    """
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            content = file.read()

        # Trouver tous les textes entre <option ...> ... </option>
        pattern = r'<option\b[^>]*>(.*?)</option>'
        options_texts = re.findall(pattern, content, flags=re.DOTALL)

        # Nettoyer les espaces et sauts de ligne
        cleaned_texts = [text.strip() for text in options_texts]

        # Ajouter les apostrophes et virgules
        formatted_list = ",\n".join([f"'{text}'" for text in cleaned_texts])

        # Remplacer les options par la nouvelle liste
        new_content = re.sub(pattern, formatted_list, content, flags=re.DOTALL)

        with open(file_path, 'w', encoding='utf-8') as file:
            file.write(new_content)

        print(f"✅ Les balises <option> ont été transformées en liste dans {file_path}")

    except FileNotFoundError:
        print(f"❌ Erreur : Fichier {file_path} introuvable.")
    except Exception as e:
        print(f"❌ Erreur : {str(e)}")

# Exemple d'utilisation
file_path = '/home/nathan/Projet-Aroli/resources/views/supprimercountries.blade.php'
transform_options_to_list(file_path)




