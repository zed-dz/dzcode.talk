package tp1_tp2;

import java.util.Scanner;

public class tp1nbrprm {

  
    public static void main(String[] args) {
Scanner ss=new Scanner(System.in);
        System.out.println("donner un nbr");
int a=ss.nextInt();
boolean t=false;
    int i = 2;
    while(i<a && t==false){        
            if( a%i==0 && a%1==0 ){
                t=true;                   
            }
            else{
                i++;
            }
        }
        
        if(t==false) { System.out.println("le nbr "+a+" est premier");
        } else {
    System.out.println("le nbr "+a+" nest pas premier");
}

    }
    
} 
