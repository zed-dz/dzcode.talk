package td2;

class a {
protected int a=5;

    public a(int a) {
        this.a = a;
    }

public void afficher() {
System.out.println("a= "+a);
}
}

class b extends a {

protected int b=6;

    public b(int b) {
        super(2*b);
        a=b;   
    }

public void afficher() {
super.afficher();
    System.out.println("b= "+b);
}
}
class c extends b {

protected int b=7;
protected int c=8;

public c(int c) {
        super(3*c);
        b=c;    
    }
public void afficher() {
super.afficher();
System.out.println("c= "+c);
}
}

class alphabet {
public static void main(String [] args){
 a [] as=new a[3];
   as[0]=new a(1);
   as[1]=new b(2);
   as[2]=new c(3);   
    for (int i = 0; i < as.length; i++) {
        as[i].afficher(); System.out.println("\n");
    }

}     }

