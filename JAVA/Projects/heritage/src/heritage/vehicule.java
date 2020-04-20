
package heritage;


public class vehicule {

protected double matricule,prix;
protected int année;

    public vehicule(double matricule, double prix, int année) {
        this.matricule = matricule;
        this.prix = prix;
        this.année = année;
    }
public String description (){
    return  "son matricule est"+matricule+"son prix est"+prix+"elle est de lannée"+année;
}    

}
