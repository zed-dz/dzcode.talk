package Les_Threads;


public class Exemple1 extends Thread {

    @Override
    public void run() {
        for (int i = 0; i < 20; i++) {
            try {
                System.out.println(currentThread().getName()+" : "+i);
                sleep(200);
            } catch (Exception e) {
            }
        }
        
    }
    
}
