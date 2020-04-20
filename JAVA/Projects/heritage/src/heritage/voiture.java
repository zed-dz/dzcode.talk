
package heritage;


public class voiture extends vehicule {

    private int place,vitesse,type;

    public voiture( double matricule ,double prix ,  int année, int vitesse  , int place, int type) {
        super(matricule, prix, année);
        this.place = place;
        this.vitesse = vitesse;
        this.type = type;
        
    }
    
    public String description(){
return " son matricule est "+matricule+" son prix est \n "+prix+" de l'année "+année+
        " la vitesse est \n "+vitesse+" les places sont "+place+" le nombre de cheveaux sont "+type;
}
    
    
    
    public String VITESSE (String k){
        
        if (vitesse <200) {
            k=" class A ";
        } 
        else if (vitesse>=200 && vitesse<300) {
            k=" class B ";           
        }
        else { k=" class C "; } 
   return k;
    }
    public String PLACE (String y){
        if (place<=4) {
            y=" categorie normal ";
        }
        else if (place>4 && place<=6){
            y=" categorie taxi ";
        }
        else {
            y=" categorie limosine ";
        }
    return y;
    }
    public String TYPE (String g){
        if (type<=300) {
            g=" voiture léger ";
        }
        else if (type>300 && type<=500){
            g=" voiture moyenne ";
        }
        else {
            g=" voiture de sport ";
        }
    return g;
    
    }   


}
