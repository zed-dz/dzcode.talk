package pack2;

//import pack1.ClassA;
//import pack1.ClassB;
import pack1.*;

public class testpackage {

    public static void main(String[] args) {

pack1.ClassA a=new pack1.ClassA();
pack1.ClassB b=new pack1.ClassB();

System.out.println("avec import");
ClassA c=new ClassA(); //ecriture plus simple
pack1.ClassB d=new pack1.ClassB();
//on peut pas avec b car on nas pas importer ca classe

ClassB e=new ClassB(); 

}}
