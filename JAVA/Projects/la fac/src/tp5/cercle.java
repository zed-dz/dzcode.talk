package tp5;
public class cercle extends point{

protected double rayon;
protected String couleur;

public cercle(){ }

public cercle(double x,double y,double rayon,String couleur) {  
    super(x,y);    
    this.rayon = rayon;        this.couleur=couleur; 
}   

public double surface(){    return (Math.PI)*(Math.pow(rayon,2));    }

public double perimetre (){         return 2*Math.PI*rayon;            }           

public String afficher(){    
return super.afficher()+" la valeur du rayon est "+rayon+ " ca couleur est "+couleur+"\n";   
}
public boolean equal(Object z){ 
  if(!(z instanceof cercle)) 
  return false; 
  cercle p=(cercle)z; 
  return (super.equal(p.getCentre()) && couleur.equals(p.couleur) && rayon==p.rayon); 
}            
//return (super.equal(z.getCentre()) && rayon==z.rayon && couleur.equals(z.couleur));
public String toString(){ 
    return super.toString()+afficher(); 
}

public point getCentre() {
    return new point(x,y); 
}
public void setCentre(double x,double y){ 
    super.x=x; super.y=y;
}
public double getRayon() {    
    return rayon;  
}
public String getCouleur() {  
    return couleur;   
}

public void setRayon(double rayon) {    
    this.rayon = rayon;  
}

public void setCouleur(String couleur) {   
    this.couleur = couleur;    }
}
    
