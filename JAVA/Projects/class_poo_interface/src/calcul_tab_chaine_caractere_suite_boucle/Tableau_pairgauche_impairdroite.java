
package calcul_tab_chaine_caractere_suite_boucle;


public class Tableau_pairgauche_impairdroite {

    
    public static void main(String[] args) {
int t[]={1,2,4,3,5,6,9,10,8,7},i,x,n=10;
 int t1[]=new int [n];

for(i=0; i<t.length; i++) {
    System.out.print(t[i]);
}
        System.out.println("\n");
int j=0 , k=n-1;
for(i=0; i<t.length; i++) {
     if (t[i]%2==0){
         t1[j]=t[i];        
        j++;
           
    } 
    else {
    t1[k]=t[i];
    k--;
      
    }
}

for(i=0; i<t1.length; i++) {
    System.out.print(t1[i]);
}
        System.out.println("\n");
        
   
    } }
