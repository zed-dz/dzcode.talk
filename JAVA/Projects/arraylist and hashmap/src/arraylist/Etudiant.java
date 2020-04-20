package arraylist;


public class Etudiant {

public String nom,spe,pre;
int id;

    public Etudiant(int id,String nom, String spe, String pre) {
        this.nom = nom;
        this.spe = spe;
        this.pre = pre;
        this.id = id;
    }

 
 @Override   
 
public String toString (){
    return "nom= "+nom+" ,spe= "+spe+" ,pre= "+pre+" ,id= "+id;
}
}
