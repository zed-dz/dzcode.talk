
package Les_Threads;


public class Carte_credit extends Thread {
    public static int S = 200;
    @Override
    public void run() {
        retirer();
    }
    
    synchronized static public void  retirer(){
        S = S - 20;
        System.out.println(currentThread().getName() + ", Sold = "+S);
        try {
            sleep(300);
        } catch (Exception e) {
        }
    }
    
}
