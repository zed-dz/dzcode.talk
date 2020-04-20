package calcul_tab_chaine_caractere_suite_boucle;


import java.util.Scanner;


public class tplogin {

    public static void main(String[] args) {
        Scanner ss=new Scanner (System.in);
        System.out.println("donner le nom dutiisateur");
        String x=ss.nextLine();
        System.out.println("donner le mot de passe ");
        String y=ss.nextLine();
         
        if ((x.equals("admin")) && (y.equals("admin"))) {
            System.out.println("vous etes connectée");
        }
        else {
            System.out.println("vous etes pas connectée");
        }
    
    
    }
    
}
