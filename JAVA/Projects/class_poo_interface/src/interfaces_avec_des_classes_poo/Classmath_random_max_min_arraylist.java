package interfaces_avec_des_classes_poo;

import java.util.*;

public class Classmath_random_max_min_arraylist {

 
    public static void main(String[] args) {

        int x=1;
        double b=7.2;
        
        System.out.println(Math.PI);
        System.out.println(Math.E);
        System.out.println(Math.max(x,b));
        System.out.println(Math.min(5.0, 21));
               
        sousclassMath q= new sousclassMath(5);
      System.out.println("la surface est "+q.surface()+" le perimetre est "+q.perimetre());


      ArrayList<Integer> l1=new ArrayList<>();

        for (int i = 0; i < 10; i++) {
     
 int k=(int)(Math.random()*25); // 10 nombre entier aux hassard sans vergule entre 0 et 25
             
  if(!l1.contains(k)) { 
// si la liste ne contient pas cette element alors on lajoute juste pr eviter les doublants
            
            l1.add(k); }}
  
        for(int i=0; i<l1.size(); i++){
            System.out.println(l1.get(i));
        }
        
    }
    
}


