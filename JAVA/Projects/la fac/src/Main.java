import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

public class Main {

public static void main(String[] args) {
Personnel T[]; int i,c;boolean stop=true;
String nom, prenom,specialite, grade, matiere, domaineDeRecherches;
long numeroSS;
int anneeNaissance, annéeRecrutement,nombrePublications;
ArrayList <String> matiereEnseigne=new ArrayList <String>();
ArrayList <String> ListeDePublications=new ArrayList <String>();
Scanner sc=new Scanner(System.in);
System.out.println("donner la taille du tableau");
int n=sc.nextInt();
T=new Personnel[n];
for(i=0;i<n;i++){
do{
System.out.println("donner un entier");
c=sc.nextInt();
System.out.println("donner le nom");
nom=sc.next();
System.out.println("donner le prenom");
prenom=sc.next();
System.out.println("donner le numeroSS");
numeroSS=sc.nextLong();
System.out.println("donner anneeNaissance");
anneeNaissance=sc.nextInt();
System.out.println("donner annéeRecrutement");
annéeRecrutement=sc.nextInt();
switch (c){
case 0:
T[i]=new Personnel(nom,prenom,numeroSS,anneeNaissance,annéeRecrutement);
stop=true;
break;
case 1:
System.out.println("donner specialite");
specialite=sc.next();
System.out.println("donner grade");
grade=sc.next();
T[i]=new
Enseignant(nom,prenom,numeroSS,anneeNaissance,annéeRecrutement,specialite,
grade,matiereEnseigne);
stop=true;
break;
case 2:
System.out.println("donner specialite");
specialite=sc.next();
System.out.println("donner grade");
grade=sc.next();
System.out.println("donner domaineDeRecherches");
domaineDeRecherches=sc.next();
System.out.println("donner nombrePublications");
nombrePublications=sc.nextInt();
T[i]=new
Chercheur(nom,prenom,numeroSS,anneeNaissance,annéeRecrutement,specialite,
grade,matiereEnseigne,domaineDeRecherches, ListeDePublications);
stop=true;
break;
default:stop=false;
}
}while(!stop);
}
Arrays.sort(T);
for(i=0;i<n;i++) T[i].afficher();
}
    
}
