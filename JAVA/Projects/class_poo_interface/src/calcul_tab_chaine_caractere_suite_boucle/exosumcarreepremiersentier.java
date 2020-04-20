package calcul_tab_chaine_caractere_suite_boucle;

import java.util.Scanner;

public class exosumcarreepremiersentier {

  
    public static void main(String[] args) {
    
        
        Scanner ss=new Scanner(System.in);
        int a;
        do { System.out.println("donner un entier positif");  a=ss.nextInt(); }
         while (a<0); 
int y,s=0;    
for (int i=1; i<=a; i++) {
y=i*i; s=s+y;
    }     
System.out.println("la somme des carrées des "+a+" premiers entiers est "+s);
    } }

