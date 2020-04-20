package tp1_tp2;


import java.util.Scanner;


public class tp1pair {

  
    public static void main(String[] args) {

   Scanner pr=new Scanner(System.in);
        System.out.println("taper un nombre");
            int a=pr.nextInt();
       
        if (  a%2==0 ) {
            System.out.println("le nmobre "+a+" est pair");
        }
        else{
            System.out.println("le nombre "+a+" est impair");            
        }

    }
    
}
