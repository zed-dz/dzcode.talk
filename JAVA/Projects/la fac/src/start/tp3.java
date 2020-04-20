import java.util.Scanner;
public class tp3{
public static void main(String [] args) {
Scanner s=new Scanner (System.in);

//1
point p=new point(5,9);
System.out.println(p.afficher());

//2
int x=Integer.parseInt(args[0]);
int y=Integer.parseInt(args[1]);
point q=new point(x,y);
System.out.println(q.afficher());


System.out.println("donner a et b");
int a=s.nextInt(); int b=s.nextInt();
point p1=new point(a,b);
System.out.println(p1.afficher());

//3

point p2=new point (8,9); 
point p3=new point(4,4); 
point p4=new point(4,4); 


p2=p3;  //cest comme un pointeur on change son adresse donc ils ont la meme adresse 
System.out.println(p2==p3);  //true
System.out.println(p2.equals(p3));  //true

System.out.println(p3==p4); // p3.equals(p4) le meme resultat   //false

if(p3.getX()==p4.getX() && p3.getY()==p4.getY()) //ici en teste la valeur de lobjet       
{ System.out.println("tr");  } else {           //tr
System.out.println("fs"); 
}

/*if( ( (p3.getX()).equals(p4.getX()) ) && (  (p3.getY()).equals(p4.getY()) ) ) 
{ System.out.println("trrrrr");  } else {
System.out.println("fssss"); 
} 

on aura une erreur ici car on esseye d'utiliser un entier en le considérant comme un objet avec la méthode equals qui teste les objets pas leurs valeurs donc pr fixer ca il faut quon crée une fonction boolean equal  dans la class point qui nous fait le teste precedent avec == et puis on lappel   
*/


// donc on resumant la double egalite == nous teste tous ce que on la donne objet ou bien valeurs , tant que equals teste seulement les objets alors on peut pas connaitre les valeurs des objets avec equals 

System.out.println(p3.equal(p4));

//4
//p5= new point(); ereur car on as fait une erreur decriture on appelle pas linstance de cette facon et car le constructeur de la class point intialize comme valeur 2 entier x et y donc il faut quon renvoie 2 valeurs dans linstance , donc pr fixer ca on crée un constructeur par default ( vide ) 

point p5=new point();
//5

int k=p.s+q.s+p1.s+p2.s+p3.s+p4.s+p5.s;
System.out.println(" il ya "+k+" objet point ");
//6

point t []= new point [5];

for (int i=0; i<t.length; i++) {
System.out.println("donner deux valeurs");
int w=s.nextInt(); int z=s.nextInt();
t[i]= new point(w,z);
}
for (int i=0; i<t.length; i++) {
System.out.println(t[i].afficher()); 
}
s.close();

/* compilation : javac tp3.java point.java

execution et affichage :

java tp3 22 45
 la valeur de x est 5 la valeur de y est 9

 la valeur de x est 22 la valeur de y est 45

donner a et b
2
1
 la valeur de x est 2 la valeur de y est 1

true
true
false
tr
true
il ya 7 objet point
donner deux valeurs
10
11
donner deux valeurs
5
2
donner deux valeurs
3
1
donner deux valeurs
7
99
donner deux valeurs
8
2
 la valeur de x est 10 la valeur de y est 11

 la valeur de x est 5 la valeur de y est 2

 la valeur de x est 3 la valeur de y est 1

 la valeur de x est 7 la valeur de y est 99

 la valeur de x est 8 la valeur de y est 2

*/ 

}}





