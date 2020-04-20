package interfaces_avec_des_classes_poo;

 public class bancaire {
 public int sold;
 public static int num=0;
 public final long numccp;
 public final String nom;
 
    public bancaire(String nom,int sold) {
        this.sold = sold;
        this.nom = nom;
    num++;
    numccp=num;
    }
  
public String affichage () {
      return num+" "+nom+" : "+sold+"DA" ;
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
    if(sold>=s){
        sold=sold-s;
    v.sold=v.sold+s;
    }else{
        System.out.println(" on peut pas virer "); }
}

}
