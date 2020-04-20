package arraylist;

import java.util.*;
public class tparraylist {

   
    public static void main(String[] args) {


ArrayList <String> l1= new ArrayList<String> ();
        System.out.println(l1.isEmpty());
        
        l1.add("amine");    l1.add("ilyes"); l1.add("aamam"); l1.add("bsbsbs");
        
        System.out.println(l1.size());
        
        System.out.println(l1.isEmpty());
        
        System.out.println(l1.contains("amine"));
        
        l1.remove("ilyes");
        
        System.out.println(l1.size());
        
        for (int i = 0; i <l1.size(); i++) {
        
            System.out.println(l1.get(i));
        
        }

  } }
