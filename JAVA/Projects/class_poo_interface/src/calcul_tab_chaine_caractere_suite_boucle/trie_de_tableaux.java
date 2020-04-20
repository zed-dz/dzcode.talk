
package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;


public class trie_de_tableaux {

  
    public static void main(String[] args) {

int i,j,x,n=6;
int t [] = new int [n];
Scanner ss=new Scanner(System.in);

for (i=0; i<n; i++) {
    System.out.println("donner un élément");
    t[i]=ss.nextInt();
}

for (j=n-1; j>=1; j--){

 for(i=0; i<j; i++){
    
    if (t[i]>t[i+1]) {       x=t[i]; t[i]=t[i+1]; t[i+1]=x;     }
}
}
        System.out.println("\n");        
for(i=0; i<n; i++){
    System.out.print(t[i]);
}
    } }
