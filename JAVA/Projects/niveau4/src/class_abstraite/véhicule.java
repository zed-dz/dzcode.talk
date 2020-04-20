package class_abstraite;

public abstract class véhicule {

public static int matricule=0;    
public int annee,prix;

    public véhicule() {
    matricule++;        
    }

public abstract void demarrer();
public abstract void arreter();
public abstract String toString();
}
