package important;


public class essentiel_tp {
/*
public int compareTo(Object O){ 
Personnel P=(Personnel)O;
if (nom.compareTo(P.nom)== 0)
return (prenom.compareTo(P.prenom));
return nom.compareTo(P.nom);
}

//public boolean equal(point p){ 
//return (x==p.x && y==p.y); }

public boolean equal(Object z){
if(! (z instanceof cylindre)) {
return false; }

cylindre c=(cylindre)z;
   
cercle b=new cercle (c.x,c.y,c.rayon,c.couleur);        //return ((super.equal((cercle)z)) && (hauteur==z.hauteur));

return ( super.equal(b) && hauteur==c.hauteur );

}


public String toString(){ 
    return super.toString()+afficher(); 
}
 for ( point t1 : t) {
  if ( t1 instanceof cercle ){  i++;
  cercle s1=(cercle)t1;
 System.out.println(" la surface du "+i+" cercle est "+s1.surface() + " et sont perimetre est " + s1.perimetre());
     }
      if( t1 instanceof cylindre ){  j++;
     cylindre s2=(cylindre)t1;
      System.out.println( " le volume du "+j+" cylindre est "+s2.volume());
        }
    }
 
 
public point getCentre() {
    return new point(x,y); 
}
public void setCentre(double x,double y){ 
    super.x=x; super.y=y;
}


public static int s;
point () {   s++;   }


centre =new point (x1,y1);  
public boolean equal2(cercle z){  return (centre.equal(z.centre) && rayon==z.rayon);  }

public cercle(point o,double rayon) {           
    centre=o;
    this.rayon = rayon;    
    }
    
    
}
public class pile {

//private int t[];    
private ArrayList<Integer> l1;

public pile(){

l1 = new ArrayList<Integer>();

//l1 = new ArrayList<Integer>(n); pour modifier cette taille a n    
//t=new int[n];
}
public boolean pilevide(){
        return l1.isEmpty();
}

public int depiler (){
 return   l1.remove(l1.size()-1);

 //int x=l1removeLast(); f linkedlist

}
public void emplier(int x){    
l1.add(x);
// t[sommet]=x;    
} 
}
pile p=new pile();  pile q=new pile();   Random r=new Random();
  
for (int i = 0; i < 11; i++) {      p.emplier(r.nextInt(100));    }

while(!p.pilevide()){     int x=p.depiler();    System.out.println(x);     q.emplier(x);  } //pr afficher les elts sans les suprimer

pile paire=new pile();       pile impaire=new pile();   

while(!q.pilevide()){  int x=q.depiler();  if(x%2==0){ paire.emplier(x); }else{  impaire.emplier(x);  }}

while(!paire.pilevide()) {          System.out.println(paire.depiler());   }



public class cercleOrd extends cercle implements Comparable{

    public cercleOrd(double rayon, String couleur, point pointinitial) {
        super(rayon, couleur, pointinitial);
    }
   
    @Override
    public int compareTo(Object o){
        //ou bien cercle 
		if(surface()==((cercleOrd)o).surface()) {
			return 0;
                }else if (surface()>((cercleOrd)o).surface()) {
				return 1;
                }else{
				return -1; 

    }}


public interface deplacable {

public void translation(double dx,double dy);
public void rotation(double angle);
}
public abstract class forme implements deplacable{

constructeur
        
public abstract double surface(); 
public abstract double périmètre();
public abstract void afficher();

 public void rotation (double angle)
	{
		pointinitial.rotation(angle);
	}
	public void translation (double dx, double dy)
	{
             	//pointinitial.setX(pointinitial.getX()+dx);
	//	pointinitial.setY(pointinitial.getY()+dy);
		pointinitial.deplacer(dx, dy);
	}
        
public double getx()
	{
		return(pointinitial.getX());
	}


*/

} 