package tp1_tp2;

public class point {

private int x,y;

public static int s;
point ()    
    {
        s++;
    }

// le constructeur vide par default howa li ydirana point p=new point(); sans donnée w tjr ykon mdefini bla matcriyih

public point(int x,int y){
this.x=x; this.y=y;
}


public int getX(){
return x;
}
public int getY(){
return y;
}

public void setX() { this.x=x; }
public void setY() { this.y=y; }

    
public String afficher(){
return " la valeur de x est "+x+" la valeur de y est "+y+"\n";
}

public boolean equal(point p){ 

return (x==p.x && y==p.y);
}
public void deplacer (int dx,int dy){
x=x+dx;
y=y+dy;
}

}

