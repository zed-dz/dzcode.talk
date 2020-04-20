
package tp8;


public class pilemain {

    
    public static void main(String[] args) {

pile p=new pile(-5);
try{
    int x;
for(int i=0; i<args.length; i++){
x=Integer.parseInt(args[0]);
p.empiler2(x);
}
for (int i = 0; i < args.length; i++) {
   System.out.println(p.depiler2());
}

}catch(pilepleineException e){
    System.out.println(e.getMessage());
    e.printStackTrace();

}catch(pilevideException e){
        System.out.println(e.getMessage());
        }
    
} }
