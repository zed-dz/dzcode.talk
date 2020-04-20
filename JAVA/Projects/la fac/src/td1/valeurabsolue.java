
package td1;

import java.util.Scanner;

public class valeurabsolue {

   
    public static void main(String[] args) {

Scanner ss=new Scanner(System.in);
        System.out.println("taper a");
int a=ss.nextInt();
if(a<0){
    int b=-a;
    System.out.println("la val abs de "+a+" est "+b);
}
else{
    System.out.println("la val abs de "+a+" est"+a);
}



    }
    
}
