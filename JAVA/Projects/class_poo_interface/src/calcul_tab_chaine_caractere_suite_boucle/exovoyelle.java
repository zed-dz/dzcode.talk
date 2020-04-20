
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;


public class exovoyelle {

    
    public static void main(String[] args) {

Scanner ss=new Scanner(System.in);
        System.out.println("donner un mot");   
String x=ss.nextLine();
Boolean t=false;
int i,cpt=0;
for (i=0; i<x.length(); i++) { 
    if (x.charAt(i)=='e' || x.charAt(i)=='u' || x.charAt(i)=='i' || x.charAt(i)=='a')
{ 
   cpt=cpt+1;  
   t=true;
  } 
}  if (t==true){System.out.println("il ya "+cpt+" voyelle");} 
else { System.out.println("ya aucune voyelle"); }
    } } 
