package td1;

import java.util.Scanner;

public class exo10 {
   
static String innerstr (String s){   
    String k="";
    for (int i = s.length()-1; i >=0; i--) {
        k=k+s.charAt(i);
    }      

    return k;
}
static String afficher (String s){   
    for (int i =0; i <s.length(); i++) {
    System.out.print(s.charAt(i)); 
    }
    return s;
}
static void palindrome(String s){      
      if (s.equals(innerstr(s))) {
          System.out.println("cest un palindrome.") ; }
      else {
          System.out.println("ce nest pas un palindrome.") ;
      }
}    
static String remplace(String a,String b){
    String c="";
    
    c=a.replace(a,b);
    
    return c;
}
    public static void main(String[] args) {
    
    Scanner sc=new Scanner(System.in);
    System.out.println("donner un nom");
    String a=sc.nextLine();
   
    System.out.println(" voici votre chaine ' "+afficher(a)+"' ");

    System.out.println(" voici son inverse "+innerstr(a));     

    palindrome(a);
   
    System.out.println("donner un nom a remplacer ");
    String b=sc.nextLine();               
 
    afficher("la nouveaux nom est "+remplace(a,b));
    
                        // String r=a.replace("ine","was");
                        //afficher(r); 
   
    }    }
