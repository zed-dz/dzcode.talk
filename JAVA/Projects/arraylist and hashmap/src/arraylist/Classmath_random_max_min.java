package arraylist;

import java.util.*;

public class Classmath_random_max_min {

 
    public static void main(String[] args) {

        ArrayList<Integer> l1=new ArrayList<>();
        
        
        int x=1;
        double b=7.2;
        
        System.out.println(Math.PI);
        System.out.println(Math.E);
        System.out.println(Math.max(x,b));
        System.out.println(Math.min(5.0, 21));
               
                sousclassMath q= new sousclassMath(5);
                System.out.println("la surface est "+q.surface()+" le perimetre est "+q.perimetre());

                
        
        for (int i = 0; i < 10; i++) {
            System.out.println(Math.random()*6); //10 nombre random inferieure a 0.6
        }
    
        System.out.println("\n");
                     
        for (int i = 0; i < 10; i++) {  //on veut 10 nombre
     
            int k=(int)(Math.random()*25);  // des entier sans vergule entre 0 et 25
             
            if(!l1.contains(k)) { // on ajoute pas les doublants 
            
            l1.add(k);
            
        }
        }
        
        for(int i=0; i<l1.size(); i++){
            System.out.println(l1.get(i));
        }
        
    }
    
}


