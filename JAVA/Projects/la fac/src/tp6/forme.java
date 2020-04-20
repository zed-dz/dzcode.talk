package tp6;
public abstract class forme implements deplacable{

protected String couleur;
private point pointinitial;

public forme(String couleur, point pointinitial) {
    this.couleur = couleur;
    this.pointinitial = pointinitial;
    }
public abstract double surface(); 
public abstract double périmètre();
public abstract void afficher();


 public void rotation (double angle)
	{
/*double r = Math.sqrt(pointinitial.getX()*pointinitial.getX()+pointinitial.getY()*pointinitial.getY());
   double t = Math.atan2(pointinitial.getX(),pointinitial.getY());
   t += angle;
   p.setx(r*Math.cos(t));
	    p.setx(r*Math.sin(t));
	    */
		pointinitial.rotation(angle);
	}
	public void translation (double dx, double dy)
	{
		/*pointinitial.setX(pointinitial.getX()+dx);
		pointinitial.setY(pointinitial.getY()+dy);*/
		pointinitial.deplacer(dx, dy);
	}

    public void setCouleur(String couleur) {
        this.couleur = couleur;
    }

    public void setPointinitial(point pointinitial) {
        this.pointinitial = pointinitial;
    }

    public String getCouleur() {
        return couleur;
    }

    public point getPointinitial() {
        return pointinitial;
    }
    
public double getx()
	{
		return(pointinitial.getX());
	}
	public double gety()
	{		
		return(pointinitial.getY());
	}

    









}
