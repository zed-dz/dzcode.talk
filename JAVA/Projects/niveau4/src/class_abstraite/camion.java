package class_abstraite;

public class camion extends véhicule{

public int c;

public camion(int annee, int prix) {
this.annee=annee;   this.prix=prix;
c=véhicule.matricule;
        }

    @Override
    public void demarrer() {
        System.out.println("demmarer camion");
    }

    @Override
    public void arreter() {
        System.out.println("arreter camion");
    }

    @Override
    public String toString() {
        return c+" "+prix+" "+annee;
    }

    
    
}
