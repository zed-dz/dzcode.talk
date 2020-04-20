
package autre;


public class studio {
  
    public String voix,editeur;
    public int instruments;
    
    public studio(String editeur,int instruments){
        this.editeur=editeur;   this.instruments=instruments;
    }
    public void chanter(int n) throws studio_excep{ 
        if(n>0){
            System.out.println(" vous avez "+instruments+" instruments avec mr"+editeur);
        }else{
            throw new studio_excep("ya pas de chanteur");
        }
        
    }
    
}
