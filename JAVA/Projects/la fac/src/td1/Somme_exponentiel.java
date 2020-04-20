
package td1;

import java.util.Scanner;

public class Somme_exponentiel {


    public static void main(String[] args) {
Scanner ss=new Scanner(System.in);
int n,x;
        do {         System.out.println("donner n");  n=ss.nextInt(); System.out.println("donner x");
        x=ss.nextInt();
            
        } while (! (n>=0 && n<34 && x>=0 && x<15 )    );
    
   
float s=0;      
 for (int i=0; i <=n; i++) {
    int f=1;     
    for (int j = 1; j <=n; j++) {
              f=f*j;
        }
         s=( (float) Math.pow(x, i) ) / f;      
        }
        System.out.println("la somme est "+s);
        
 
    }}
