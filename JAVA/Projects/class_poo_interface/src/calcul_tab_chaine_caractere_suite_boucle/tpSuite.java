package calcul_tab_chaine_caractere_suite_boucle;


import java.util.Scanner;


public class tpSuite {

  
    public static void main(String[] args) {

        Scanner cc=new Scanner(System.in);
      int a;
     do { System.out.println("donner a egale a 6");
     a=cc.nextInt(); 
     }while (a!=6);
     
        long u=0,p=5;
        for (int j=1; j<=15; j++)
        {  for (int i=6; i<=a; i++){
            u=5*p+2; 
            p=u;
        }          System.out.println("le " +j+" terme de cette suite est "+u); 
        }
    } }
