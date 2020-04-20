package tp4_tp3;
public class cercle {

private double rayon;
private point centre;

public cercle(double x1, double y1,double rayon) {
    centre =new point (x1,y1);
     this.rayon = rayon;  
    }   

public cercle(point o,double rayon) {           
    centre=o;
    this.rayon = rayon;    
    }
    
       
public void afficher2(){
    System.out.println(" le centre est "+centre.afficher()+" la valeur du rayon est "+rayon+ "\n" );   
}

public boolean equal2(cercle z){ 

return (centre.equal(z.centre) && rayon==z.rayon);

}

public void deplacer2 (double dx,double dy,double dr){

centre.deplacer(dx, dy);
rayon=rayon+dr;    

}

}
    
