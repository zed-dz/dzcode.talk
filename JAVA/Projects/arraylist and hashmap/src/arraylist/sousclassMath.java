package arraylist;

public class sousclassMath {

public int lg; 

    public sousclassMath(int lg) {
        this.lg = lg;
    }
    
    public double surface(){
        return Math.pow(lg,2);
    }
    public double perimetre(){
   return lg*4;
    }    
    
}
