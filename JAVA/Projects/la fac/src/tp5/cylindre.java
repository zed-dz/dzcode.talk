package tp5;

public class cylindre extends cercle{
   private double hauteur;
      
    public cylindre() {
       hauteur=0;
    }
   
    public cylindre(double x,double y, double rayon, String couleur,double hauteur) {
        super(x,y,rayon,couleur);
          this.hauteur=hauteur;
    }
  public double volume(){
return surface()*hauteur;
        }
public String toString(){    
return super.toString()+" son hauteur est "+hauteur;
}

public boolean equal(Object z){
if(! (z instanceof cylindre))
return false;
cylindre c=(cylindre)z;
   
 cercle b=new cercle (c.x,c.y,c.rayon,c.couleur);
//return ((super.equal((cercle)z)) && (hauteur==z.hauteur));

return ( super.equal(b) && hauteur==c.hauteur );

}

}
