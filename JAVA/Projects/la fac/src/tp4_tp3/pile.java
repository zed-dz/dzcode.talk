package tp4_tp3;
import java.util.*;
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


