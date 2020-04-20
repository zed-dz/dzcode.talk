
package hashmap;

public class Cordonne {
    private String tel,adr;

    public Cordonne(String tel,String adr) {
        this.tel = tel;
        this.adr = adr;
    }
    public String Afficher(){
        return "Le tél est "+tel+" et l'adresse est "+adr;
    }
    
//on utilise le getter pr arriveé a utlisier les variables privé
    
    public String getTel() {
        return tel;
    }
    public String getAdr() {
        return adr;
    }
    
}




