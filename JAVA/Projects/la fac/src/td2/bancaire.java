package td2;

 public class bancaire {
 public int sold;
 public static int num=0;
 public final long numccp;
 public final String nom,prenom;
 public String address;

    public bancaire(int sold, String nom, String prenom, String address) {
        this.sold = sold;
        this.nom = nom;
        this.prenom = prenom;
        this.address = address;
    num++;
    numccp=num;
    }
  
public String affichage () {
      return num+" "+nom+" "+prenom+" "+address+" : "+sold+"DA" ;
}
public int depot (int s ) {
    sold =sold+s;
    return s;
}    
public void retrait(int s) {
   if (sold >= s ) {
       sold=sold-s; }else{
       System.out.println(" on peut pas retirer ");
   }                                            
}
public void virement(int s,bancaire v){
    //tna9as malowal w tzido la deuxieme
    if(sold>=s){
        sold=sold-s;
    v.sold=v.sold+s;
    }else{
        System.out.println(" on ne peut pas virer "); 
    }
}

}
