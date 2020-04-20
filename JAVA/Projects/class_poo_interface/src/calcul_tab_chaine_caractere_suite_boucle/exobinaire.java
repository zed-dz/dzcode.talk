package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;

public class exobinaire {

    public static void main(String[] args) {

      String b,s=""; 
      
Scanner nb=new Scanner(System.in);
        System.out.println("donner un nombre");
       int a=nb.nextInt();
    
       while (a!=0) {
       b=Integer.toString(a%2);   a=a/2;      
       s=b+s;  
    }
        System.out.println(s);
    
    } }  



   
    
    
    
