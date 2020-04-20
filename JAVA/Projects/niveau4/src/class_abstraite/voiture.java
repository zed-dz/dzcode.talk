package class_abstraite;

public class voiture extends véhicule{

  public  int t;
    
    public voiture(int annee, int prix) {
this.annee=annee;
this.prix=prix;
t=véhicule.matricule;
    }

    @Override
    public void demarrer() {
        System.out.println(" demarerr voit");
    }

    @Override
    public void arreter() {
        System.out.println(" arretter voit");
    }

    @Override
    public String toString() {
        return t+" "+prix+" "+annee;
    }
    
   
}
