
package Les_Threads;


public class Test2 {

    
    public static void main(String[] args) {
        Carte_credit C1 = new Carte_credit();
        Carte_credit C2 = new Carte_credit();
        
        C1.setName("Younes"); C2.setName("Marwane");
        
        C1.start(); C2.start();
    }
    
}
