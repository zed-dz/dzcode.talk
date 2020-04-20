public class Personnel implements Comparable {
private String nom,prenom;
private long numeroSS;
private int anneeNaissance,annéeRecrutement ;
public Personnel(String nom, String prenom, long numeroSS, int anneeNaissance,
int annéeRecrutement) {
this.nom = nom;
this.prenom = prenom;
this.numeroSS = numeroSS;
this.anneeNaissance = anneeNaissance;
this.annéeRecrutement = annéeRecrutement;
}
public void afficher(){
System.out.println(nom+ " "+ prenom+ " "+ numeroSS+" "+ anneeNaissance+ " " +
annéeRecrutement );
}
public int compareTo(Object O){ 
Personnel P=(Personnel)O;
if (nom.compareTo(P.nom)== 0)
return (prenom.compareTo(P.prenom));
return nom.compareTo(P.nom);
}
}

