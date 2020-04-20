package tp6;

public class cercle extends forme{

protected double rayon;
private double x;
private double y;

        public cercle(double rayon, String couleur, point pointinitial) {
            super(couleur, pointinitial);
            this.rayon = rayon;
        }


public double surface(){    return (Math.PI)*(Math.pow(rayon,2));    }

public double périmètre (){         return 2*Math.PI*rayon;            }           

public void afficher(){    
System.out.println(" le rayon "+rayon+" la couleur "+getCouleur()+" je suis un cercle de cordonnées "+getx()+" "+gety());
}
   public void setCouleur(String couleur) {
        this.couleur = couleur; }
   
        public double getRayon() {
            return rayon;
        }

        public double getX() {
            return x;
        }

        public double getY() {
            return y;
        }

        public void setRayon(double rayon) {
            this.rayon = rayon;
        }

        public void setX(double x) {
            this.x = x;
        }

        public void setY(double y) {
            this.y = y;
        }


    }
