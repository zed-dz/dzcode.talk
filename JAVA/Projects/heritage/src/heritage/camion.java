
package heritage;

public class camion extends vehicule {

private String capacité;

    public camion(String capacité, double matricule, double prix, int année) {
        
        super(matricule, prix, année); // si on veut forcer lajout de ses attributs dans le constructeur sans les définir en debut
        this.capacité = capacité;
        
    }
public String description(){
    
return " la capacitéé de votre camion est "+capacité+" son matricule est "+matricule+" son prix est "+prix+" de l'année "+année;
}
   


        
}
