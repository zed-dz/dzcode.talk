
package td1;

import java.util.Scanner;

public class factoriel {

   
    public static void main(String[] args) {
       
Scanner ss=new Scanner (System.in);
System.out.println("donner un nbr");
int a=ss.nextInt();   
        int f=1;
        for (int i=1; i <=a; i++) {
            f=f*i; 
          }
        
        System.out.println("le factoriel est "+f);
        
        
        
        
    }}
