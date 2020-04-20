package tp6;

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

    }

    

