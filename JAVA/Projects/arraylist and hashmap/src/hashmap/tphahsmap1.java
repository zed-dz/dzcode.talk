
package hashmap;
import java.util.*;

public class tphahsmap1 {

  
    public static void main(String[] args) {


Map <String,ArrayList<String>> m1= new HashMap <String,ArrayList<String>>();

ArrayList<String> l1=new ArrayList <String>();

l1.add("apprendre java"); l1.add("orienté objet"); l1.add("GUI");         

m1.put("clé",l1);   //hashmap recoit deux parametre la clé et ca valeur donc cest un string alors on donne un nom de clé et ca valeur de arraylist 

System.out.println(m1.get("clé")); //on affiche on recuperons juste le nom de la clé 


    }
    
}
