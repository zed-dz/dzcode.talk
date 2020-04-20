
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;

public class exonbrpremier {

        
    public static void main(String[] args) {
        
        int cpt=0;
        System.out.println("donner un nombre");
        Scanner ss=new Scanner (System.in);
        int a=ss.nextInt();
        
        for (int i=1; i<=a; i++) {
        if(a%i==0){  cpt=cpt+1; } 
        }
        
    if(cpt==2)  //psk ya9bal l9isma ghir 3la roho w 3la lwahad 
    {System.out.println("ce nombre est premier"); }
    else { System.out.println("le nombre nest pas premier"); }
    }}
