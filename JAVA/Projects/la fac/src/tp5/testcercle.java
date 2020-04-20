package tp5;
public class testcercle {
public static void main(String [] args) {
   
int n=Integer.parseInt(args[0]);

point [] t =new point [n];
t[0] = new cercle(5.2,6.7,11.2,"bleu");
t[1] = new cercle (8,123.12,44.3,"yellow");
t[2] = new cylindre (1,1,1,"jaune",1);
t[3] = new cylindre (2,2,2,"noire",2);

 for ( point t1 : t) {
        System.out.println(t1.toString());
    }
                        int i=0,j=0;
 for ( point t1 : t) {
  if ( t1 instanceof cercle ){  i++;
  cercle s1=(cercle)t1;
 System.out.println(" la surface du "+i+" cercle est "+s1.surface() + " et sont perimetre est " + s1.perimetre());
     }
      if( t1 instanceof cylindre ){  j++;
     cylindre s2=(cylindre)t1;
      System.out.println( " le volume du "+j+" cylindre est "+s2.volume());
        }
    }

    cercle c1 = new cercle (5.2,6.7,11.2,"bleu");
    cercle c2 = new cercle (5.21111,6.7,11.2,"bleu");
    System.out.println(c1.equal(c2));
    System.out.println(c1.afficher());
    System.out.println("la surface est "+c1.surface());
    System.out.println("le perimeitre est "+c1.perimetre());
    System.out.println(c1.toString());
    System.out.println("-----------------");
    cylindre z1 = new cylindre (52,67,112,"jaune",9);
    cylindre z2 = new cylindre (52,67,112,"jaune",9);
    System.out.println(z1.equal(z2));
    System.out.println("le volume est "+z1.volume());
    System.out.println(z1.toString());   
    
    }
}
