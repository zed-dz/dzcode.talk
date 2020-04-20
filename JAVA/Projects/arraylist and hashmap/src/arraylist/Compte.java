package arraylist;

public class Compte {
    private int numc;
    public double solde;

    public Compte(int numc, double solde) {
        this.numc = numc;
        this.solde = solde;
    }

//getter pr recuperer un private

    public int getNumc() {
   
        return numc;
    }
    
    public String Afficher(){
        return numc+" à "+solde+" DA";
    }
    public String Deposer(double s){
        solde+=s;
        return Afficher();
    }
    public String Retirer(double s){
        if(solde>s+200){
             solde-=s;
        return Afficher();
        }
        else {
            return "Retrait impossible!!!!!";
        }
    }
}

