package class_abstraite;

public class cercle extends forme{
    protected int r;

    public cercle(int r) {
        this.r = r;
    }
public void representation(){  System.out.println( "je suis cercle ");  }

    @Override
    public double getsurface() {
        return r*r*Math.PI;
    }

    @Override
    public double getsuperficie() {
    return r*2*Math.PI;
    }

}
