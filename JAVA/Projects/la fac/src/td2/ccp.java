
package td2;


public class ccp {

    
    public static void main(String[] args) {

bancaire c=new bancaire(500,"amine","hammou","blida");
c.depot(200);
c.retrait(25);
System.out.println(c.affichage());

bancaire c2=new bancaire(1500,"amine2","hammou2","blida");

c2.virement(50, c);

System.out.println(c2.affichage()); 
System.out.println(c.affichage());
    
poste x=new poste();

x.ajouterccp(c); 
x.ajouterccp(c2);
        
        System.out.println(x.getNbrCompte());
        
        System.out.println(x.soldcasse());
        
        System.out.println(x.recherchecompte(c));

        System.out.println(x.affichertous());

    }    
}
