package tp9;

public class ticketameliore extends ticketachat {
    static int recette;
    public ticketameliore() {
        super();
    }
public static void initrecette(){
recette=0;
}

public void calculrecette(){
    recette=recette+super.total();
}
public static void aficher(){
    System.out.println("la recette est "+recette);
}
}
