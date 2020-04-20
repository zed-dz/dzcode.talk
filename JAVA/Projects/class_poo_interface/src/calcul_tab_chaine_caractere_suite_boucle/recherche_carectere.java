package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;


public class recherche_carectere {

    
    
    public static void main(String[] args) {

            
        Scanner ss=new Scanner(System.in);
        String x=ss.nextLine();
        Boolean t=false;
        for (int i=0; i<x.length(); i++) {
        
            if (x.charAt(i)=='o') { System.out.println("trouvéé");
             t=true; break; 
             
             //break tsama ghir ysibo yokhrj
             
        }
        } 
         if(t==false) {System.out.println("pas trouvé");  } }
    } 
