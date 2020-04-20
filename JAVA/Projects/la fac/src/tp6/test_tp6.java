package tp6;
import java.util.Arrays;
import java.util.Scanner;
public class test_tp6 {
public static void main(String[] args) {

    int n,i,c;
forme T[];  
Scanner sc=new Scanner(System.in);   System.out.println("combier d'objet");
n=sc.nextInt();   T=new forme[n];
for(i=0;i<T.length;i++){
System.out.println("donner le type d'objet:"+"\n1:Rectangle"+"\n2:Cercle"+"\n3:Carre"+"\n4:CercleOrd");
c=sc.nextInt();
switch(c){
case 1:{  T[i]=new rectangle(6,8,"jaune",new point(8,9));  break; }
case 2:{  T[i]=new cercle(6,"bleu",new point(4,2));    break;}
case 3:{  T[i]=new carré(44,"black",new point(4,12));   break;}
case 4:{  T[i]=new cercleOrd(7,"white",new point(2,3));  break;}
default:{ System.out.println("choix incorrect"); break; }
}}    


for(i=0;i<T.length;i++) {  T[i].afficher();  }
//Arrays.sort(T);  juste pr cercleord
for(int j=0;i<T.length;j++){
System.out.println("la surface est"+T[j].surface());System.out.println("la périmetre est"+T[j].périmètre()); 
}

        
cercleOrd cc[]=new cercleOrd[3];

cc[2]=new cercleOrd(5,"marron",new point(11,9));
cc[0]=new cercleOrd(3,"rouge",new point(5,2));
cc[1]=new cercleOrd(4,"blanc",new point(3,6));

try{
Arrays.sort(cc);
}catch(ClassCastException e){System.out.println("l'erreur"+e.getMessage());e.printStackTrace();};

for(int v=0; v<cc.length; v++) {  cc[v].afficher();  }      



cercleOrd l=new cercleOrd(5,"bleu", new point(5,8));
cercleOrd l2=new cercleOrd(2, "yellow",new point(2,4));
System.out.println(l.compareTo(l2));  

l.rotation(6);
l.afficher();
l2.translation(22,24);
l2.afficher();


}}

			
