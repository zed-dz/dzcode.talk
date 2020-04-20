package calcul_tab_chaine_caractere_suite_boucle;

public class tp_tabminmax{

    
    public static void main(String[] args) {
    
        int t[] ={1,2,3,4};
       int sum=0, min=t[0], max=t[0];
       for (int i=0; i<4; i++){
           sum=sum+t[i];
       if (t[i]>max){ max=t[i]; } 
         if (t[i]<min){ min=t[i]; } 
       }
       
        System.out.println(sum); System.out.println(min); System.out.println(max);
    }}
