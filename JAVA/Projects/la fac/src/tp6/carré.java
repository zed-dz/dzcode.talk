package tp6;

public class carré extends forme{
    private double cote;

        public carré(double cote, String couleur, point pointinitial) {
            super(couleur, pointinitial);
            this.cote = cote;
        }
 public double surface(){
    return (Math.PI)*(Math.pow(5,2));        
    }
    public double périmètre(){
         return 2*Math.PI*5;  
    }
    public void afficher(){
System.out.println("je suis un carre de cote "+cote+"et de point superieur gauche"+getx()+""+gety()+"et de couleur"+getCouleur());    }
   public void setCouleur(String couleur) {
        this.couleur = couleur; }
   
        public double getCote() {
            return cote;
        }

        public void setCote(double cote) {
            this.cote = cote;
        }

} 
