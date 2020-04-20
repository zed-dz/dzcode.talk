
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;


public class exodemendechar {

   
    public static void main(String[] args) {

        
        
Scanner ss=new Scanner(System.in);
        System.out.println("donner un mot");   
String x=ss.nextLine();

int i,cpt=0,p=0,q=0;
Boolean t=false;
for (i=0; i<x.length(); i++) { 
    switch (x.charAt(i)) {
        case 'a':
            cpt=cpt+1;
            t=true;
            break;
        case 'e':
            p=p+1;
            t=true;
            break;
        case 'u':
            q=q+1;
            t=true;
            break;
        default:
            break;
    }
}    

      if (t==true) {System.out.println("ya "+cpt+" a et "+p+" e et "+q+" u");} 
else {System.out.println("ya aucun des caracteres demandés");}
 } } 

