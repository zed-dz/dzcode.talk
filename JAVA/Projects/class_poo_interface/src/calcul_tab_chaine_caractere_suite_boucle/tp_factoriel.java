
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;

public class tp_factoriel {

    
    public static void main(String[] args) {

    Scanner ss=new Scanner(System.in);
    System.out.println("donner un nombre");
    int a=ss.nextInt();
    int p=1;
    for (int i=1; i<=a; i++) {
        p=p*i;
    }
        System.out.println("le factoriel de "+a+" est "+p);   
  
    }}