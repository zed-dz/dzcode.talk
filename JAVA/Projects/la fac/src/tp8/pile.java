package tp8;


public class pile {

    private int t[],n,sommet;
    
    public pile(int n) {
        this.n=n;
        t=new int [n];
        sommet=0;
    }
/* public boolean pilevide(){ return sommet==-1; } public boolean pilepleine(){ return sommet==n-1; }  */

public void empiler(int x )throws pilepleineException {
if(sommet>n) throw new pilepleineException("pile pleine !");
t[sommet]=x;
sommet++;
}

public void empiler2(int x) throws pilepleineException{
try{    
t[sommet]=x;
sommet++;
}catch(ArrayIndexOutOfBoundsException e){
    throw new pilepleineException("pile pleine2 !!:;");
}
} 


public int depiler() throws pilevideException {
sommet--;  
if (sommet<0) throw new pilevideException("pile vide !");
return t[sommet];
}
 
public int depiler2() throws pilevideException{
try{
sommet--;
return t[sommet];
}catch(ArrayIndexOutOfBoundsException e){
 throw new pilevideException("pile vide2 :!!;");
}
}
  



}
