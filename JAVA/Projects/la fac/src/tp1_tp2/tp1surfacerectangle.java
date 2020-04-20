package tp1_tp2;

import java.util.Scanner;

public class tp1surfacerectangle {

  
    public static void main(String[] args) {
        
        Scanner lr=new Scanner(System.in);
        System.out.println("entrer la largeur");   
        double a=lr.nextDouble();
        
        Scanner lg=new Scanner(System.in);        
        System.out.println("entrer la longueur");   
        double b=lg.nextDouble();

        System.out.println("la surface est"+a*b);

    }
    
}
