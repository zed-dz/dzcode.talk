
package Les_Threads;


public class Test1 {

    
    public static void main(String[] args) {
        Exemple1 A = new Exemple1();
        Exemple1 B = new Exemple1();
        Exemple1 C = new Exemple1();
        try {
            A.setName("A"); B.setName("B"); C.setName("C");
       // A.setPriority(1); B.setPriority(2); C.setPriority(3);
        
        A.start();A.join(); B.start(); C.start();
        } catch (Exception e) {
            
        }
        
        
    }
    
}


