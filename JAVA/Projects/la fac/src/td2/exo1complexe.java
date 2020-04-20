/*
1. Écrire une classe Complexe permettant de représenter des nombres complexes. Un nombre
complexe X comporte une partie réelle et une partie imaginaire :
X = PartieRéelle + PartieImaginaire * i
2. Définir pour la classe Complexe les méthodes suivantes:
- Un constructeur qui permet d'initialisation des attributs.
- Un constructeur sans paramètres.

- PlusComplexe : Elle permet de retourner le résultat de l'addition du nombre complexe en
cours et un nombre complexe passé en argument.
-
MoinsComplexe:: Elle permet de retourner le résultat de la soustraction du nombre
complexe en cours et un nombre complexe passé en argument.

- Afficher : affiche le nombre complexe comme suit : a+b*i.

- Redéfinir la méthode equals pour vérifier l'égalité de deux nombres complexes.

3. Écrire un programme permettant de tester la classe Complexe.

 */
package td2;

public class exo1complexe {
    
    private int r,i;
       
    public void setR(int r) {
        this.r = r;
    }

    public void setI(int i) {
        this.i = i;
    }
    
    public exo1complexe (int r,int i){
        this.r=r;
        this.i=i;
    
    }

    public int getR() {
        return r;
    }

    public int getI() {
        return i;
    }
  
public String affichage(){    
 if(i<0) { return r+"i"+i; }
   else { return r+"i+"+i; }  
}    
public String addition (exo1complexe z) {
   r=r+z.r;
    i=i+z.i;
return affichage(); 
}
public String soustraction (exo1complexe z) {
    r=r-z.r;
    i=i-z.i;

    return affichage(); 
 
} 

public boolean equal(exo1complexe z){
    
return ((r==z.r) && (i==z.i));
        
}


public static void main(String [] args){
    
  exo1complexe z1 = new exo1complexe (2,2);
  exo1complexe z2 = new exo1complexe (2,2);
  exo1complexe z3 = new exo1complexe (3,4);
  
  z1=z3;
  
   System.out.println(z1.affichage());
  
   System.out.println(z3.affichage());

   System.out.println(z1.addition(z3));

   System.out.println(z1.soustraction(z3));
 
if(  z1.getR()==z2.getR() && z1.getI()==z2.getI()   ) {
        System.out.println("les deux nombre complexe sont egaux"); }
else    { System.out.println("ils ne sont pas egaux");  }

    System.out.println(z1.equal(z3));
    System.out.println(z1.equals(z3));

}}
