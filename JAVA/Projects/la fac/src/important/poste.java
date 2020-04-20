
package important;

import td2.*;
import java.util.*;

public class poste {
    ArrayList <bancaire> t= new ArrayList <bancaire>();
 
    public void ajouterccp(bancaire c){
        t.add(c);        
    }
    public int getNbrCompte(){
        return t.size();
    }
    public String affichertous(){
        String k="";
        for (int i = 0; i <t.size(); i++) {
            k+=t.get(i).affichage()+"\n";
        }
   return k; 
    }    
    public double soldcasse(){        
        double s=0;
        for (int i = 0; i <t.size(); i++) {
       s+=t.get(i).sold;  
        }
      return s;
    }        
    public boolean recherchecompte(bancaire c){        
     for (int i = 0; i <t.size(); i++) {
            return t.contains(c);
        } 
        return false;
    } /*
       public boolean recherchecompte(long num){        
        for (int i = 0; i <t.size(); i++) {
            return t.get(i).numccp==num;
        }
        return false;
    } */
}

