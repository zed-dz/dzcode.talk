package tp6;

public class rectangle extends forme{

private Double longueur;
private Double largeur;

        public rectangle(double longueur , double largeur, String couleur, point pointinitial) {
            super(couleur, pointinitial);
            this.longueur = longueur;       
            this.largeur = largeur;
        }
    public double surface(){
    return (Math.PI)*(Math.pow(5,2));        
    }
    public double périmètre(){
         return 2*Math.PI*5;  
    }
    public void afficher(){
System.out.println("je suis un réctangle de largeur et longueur et de couleur "+largeur+longueur+getCouleur()+"et de point superieur gauche"+getx()+""+gety());
    }

      public void setCouleur(String couleur) {
        this.couleur = couleur; }
     //ca marche pas car il est déclarer private et ici this recoit une valeur donc si on met getCouleur elle 
     //sera recu comme objet pas comme valeur donc la seule solution cest de declarer couleur comme protected    
      
    
        public Double getLongueur() {
            return longueur;
        }

        public Double getLargeur() {
            return largeur;
        }

        public void setLongueur(Double longueur) {
            this.longueur = longueur;
        }

        public void setLargeur(Double largeur) {
            this.largeur = largeur;
        }
}
