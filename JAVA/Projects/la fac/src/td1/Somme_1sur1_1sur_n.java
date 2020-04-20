
package td1;

import java.util.Scanner;

public class Somme_1sur1_1sur_n {
  
    public static void main(String[] args) {

        Scanner ss=new Scanner(System.in);
       int n;
        do {  System.out.println("donner n entre 1 et 100"); n=ss.nextInt();
            
        } while ( ! (n>0 && n<=100)  );

        float s=0;
        for (int i = 1; i <=n; i++) {
            s=(1)/(s+i);
        }
        
        System.out.println("la somme des "+n+" premier terme de la série hormonique est "+s);                
        
        
    }}
