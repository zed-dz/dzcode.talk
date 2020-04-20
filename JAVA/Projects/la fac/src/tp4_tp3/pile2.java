package tp4_tp3;
import java.util.*;
public class pile2 {
public static void main (String args []) {
    
Scanner sc=new Scanner(System.in);   pile p=new pile();  pile q=new pile();   Random r=new Random();
  
for (int i = 0; i < 11; i++) {      p.emplier(r.nextInt(100));    }

while(!p.pilevide()){     int x=p.depiler();    System.out.println(x);     q.emplier(x);  } //pr afficher les elts sans les suprimer

pile paire=new pile();       pile impaire=new pile();   

while(!q.pilevide()){  int x=q.depiler();  if(x%2==0){ paire.emplier(x); }else{  impaire.emplier(x);  }}

System.out.println("-----pile paire-----");
while(!paire.pilevide()) {          System.out.println(paire.depiler());   }

System.out.println("-----pile impaire-----");
while(!impaire.pilevide()) {    System.out.println(impaire.depiler());  }

sc.close();

} }

//l2.remove(l2.size()-p.depiler());  for(int i = 0; i <l2.size(); i++)  System.out.println(l2.get(i)); break;

//pour LinkedList cest les memes fonctions add remove etc..
//sauf que tu peut ajouter ou supprimer ou ajouter au debut ou a la fin
// addFirst() addLast(),removeFirst(),removeLast(),getFirst(),getLast();
