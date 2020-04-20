package interfaces_avec_des_classes_poo;

public class Ville {
 public String nomV,nomP;
 public int nbrH;

public Ville (String nomV, String nomP, int n){
this.nomV = nomV;
this.nomP=nomP;
nbrH=n;
}

public String affichage () {
return nomV+", le pays est "+nomP+" et les habitants sont "+nbrH;
}

public char categorie(){
    char c;
    if (nbrH>0 && nbrH<40000) { c='a'; }
    else { c='b'; }
 return c;
}
public String comparer (Ville v){
String cmp;
if (v.nbrH>this.nbrH){ cmp=v.nomV+" plus pplé "+this.nomV; }
else { cmp=v.nomV+" moin pplé "+this.nomV; }
return cmp;
}
}