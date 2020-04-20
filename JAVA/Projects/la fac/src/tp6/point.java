package tp6;

public class point {
protected double x;
protected double y;
public static int s=0;
point ()        {     s++;     }
// le constructeur vide par default howa li ydirana point p=new point(); sans donnée w tjr ykon mdefini bla matcriyih
public point(double x,double y){
this.x=x; this.y=y; s++;
}
public String afficher(){
return " valeur de x est "+x+" valeur de y est "+y; }
public boolean equal(point p){ 
return (x==p.x && y==p.y); }

public void deplacer (double dx,double dy){ x=x+dx;  y=y+dy; }
public void rotation (double angle)
{
    double r = Math.sqrt(x*x+y*y);
    double t = Math.atan2(x,y);
    t += angle;
    x = r*Math.cos(t);
    y = r*Math.sin(t);
}

public double getX(){
return x;  }
public double getY(){
return y;
}
public void setX() { this.x=x; }
public void setY() { this.y=y; }   


}
/*
public void setxy(double x,double y)
{
	this.x=x;
	this.y=y;
}
*/ /*
public double[] getxy()
{
	double[]t=new double[2];
	t[0]=x;
	t[1]=y;
	return t;
}
*/
