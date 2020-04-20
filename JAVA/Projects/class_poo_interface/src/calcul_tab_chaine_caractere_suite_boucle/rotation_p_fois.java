
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;

public class rotation_p_fois {

       public static void main(String[] args) {
        
           Scanner sc=new Scanner(System.in);
           System.out.println("donner la taille du tab ensuite le nbr de rotation");
           int n=sc.nextInt();
           int p=sc.nextInt();
           int [] t=new int [n]; 
           System.out.println("svp remplit votre tab");
                     for (int i = 0; i <n; i++) {               
               t[i]=sc.nextInt();
           }
           
    for ( int k = 1; k<=p; k++) {                     
            int x=t[0];            
            for ( int j = 0; j<n-1; j++) {
            t[j]=t[j+1];              
            }            
            t[n-1]=x;
 }

        for (int  j=0; j<n; j++) {
                    System.out.println(t[j]);
        }
    }
    
}
