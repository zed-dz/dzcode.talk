package calcul_tab_chaine_caractere_suite_boucle;


import java.util.Scanner;


public class whileboucle {

    public static void main(String[] args) {
        Scanner ss=new Scanner (System.in);
        char rep='o';
        while (rep=='o'){
        System.out.println("donner votre nom");
        String a =ss.nextLine();
        System.out.println("bonjour "+a+" comment vas tu ?");
            System.out.println("répéter o/n");
        rep=ss.nextLine().charAt(0);
        }        
        while ((rep!='o') && (rep!='n')) {
        { System.out.println("répéter o/n"); 
        rep=ss.nextLine().charAt(0);
                
        }
    } } }
    
    
    

