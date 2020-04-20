package heritage;

public class batiment {

protected String adress; // dans lheritage il faut les declarer protected pr qune autre classe sa subclasse peut lacceder avec le super 

    public batiment(String adress) {
        this.adress = adress;
    }
    public String affichage() {
        
        return "laddresse de votre batements est "+adress;
    
    }

}
