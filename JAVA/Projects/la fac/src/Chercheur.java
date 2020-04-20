import java.util.ArrayList;

public class Chercheur extends Enseignant{

private String domaineDeRecherches;
private ArrayList <String> ListeDePublications;
public Chercheur(String nom, String prenom, long numeroSS, int anneeNaissance, int annéeRecrutement, String specialite,
String grade, ArrayList<String> matiereEnseigne,String domaineDeRecherches, ArrayList <String> ListeDePublications) {

 super(nom, prenom, numeroSS, anneeNaissance, annéeRecrutement,specialite, grade, matiereEnseigne);
this.domaineDeRecherches = domaineDeRecherches;
this.ListeDePublications = ListeDePublications;
}
public void afficher(){
super.afficher();
System.out.println("\n "+ domaineDeRecherches+ " "+
ListeDePublications.toString());
}
}
