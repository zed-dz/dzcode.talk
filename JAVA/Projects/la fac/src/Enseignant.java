import java.util.ArrayList;

public class Enseignant extends Personnel {

private String specialite, grade;
private ArrayList <String> matiereEnseigne;
public Enseignant(String nom, String prenom, long numeroSS,
int anneeNaissance, int annéeRecrutement, String specialite,
String grade, ArrayList<String> matiereEnseigne) {
super(nom, prenom, numeroSS, anneeNaissance, annéeRecrutement);
this.specialite = specialite;
this.grade = grade;
this.matiereEnseigne = matiereEnseigne;
}

public void afficher(){
super.afficher();
System.out.println("\n "+specialite+ " "+ grade+ " "+
matiereEnseigne.toString() );
}
}
