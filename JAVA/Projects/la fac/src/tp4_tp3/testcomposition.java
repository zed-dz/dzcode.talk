package tp4_tp3;


public class testcomposition {

   
    public static void main(String[] args) {

cercle c1 = new cercle (5.2,6.7,11.2);

cercle c2 = new cercle (new point(6.5,7.8),3);

cercle c3 = new cercle (new point(6.5,7.8),3);

c2.afficher2();

System.out.println(c1.equal2(c2));

System.out.println(c2.equal2(c3));

c1.deplacer2(4,10,5);

c1.afficher2();

    
    
    
    
    
    
    } }
