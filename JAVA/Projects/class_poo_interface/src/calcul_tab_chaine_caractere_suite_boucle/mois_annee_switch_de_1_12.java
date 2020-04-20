package calcul_tab_chaine_caractere_suite_boucle;

public class mois_annee_switch_de_1_12 {

    public static void main(String[] args) {



for (int i=1;i<=12 ;i++) {
switch(i){    
    case 2:
        for (int j=1; j<29;j++){
            System.out.println(j+"/"+i);
            } break;
            
    case 1:
    case 3:
    case 5:
    case 8:
    case 7:
    case 10:
    case 12:
        
        for (int j=1; j<=31;j++){
            System.out.println(j+"/"+i);
        }
break;
    default:
        for (int j=1; j<=30; j++){
            System.out.println(j+"/"+i);
        }
break;

} } 


} } 





