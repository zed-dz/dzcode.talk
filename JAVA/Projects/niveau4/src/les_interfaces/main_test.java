package les_interfaces;

import java.util.Scanner;
public class main_test {

public static void main(String[] args) {

Scanner sc=new Scanner(System.in);       
    System.out.println("donner la taille de la fille");
int n=sc.nextInt();

fileclass p=new fileclass(n);

for (int i = 0; i <=n; i++) { if(! p.filepleine() )  System.out.println("donner le nom a enfiler");
p.enfiler(sc.nextLine());    }

System.out.println("donner le nombre de defilement");
int m=sc.nextInt(); 
if(! p.filevide()) {
    int j=0;
    while(j<m) { p.defiler(); j++; } 
}

for (int i = 0; i<p.taille; i++) {   System.out.println(p.tab[i]);     }

sc.close();

}}
