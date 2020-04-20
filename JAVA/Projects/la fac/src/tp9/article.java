
package tp9;

import java.util.Scanner;

public class article {

private String ref;
private int prix;

public article(String ref, int prix){
this.ref=ref; this.prix=prix;
}

public void lire(){
Scanner sc=new Scanner(System.in);
ref=sc.next(); prix=sc.nextInt();

}public void afficher(){
System.out.println(" la ref est "+getref()+" le prix est "+getprix());
}

public String getref(){ return ref;}  public int getprix(){ return prix; }
public void setref(String ref){ this.ref=ref; }  public void setprix(int prix){ this.prix=prix; }




}

