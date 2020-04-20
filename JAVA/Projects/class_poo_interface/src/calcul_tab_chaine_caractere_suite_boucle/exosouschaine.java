
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;


public class exosouschaine {

    public static void main(String[] args) {

        
System.out.println("donner votre chaine de caractere");

Scanner ss=new Scanner (System.in);
String x=ss.nextLine();
Boolean t=false;

for (int i=0; i<x.length(); i++) {
if (x.charAt(i)=='o') { if ( x.charAt(i+1)=='u'){ if(x.charAt(i+2)=='i') {
    System.out.println("trouvéé"); 
    t=true;
}
 }
}
}if (t==false) { System.out.println("pas trouvéé"); }
    } } 
         
