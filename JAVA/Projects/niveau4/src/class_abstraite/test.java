
package class_abstraite;


public class test {

public static void main(String[] args) {
    
    voiture v=new voiture(2015,200);
    camion c=new camion(2008,600);
    System.out.println(v.toString()+" "+c.toString()); 
    v.demarrer(); c.demarrer();
    v.arreter();  c.arreter();
}  
}
