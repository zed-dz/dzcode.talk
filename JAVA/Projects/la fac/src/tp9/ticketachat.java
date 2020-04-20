package tp9;

import java.util.ArrayList;

public class ticketachat {

ArrayList <ligneachat> a2;
ligneachat l []=new ligneachat[5];

public static int numero=0;

public ticketachat(String ref,int prix,int qua){
    numero++;
    for (int i = 0; i < l.length; i++) {
        l[i]=new ligneachat(ref,prix,qua);
    }
}
public ticketachat(){
    this.a2=new ArrayList <ligneachat>();
}

public void initnumero(){
numero=1;
}
public void lire(){
for(int i=0; i<5; i++) {
l[i].lire(); }
}
public void afficher() {
System.out.println(numero);
    for(int i=0; i<l.length; i++) { l[i].afficher();
        System.out.println(l[i].sommeachat());
    }
    System.out.println(this.total());
}
public int total(){
    //somme total 
    int s=0;
    for (int i = 0; i < l.length; i++) {
       s=s+l[i].sommeachat();
    }
return s;
}


}
