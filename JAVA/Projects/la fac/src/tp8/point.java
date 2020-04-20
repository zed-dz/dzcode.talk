package tp8;

public class point {
protected double x,y;

public point(double x,double y) throws CoordonneesException{
this.x=x; this.y=y;
if( x<0 || y<0) {
throw new CoordonneesException("coordonées negatives");
}
}
public String afficher(){
return " valeur de x est "+x+" valeur de y est "+y; 
}
public void deplacer (double dx,double dy) throws DeplacementException{ 
if(dx == 0 && dy == 0){
    throw new DeplacementException("ya aucun deplacement");
}
    x=x+dx;  y=y+dy; 
}

}
