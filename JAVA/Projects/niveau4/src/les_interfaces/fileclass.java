
package les_interfaces;

public class fileclass implements file_dattente{

int taille,nbr=0;
String tab[];

    public fileclass(int taille) {
        this.taille = taille;
       tab=new String[taille];
    }

    @Override
    public int taille() {
   return nbr; 
    }

    @Override
    
public void enfiler(String nom) {
if(nbr<taille){
    tab[nbr]=nom;
    nbr++;
}    
    }
@Override
public boolean filepleine(){
   return nbr==taille-1;
}
@Override
public boolean filevide(){
 return nbr==0;   
}
    @Override
    public void defiler() {
    if(nbr>=0){
        for (int i = 0; i < nbr; i++) {
         if(i<nbr-1){
            tab[i]=tab[i+1];
        }else{  tab[i]="";  }  }
        nbr --;
    }        
    
    }
    

}

    

