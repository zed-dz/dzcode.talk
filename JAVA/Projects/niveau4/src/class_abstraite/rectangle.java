
package class_abstraite;


public class rectangle extends forme{

   protected int largeur,longeur;
    
    public rectangle(int largeur,int longeur){
        this.largeur=largeur;
        this.longeur=longeur;        
    }

public void representation(){  System.out.println( "je suis rectangle ");  }

    @Override
    public double getsurface() {
return largeur*longeur;
    }

    @Override
    public double getsuperficie() {
return (largeur+longeur)*2;
    }
            
}
