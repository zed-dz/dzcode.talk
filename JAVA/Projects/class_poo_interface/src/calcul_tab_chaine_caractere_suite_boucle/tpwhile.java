package calcul_tab_chaine_caractere_suite_boucle;


import java.util.Scanner;


public class tpwhile {

    public static void main(String[] args) {


        Scanner ss=new Scanner(System.in);
        System.out.println("donner un nom");
        String x=ss.nextLine();
        boolean t=false; 
        
        int i=0;
        
        while((i<x.length()) && (x.charAt(i)!='o')) { i++; }        
        if (i==x.length()) {System.out.println("pas trouvééééééééé "); 
        t=true; } 
        if(t==false) {System.out.println("trouvvvééé"); }
         
    } } 

