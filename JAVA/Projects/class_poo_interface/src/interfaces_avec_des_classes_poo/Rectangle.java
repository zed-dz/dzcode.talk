package interfaces_avec_des_classes_poo;

 public class Rectangle {
 public int longueur,longueur1,largeur,largeur1;

 public Rectangle(int longueur, int largeur,int largeur1, int longueur1) {
        this.longueur = longueur;
        this.largeur = largeur;
        this.longueur1 = longueur1;
        this.largeur1 = largeur1;  
    }

    
public double aire (){
       return largeur*longueur;
   }
public double aire2 (){
       return largeur1*longueur1;
   }
public double perimetre () {
       return 2*(longueur+largeur);
   } 
public String iscarre () {
    String k;
    if (largeur==longueur) { k="ce rectangle est carré"; }
    else { k="ce rectangle nest pas carré"; }
    return k;
    }     
public String comparaison () { 
    String c;
    if (largeur*longueur==largeur1*longueur1) { c="ils ont le meme aire"; }
    else { c="ils ont pas le meme aire "; }
return c;
}
    
    
    
    
    
    
    
    
    
    
}
