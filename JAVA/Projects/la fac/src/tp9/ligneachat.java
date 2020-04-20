package tp9;
import java.util.Scanner;

public class ligneachat {
article a;
private int qua;

public ligneachat(String ref,int prix,int qua){
this.a = new article(ref,prix);
this.qua=qua;
}
public void afficher(){
a.afficher(); System.out.println(" la quantité est "+getqua()+" "+this.sommeachat());
}
public void lire(){
Scanner sc=new Scanner(System.in);
a.lire();
qua=sc.nextInt();
}
public int sommeachat (){
	return a.getprix()*qua;
}

public int getqua(){ return qua; } public void setqua(int qua){this.qua=qua;}

}